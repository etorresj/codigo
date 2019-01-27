/* 
 *  Owl Carousel - code name Phenix
 *  by Bartosz Wojciechowski
 *  2014
 *  
 *  v0.1.1 alpha
 */

/* 
To do:
	1. Modules wrapper
	2. Lazy Load
	3. Callbacks
	4. Pagination
	5. Navigation
	6. Non Loop content
	7. Different width content
	8. Autoplay
	9. Responsive images
	10.add margin right on items - done
	11.Show a snippet of the the next slide
	*/

var Phenix = function(el, options){

	var _this = this;

	/* Default options */

	var defaults = {
		items:3,
		centerItem: false,
		responsiveItems:false,
		siblingsMargin: 0,
		scrollPerPage: false,
		swipePerPage:false,//buggy - to do
		jsonPath: false,
		jsonStructure: false,
		jsonLazyLoad: false,
		mouseDrag: true,
		touchDrag: true,
		slideSpeed : true,
		position:0,
		modules:false,
		itemStyle:{
			marginRight:0,
			marginRightPercent:0
		},
		navigation: true,
		naviLeftClass: false,
		naviRightClass: false,
		lazyImage: true,
		unloadLazyImageOnMobile:false,
		activeClass : true

	}

	_this.options = $.extend({}, defaults, options);
	var options = _this.options;

	/* Globals vars */

	_this.el = el;
	_this.$el = $(el);
	_this.elWidth = 0;
	_this.$lContent = false; // local content
	_this.wrapper = false;
	_this.$wrapper = false;
	_this.wrapperWidth = false;
	_this.itemWidth = 0;
	_this.jsonData = false;
	_this.$items = $(); // all items (including duplicats)
	_this.$oItems = false; // original items
	_this.$dItems = false; // duplicated items
	_this.numberItems = 0; 
	_this.isTouch = false; 
	_this.oItemsInArray = []; // original items positions
	_this.itemsInArray = []; // all items positions (including duplicats)
	_this.resizeTimer = false;
	_this.targetTouchElement = false;
	_this.prevItems =  false; // prev number responsive items;

	/* Local information */ 

	_this.positions = {
		start:0,
		max:0,
		prev:0,
		current:0,
		currentAbs:0,
		currentPage:1
	};

	_this.touches = {
		start: 0,
		startX: 0,
		startY: 0,
		current: 0,
		currentX: 0,
		currentY: 0,
		offsetX: 0,
		offsetY: 0,
		distance: 0,
		startTime:0,
		endTime:0
	};

	_this.speed = {
		slow: 1300,
		medium: 1300,
		fast:1300,
		custom: options.slideSpeed
	}

	/* Init */

	_this.init = function(){

		/* set opacity 0 to main element */
		_this.el.style.opacity = '0';
		_this.el.style.filter  = 'alpha(opacity=0)';//ie7

		/* Add methods to main element */
		_this.elMethods(_this.el);

		/* Check support */
		_this.support3d = _this.browser.isTransform3d();
		_this.supportTouch = _this.browser.isTouchDevice();

		/* Sort responsive items in array*/
		_this.sortSizes();

		/* update options.items on given size*/
		_this.getResponsiveSizes();

		/* Get and store window width */
		/* iOS safari likes to trigger unnecessary resize event */
		_this.lastWindowWidth = _this.windowWidth();

		/* get json or generate local phenix */
		if(options.jsonPath){
			_this.getJsonData();
		}else{
			_this.generatePhenix()
		}
	}

	/* Log In */

	_this.generatePhenix = function(){

		/* get local data information (children etc.) */
		_this.getLocalData();

		/* create wrapper object */
		_this.createWrapper();

		/* generate items objects */
		_this.generateItems();

		/* Append local content */
		_this.appendLocalContent();

		/* Create duplications for infinity loop */
		_this.loopDuplication();

		/* Zepto require main element to be displayed befor data collection */
		_this.el.style.display = 'block';

		/* Collect information */
		_this.collectData();

		/* Calcualte grid */
		_this.calculateGrid();

		/* Set init positions */
		_this.setInitialPosition();

		/* Check visible items */
		_this.updateActiveItems();

		/* Append/check json content */
		_this.appendJsonContent();

		/* attach events */
		_this.events();

		/* attach custom events */
		_this.customEvents();
		
		/* attach custom events */
		_this.customEventsone();

		/* Generate Navigation */
		_this.navigation();

		/* show phenix after wrap everything above */
		_this.showPhenix();

		_this.callbacks('onAfterInit');
	}

	_this.showPhenix = function(){
		_this.wrapper.style.display = 'block';
		_this.el.style.opacity = '1';
		_this.el.style.filter  = 'alpha(opacity=100)';//ie7

		/* To do check visibility */
		/* var elVisibility = _this.el.isVisible() */
	}

	_this.appendJsonContent = function(){
		if(options.jsonLazyLoad){
			_this.jsonLazyLoad();
		}else if(options.jsonPath) {
			_this.jsonToItem2(_this.jsonData);
		}
	}

	_this.appendLocalContent = function(){
		if(!options.jsonLazyLoad){
		   _this.$wrapper.append(_this.$oItems);
	   }
   }

   _this.getLocalData = function(){
		if(!options.jsonPath){
			_this.$lContent = _this.$el.children();
			_this.numberItems = _this.$lContent.length
		}
	}

	/* Get json file and store items */

	_this.getJsonData = function(){
		$.ajax({
			url: "assets/json/content.json",
			async: true,
			success: function(data){
				_this.jsonData = data['items'];
				_this.getAmountJsonItems();
				return _this.generatePhenix();
			}
		});

	}

	_this.getAmountJsonItems = function (){
		var i;
		for (i in _this.jsonData) {
			if (_this.jsonData.hasOwnProperty(i)) {
				++_this.numberItems;
			}
		}
	}

	/* Responsive */

	_this.responsive = function(){
		/* If El width hasnt change then stop responsive */
		var elWidth = _this.isElWidthChanged();
		if(!elWidth){return false;}

		/* Get sizes for given width */
		_this.getResponsiveSizes();

		/* Remove duplicats and generate new */
		_this.reinitLoopDuplications();

		/* Collect Data */
		_this.collectData();

		/* Recalculate grid */
		_this.calculateGrid();

		/* Set Position - to do */
		_this.setInitialPosition();

		/* Find elements on screen and activate them */
		_this.updateActiveItems();

		/* Check navigiation */
		_this.updateNavigation();

		/* Load lazy json content if is true */
		_this.jsonLazyLoad();

		_this.callbacks('onAfterResponsive');
	}

	_this.isElWidthChanged = function(){
		var prevElWidth = _this.$el.width()-80,//to do
			checkWidth = _this.elWidth+options.itemStyle.marginRight;
		return prevElWidth !== checkWidth;
	}

	/* Sort array of responsive sizes */

	_this.sortSizes = function(){
		_this.sortedSizes = options.responsiveItems.sort(function (a, b) {return a[0] - b[0]; });
		_this.sortedSizes.unshift([0,_this.sortedSizes[0][1]]);
	}

	/* appned options.items with responsive items */

	_this.getResponsiveSizes = function(){
		if(!options.responsiveItems) return;

		var width = _this.windowWidth();
		for (i = 0; i < _this.sortedSizes.length; i += 1) {
			if (_this.sortedSizes[i][0] <= width) {
				options.items = _this.sortedSizes[i][1];
			}
		}
	}

	/* Check Window resize with 200ms delay */

	_this.responsiveTimer = function(){
		if(_this.windowWidth() === _this.lastWindowWidth){
			return false;
		}
		window.clearTimeout(_this.resizeTimer);
		_this.resizeTimer = setTimeout(_this.responsive, 300);
		_this.lastWindowWidth = _this.windowWidth();
	}

	/* Calculate */

	_this.collectData = function(){
		var distanceItem = 0,
		distanceAllItem=0,
		itemMargins = options.itemStyle.marginRight,
		elWidthMinusMargin = 0;

		/* element width minus siblings */

		_this.elWidth = _this.$el.width() - (options.siblingsMargin*2);

		/* calculate width minus addition margins */

		elWidthMinusMargin = _this.elWidth - (itemMargins*(options.items === 1 ? 0 : options.items -1))

		/* calculate element width and item width */

		_this.elWidth =  _this.elWidth + itemMargins;
		_this.itemWidth = Math.round(elWidthMinusMargin / options.items) + itemMargins;

		//_this.itemWidth = +_this.itemWidth.toFixed(2);
		_this.$items = _this.$wrapper.find('.phenix-item');

		/* Set grid array */
		_this.itemsInArray = [];
		_this.oItemsInArray = [];

		/* Items all positions */
		/* if center item divide width */

		for(var i = 0; i<_this.$items.length; i++){
			_this.itemsInArray.push(distanceAllItem);
			distanceAllItem -= _this.itemWidth;
		}

		/* Items original positions - doesnt work - to fix */

		for(var i = 0; i<_this.$oItems.length; i++){
			_this.oItemsInArray.push(distanceItem+_this.elWidth);
			distanceItem += _this.itemWidth;
		}

		/* show siblings */

		if(options.siblingsMargin > 0){
			_this.outerWrapper.style.paddingLeft = options.siblingsMargin + 'px';
			_this.outerWrapper.style.paddingRight = options.siblingsMargin + 'px';
		}
	}   


	_this.calculateGrid = function(){
		_this.loopItem = _this.itemWidth * options.items;
		_this.wrapperWidth = _this.itemWidth * _this.$items.length;
		_this.setWidths();
	}

	/* Set Styles */

	_this.setWidths = function(){
		_this.$wrapper[0].style.width = _this.wrapperWidth + "px";
		for(var i=0; i<_this.$items.length; i++){
			_this.$items[i].setWidth(_this.itemWidth - (options.itemStyle.marginRight));
		}
	}

	/* Create Structure */

	_this.createWrapper = function(){
		_this.outerWrapper = document.createElement('div');
		var wrapper = document.createElement('div');

		_this.outerWrapper.className = 'phenix-wrapper-outer'
		wrapper.className = 'phenix-wrapper';
		if(options.centerItem){
			wrapper.className += ' '+'phenix-center';
		}

		_this.$el.append(_this.outerWrapper);
		$(_this.outerWrapper).append(wrapper);
		_this.wrapper = wrapper;
		_this.$wrapper = $(wrapper);
	}

	_this.createItemContainer = function(){
		var item = document.createElement('div');
		_this.itemMethods(item);

		item.className = 'phenix-item';
		if(options.jsonLazyLoad){
			item.className = 'phenix-item lazyLoad';
		}
		return item;
	}

	_this.generateItems = function(){
		var i, item; 
		_this.$oItems = $();

		for(var i = 0; i < _this.numberItems; i++){
			item = _this.createItemContainer();
			item.setData('index',i);

			if(options.itemStyle.marginRight !== 0){
				item.style.marginRight = options.itemStyle.marginRight + "px";
			}

			if(options.jsonPath){
				item.append();
			}else{
				$(item).append(_this.$lContent[i])
			}

			if(options.jsonLazyLoad){
				var lazyItem = document.createElement('div');
				lazyItem.className = "spinner";
				$(item).append(lazyItem)
			}

			_this.$oItems.push(item);
		}

		/* Prevent wrapper to catch bubling transitions */

		var transition = _this.browser.whichTransitionEvent();
		_this.$oItems.on(transition,function(event){event.stopPropagation()})
		

	}

	/* Fill the content */

	_this.createItemHTML = function(data){
		if(options.jsonStructure){
			return options.jsonStructure.apply(this,[data]);
		}
	}

	_this.jsonToItem2 = function(data){
		var jsonData = data, html;
		
		for(var i=0; i<_this.$items.length; i++){
			/* Get true index for duplicated elements */
			var trueIndex = _this.$items[i].getData('index');

			/* create and insert content */
			html = _this.createItemHTML(jsonData[trueIndex]);
			_this.$items[i].insertContent(html);
		}
	}

	_this.jsonToItem = function(data,i,item){
		var jsonData = data, html;

		/* create and insert content */
		html = _this.createItemHTML(jsonData[item]);
		_this.$items[i].fadeInContent(html);
	}

	_this.jsonLazyLoad = function(){
		if(!options.jsonLazyLoad){return false}

		for(var i=0; i<_this.$items.length; i++){
			var trueIndex = _this.$items[i].getData('index');
			var activePage = _this.$items[i].isActive();

			if(activePage && !_this.$items[i].isLoaded()){
				_this.$items[i].setLoaded();
				_this.jsonToItem(_this.jsonData,i,trueIndex)
			}
		}
	}

	/* Update active items */

	_this.updateActiveItems = function(){
		var itemsNumber = options.items,
			itemCenter =  Math.floor(options.items/2),
			item,
			itemPosition;

		for(var i=0; i<_this.$items.length; i++){
			this.$items[i].removeActive();
			this.$items[i].removeCenter();
		}

		for(var i=0; i<_this.$items.length; i++){
			item = _this.$items[i];
			itemPosition = _this.$items.eq(i).index();

			/* add center class */
			if(options.centerItem && itemPosition === _this.positions.currentAbs + itemCenter ){
				item.setCenter();
			}

			if(itemPosition >= _this.positions.currentAbs && itemPosition < _this.positions.currentAbs + itemsNumber){
				item.setActive(true);
				_this.callbacks("onActiveItems",item);
			}
		}

	}

	/* Infinity item duplication */

	_this.loopDuplication = function(){
		var last, first, num = options.items;

		/* if siblings margin then add one more duplicat */
		if(options.siblingsMargin){
			//num+=1;
		}

		_this.prevItems = options.items;

		first = _this.$oItems.clone(true,true).slice(0,num).addClass('cloned').data('copy',true);//.removeClass('active');
		last = _this.$oItems.clone(true,true).slice(-num).addClass('cloned').data('copy',true)//.removeClass('active');
		
		/* Add Item Methods to duplicats */
		for(var i = 0; i < first.length; i++){
			_this.itemMethods(first[i]);
			_this.itemMethods(last[i]);
		}

		_this.$dItems = $().add(last).add(first);

		_this.$wrapper.prepend(last);
		_this.$wrapper.append(first);

	}

	/* if window resize and number items is different then reinit loop duplication */

	_this.reinitLoopDuplications = function(){

		/* Dont reinit if number of items did not change */
		if(_this.prevItems === options.items){
			return false;
		}

		/* remove duplicate elements */
		_this.$dItems.remove();
		/* generete new elements */
		_this.loopDuplication();
	}

	// Go to position

	_this.setInitialPosition = function(){
		var startPosition;
		_this.updatePosition(options.position + options.items);

		if(options.centerItem){
			_this.positions.currentAbs = _this.positions.center;
		} 
		_this.jumpTo(_this.positions.currentAbs)
	}


	/* Item Methods */

	_this.itemMethods = function(el){
		el.insertContent = function(html){
			$(el).html(html);
		}

		el.fadeInContent = function(html){
			$(el).html(html);
			$(el).removeClass('lazyLoad')
		}

		el.append = function(){
			_this.$wrapper.append(el);
		}

		el.setLoaded = function(){
			el.setData('content',true);
		}

		el.isLoaded = function(){
			return el.getData('content') === true;
		}

		el.setLazyImage = function(){
			el.setData('lazyImage',true);
		}

		el.isLazyImageLoaded = function(){
			return el.getData('lazyImage') === true;
		}

		el.getIndex = function(){
			return el.getData('index');
		}

		el.isActive = function(){
			return el.getData('active');
		}

		el.setActive = function(checkDuplicate){
			if(options.activeClass){
				$(el).addClass("active");
			}
			el.setData('active',true);

			/* Set active to duplicated element */
			if(!checkDuplicate || _this.$dItems.length === 0) return false;
			var thisIndex = el.getIndex(),
				thisCentered = el.getData('center'),
				dupl,i;

			for(i = 0; i<_this.$dItems.length; i++){
				dupl = _this.$dItems[i]

				if(thisIndex === dupl.getIndex()){
					dupl.setActive();
					if(thisCentered){
						dupl.setCenter();
					}
				}
			}
		}

		el.removeActive = function(onlyClass){
			el.removeData('active')
			$(el).removeClass("active")
		}

		el.getData = function(name){
			return $(el).data(name)
		}

		el.setData = function(name,value){
			return $(el).data(name,value)
		}

		el.removeData = function(name){
			$(el).data(name,''); //zepto doesnt like $.removeData
		}

		el.setWidth = function(width){
			el.style.width = width + "px";
		}

		el.getWidth = function(){
			return el.offsetWidth;
		}

		el.setHeight = function(width){
			el.style.height = width + "px";
		}

		el.getHeight = function(){
			return el.offsetHeight;
		}
		el.setCenter = function(){
			el.setData('center',true);
			$(el).addClass("phenix-center");
		}
		el.removeCenter = function(){
			el.removeData('center');
			$(el).removeClass("phenix-center");
		}
	}

	_this.elMethods = function(el){
		el.isVisible = function(){
			return !!(el.getHeight() || el.getWidth());
		}
		el.getHeight = function(){
			return el.offsetHeight;
		}
		el.getWidth = function(){
			return el.offsetWidth;
		}
	}

	/* Transitions */

	_this.wrapperTranslate = function(x){
		var positionX = x,
		style = _this.wrapper.style;

		_this.isAnimate = true;
		if(_this.support3d){
			translate = 'translate3d(' + positionX + 'px'+',0px, 0px)';
			style.webkitTransform = style.MsTransform = style.msTransform = style.MozTransform = style.OTransform = style.transform = translate;
		} else {
			style.left = positionX+'px'
		}
	}

	/* oldskool animation only for goTo function*/

	_this.wrapperTranslate2d = function(x){
		var positionX = x;
		_this.isAnimate = true;
		_this.setWrapperTransition(0);
		_this.$wrapper.stop(true, true).animate({
			"left" : x
		}, {
			duration : _this.currentSpeed,
			complete : function () {
				_this.wrapperTransitionEnd();
			}
		});
	}

	_this.setWrapperTransition = function (duration) {
		var style = _this.wrapper.style;
		style.webkitTransitionDuration = style.MsTransitionDuration = style.msTransitionDuration = style.MozTransitionDuration = style.OTransitionDuration = style.transitionDuration = (duration / 1000) + 's';
	}

	/* Event for animation end. Used by transitionEnd event and in $.animate callback */

	_this.wrapperTransitionEnd = function(event){

		/* if css2 animation then event object is undefined */
		if(event !== undefined){
			event.stopPropagation();
		}
		_this.isAnimate = false;
		_this.setWrapperTransition(0);
		_this.updateActiveItems();
		_this.jsonLazyLoad();

		_this.callbacks('onTransitionEnd');
	}

	/* Intervals - Slide speeds - To do stuff here*/

	_this.slideInterval = function(){
		var speed;
		if(options.scrollPerPage && !_this.isTouched){
			speed = _this.speed.slow;
		} else {
			speed = _this.speed.fast;
		}
		//speed = _this.speed.fast;
		_this.currentSpeed = speed;
		return speed;
	}

	/* Navigation loop calculator - Allows you to have a loop on next/prev buttons */

	_this.naviLoop = function(distance){

		var revert = _this.positions.currentAbs,
		moveBy,
		prevPositon = _this.positions.currentAbs,
		newPosition = _this.positions.currentAbs + distance,
		direction = prevPositon - newPosition < 0 ? true : false;

		if(newPosition < 1 && direction === false){
			revert = _this.itemsInArray.length-(options.items-prevPositon) - options.items;
			_this.jumpTo(revert);

			setTimeout(function(){ _this.goTo(revert + distance)}, 50);
		} else if(newPosition >= _this.itemsInArray.length-options.items &&  direction === true ){
			revert = prevPositon - _this.oItemsInArray.length;

			_this.jumpTo(revert);
			setTimeout(function(){ _this.goTo(revert + distance)}, 50);
		}else{
			_this.goTo(newPosition)
		}
		_this.updatePosition(revert + distance)
	}

	_this.updatePosition = function(position){
		/* Get prev position */
		_this.positions.prev = _this.positions.currentAbs;

		/* Get New Abs Position */
		_this.positions.currentAbs = position;

		/* Get Real Position */
		_this.positions.current = _this.positions.currentAbs - options.items;

		/* Get Center Position */
		_this.positions.center = _this.positions.currentAbs - Math.floor(options.items/2);

	}

	/* goTo given position(item number) */

	_this.goTo = function(position){
		var positions = _this.itemsInArray,
		speed =  _this.slideInterval();

		_this.isTouched = false;
		_this.updatePosition(position);
		if(_this.support3d){
			_this.setWrapperTransition(speed);
			_this.wrapperTranslate(positions[position]);
		} else {
			_this.wrapperTranslate2d(positions[position]);
		}
	}

	/* jumpTo - jump to position without animation
	*  Mind that transitionEnd event wont trigger here
	*/

	_this.jumpTo = function(position){
		var positions = _this.itemsInArray;
		_this.setWrapperTransition(0);
		_this.wrapperTranslate(Number(positions[position]));
	}

	/* goTo pext position*/

	_this.next = function(){
		var pagination = options.scrollPerPage && !options.center ? options.items : +1;
		_this.naviLoop(pagination);
	}

	/* goTo prev position */

	_this.prev = function(){
		var pagination = options.scrollPerPage && !options.center ? -options.items : -1;
		_this.naviLoop(pagination);
	}
	/* goTo pext position*/

	_this.nextone = function(){
		var pagination = options.scrollPerPage && !options.center ? options.items : +1;
		_this.naviLoop(pagination);
	}

	/* goTo prev position */

	_this.prevone = function(){
		var pagination = options.scrollPerPage && !options.center ? -options.items : -1;
		_this.naviLoop(pagination);
	}

	/* Create Navigation */

	_this.navigation = function(){
		if (options.navigation === true) {

			/* Create nav container */
			var naviContainer = document.createElement('div');
			naviContainer.className = "phenix-nav";
			_this.navContainer = naviContainer;
			_this.$el.append(naviContainer);

			/* Create left and right buttons */

			var navLeft = document.createElement('a');
			var navRight = document.createElement('a');

			navLeft.className = "phenix-nav-left " + (options.naviLeftClass || "");
			navRight.className = "phenix-nav-right " + (options.naviRightClass || "");

			$(naviContainer).append(navLeft,navRight);

			/* add events */
			var clickState;
			if (options.touchDrag && _this.supportTouch && !_this.browser.touchIE()) {
				clickState = 'touchend';
			} else{
				clickState = 'mouseup'
			}

			_this.addEvent(navLeft,clickState, _this.prev);
			_this.addEvent(navRight,clickState, _this.next);
			
			_this.addEvent(navLeft,clickState, _this.prevone);
			_this.addEvent(navRight,clickState, _this.nextone);

			_this.updateNavigation();
		}
	}

	_this.updateNavigation = function(){
		if(options.items === _this.$oItems.length){
			_this.navContainer.style.display = "none"
		}else{
			_this.navContainer.style.display = "block"
		}
	}

	/* Custom Events */

	_this.customEvents = function () {

		_this.$el.on("phenix-next", function () {
			_this.next();
		});

		_this.$el.on("phenix-prev", function () {
			_this.prev();
		});

	}
	
	_this.customEventsone = function () {

		_this.$el.on("phenix-next-one", function () {
			_this.nextone();
		});

		_this.$el.on("phenix-prev-one", function () {
			_this.prevone();
		});

	}

	/* Events */

	_this.events = function(){
		var on = _this.addEvent;
		var target = _this.wrapper;
		_this.evenTypes = ["p", "h", "e", "x"];

		/* Transitions End */

		var transition = _this.browser.whichTransitionEvent();
		on(target, transition, _this.wrapperTransitionEnd);

		/* Responsive */
		
		on(window, 'resize', _this.responsiveTimer);

		/* Find events */

		if (options.touchDrag && _this.supportTouch && !_this.browser.touchIE()) {
			_this.evenTypes = [
			"touchstart",
			"touchmove",
			"touchend",
			"touchcancel"
			];
		} else if(options.touchDrag && _this.browser.touchIE() ){
			_this.evenTypes = [
			"MSPointerDown",
			"MSPointerMove",
			"MSPointerUp"
			];
		} else if(options.mouseDrag){
			_this.evenTypes = [
			"mousedown",
			"mousemove",
			"mouseup"
			];
		} else {
			return false;
		}

		//touchEvents
		on(target, _this.evenTypes[0], onTouchStart);

		/* Moved add event listener to touch events functions */
		//on(document, _this.evenTypes[1], onTouchMove);
		//on(document, _this.evenTypes[2], onTouchEnd);
		
		if(_this.supportTouch && !_this.browser.touchIE()) {on(document, _this.evenTypes[3], onTouchEnd)};

		if(options.mouseDrag){

			 /* firefox startdrag fix */
			_this.$wrapper.on("dragstart", function() {
				return false;
			});
			//disable text select
			_this.wrapper.onselectstart = function(){return false};
		}
	}

	function onTouchStart(event){
		var ev = event.originalEvent || event || window.event;

		if (ev.which === 3) { // prevent right click
			return false;
		}

		_this.touches.startTime = new Date().getTime();

		_this.touches.updatedX = false;
		_this.setWrapperTransition(0);
		
		_this.isTouch = true;
		_this.isTouched = false;
		_this.isScrolling = false;
		_this.touches.distance = 0;

		var isTouchEvent = ev.type == 'touchstart';
		var pageX = isTouchEvent ? event.targetTouches[0].pageX : (ev.pageX || ev.clientX);
		var pageY = isTouchEvent ? event.targetTouches[0].pageY : (ev.pageY || ev.clientY);


		//get wrapper position left
		_this.touches.offsetX = _this.$wrapper.position().left - options.siblingsMargin;
		_this.touches.offsetY = _this.$wrapper.position().top;

		_this.touches.startX = pageX - _this.touches.offsetX;
		_this.touches.startY = pageY - _this.touches.offsetY;

		_this.touches.start = pageX - _this.touches.startX;
		_this.targetTouchElement = ev.target || ev.srcElement;
		_this.isSwiping = false;

		_this.targetTouchElement = ev.target || ev.srcElement;

		_this.addEvent(document, _this.evenTypes[1], onTouchMove);
		_this.addEvent(document, _this.evenTypes[2], onTouchEnd);
	}

	function onTouchMove(event){
		if (!_this.isTouch){
			return;
		}

		if (_this.isScrolling){
			return;
		}

		var ev = event.originalEvent || event || window.event;
		var isTouchEvent = ev.type == 'touchmove';

		var pageX = isTouchEvent ? event.targetTouches[0].pageX : (ev.pageX || ev.clientX);
		var pageY = isTouchEvent ? event.targetTouches[0].pageY : (ev.pageY || ev.clientY);

		/* Drag Direction */
		_this.touches.currentX = pageX - _this.touches.startX;
		_this.touches.currentY = pageY - _this.touches.startY;
		_this.touches.distance = _this.touches.currentX - _this.touches.offsetX;

		/* Check move direction */

		if (_this.touches.distance < 0) {
			_this.dragDirection = "left";
		} else {
			_this.dragDirection = "right";
		}

		/* Loop */
		if(_this.touches.currentX > -_this.elWidth +_this.itemWidth && _this.dragDirection === "right" ){
			_this.touches.currentX -= _this.wrapperWidth - (2*_this.elWidth);
		}else if(_this.touches.currentX < -_this.wrapperWidth  -_this.itemWidth + (2*_this.elWidth) && _this.dragDirection === "left" ){
			_this.touches.currentX += _this.wrapperWidth - (2*_this.elWidth)
		}

		/* Lock browser if swiping horizontal*/

		if ((_this.touches.distance > 8 || _this.touches.distance < -8)) {
			if (ev.preventDefault !== undefined) {
				ev.preventDefault();
			} else {
				ev.returnValue = false;
			}
			_this.isSwiping = true;
		}

		_this.touches.updatedX = _this.touches.currentX

		/* Lock phenix if scrolling */

		if ((_this.touches.currentY > 16 || _this.touches.currentY < -16) && _this.isSwiping === false) {
			 _this.isScrolling = true;
			 _this.touches.updatedX = _this.touches.start;
		}

		 /* To Do */

		 _this.wrapperTranslate( _this.touches.updatedX );
	}

	function onTouchEnd(event){
		if (!_this.isTouch){
			return;
		}

		_this.removeEvent(document, _this.evenTypes[1], onTouchMove);
		_this.removeEvent(document, _this.evenTypes[2], onTouchEnd);

		_this.isTouch = false;
		_this.isSwiping = false;
		_this.isScrolling = false;

		if(_this.touches.distance === 0){
			return false
		}

		_this.isTouched = true;

		/* prevent clicks while scrolling*/

		_this.touches.endTime = new Date().getTime();
		var compareTimes = _this.touches.endTime - _this.touches.startTime;
		var distanceAbs = Math.abs(_this.touches.distance);

		//if(distanceAbs > 5 && compareTimes > 200){

		if(distanceAbs > 3 || compareTimes > 300){
			_this.removeClick(_this.targetTouchElement);
		}

		var  newPosition = _this.closestItem(_this.touches.updatedX, 30);

		/* Go to new position */

		_this.goTo(newPosition);

		/* If new position is same as old, trnasitionEnd event wont fire */

		if(_this.itemsInArray[newPosition] === _this.touches.updatedX){
			window.setTimeout(_this.wrapperTransitionEnd(),0)
		}
	}

	_this.closestItem = function(positionX, pullToEdge){
		var array = _this.itemsInArray,
		goal = positionX,
		closest = null,
		newPosition,
		prevPosition = _this.positions.currentAbs,
		pullPosition,
		pull = pullToEdge;
		

		$.each(array, function (i, v) {

			if (goal + pull<= v && goal + pull >= array[i + 1] && _this.dragDirection === "left") { 
				closest = array[i + 1];
				newPosition = options.swipePerPage ? i + options.items : i + 1;
			} 
			else if(goal - pull<= v && goal -pull>= (array[i + 1] || array[i] - _this.elWidth) && _this.dragDirection === "right"){
				closest = v;
				newPosition = options.swipePerPage ? i - options.items : i;
			}

		});

		/* Remove pull to edge */
		if(newPosition===undefined){
			newPosition = _this.closestItem(positionX, 0)
		}

		return newPosition;
	}

	/* Remove click event from item */

	_this.removeClick = function(target){
		var on = _this.addEvent;
		_this.releaseClickEl = target;
		on(target,'click', _this.preventClick)
	}

	_this.preventClick = function(ev){
		if(ev.preventDefault) {
			ev.preventDefault();
		}else {
			ev.returnValue = false;
		}
		if(ev.stopPropagation){
			ev.stopPropagation();
		}
		_this.removeEvent(_this.releaseClickEl,'click',_this.preventClick);
	}

	/* Callback listener - To do custom events */

	_this.callbacks = function(type, item){
		var callback = type;

		if(type === "onAfterInit"){
			if (typeof options.afterInit === "function") {
				options.afterInit.apply(this); //options callback
			}
			_this.lazyImageModule();
		}else if(type === "onTransitionEnd"){
			_this.lazyImageModule();
		}else if(type === "onAfterResponsive"){
			_this.lazyImageModule();
		}else if(type === "onActiveItems"){
			
		}

	}
	/* Modules to do*/

	_this.lazyImageModule = function(){
		if(!options.lazyImage){return false}
		if(_this.allLazyImagesLoaded){return false}

		var windowWidth,
			trueIndex,
			activePage,
			isLoaded,
			img,
			countLoaded=0;

		for(var i=0; i<_this.$items.length; i++){
			trueIndex = _this.$items[i].getData('index');
			activePage = _this.$items[i].isActive();
			isLoaded = _this.$items[i].isLazyImageLoaded()
			
			if(isLoaded){
				countLoaded +=1;
			}
			if(countLoaded === _this.$items.length){
				_this.allLazyImagesLoaded = true;
				return false;
			}

			if(activePage && !isLoaded ){
				_this.$items[i].setLazyImage();
				img = hasLazyImage(_this.$items.eq(i));
				if(img.length > 0) {
					loadLazyImage(img)
				}
			}else if(windowWidth <= 480 && options.unloadLazyImageOnMobile === true){
				if(!activePage && isLoaded ){
					img = hasLazyImage(_this.$items.eq(i));
					if(img.length > 0) {
					unloadLazyImage(img, _this.$items[i]);
					}				
				}
			}
		}

		function hasLazyImage($item){
			return $item.find('img.lazyPhenix')
		}

		function loadLazyImage($img){
			for(var i=0; i<$img.length; i++){
				$img[i].src = $img[i].getAttribute('data-lazyphenix');
				$img[i].style.opacity = "1";
				firstImgWidth = $img[i].clientWidth;
				firstImgHeight = $img[i].clientHeight;
			}
		}

		function unloadLazyImage($img,item){
			for(var i=0; i<$img.length; i++){
				$img[i].style.opacity = "0";
				$img[i].src = $img[i].getAttribute('data-lazyplaceholder');
			}
			item.setData('lazyImage',false);
		}
	}

}

Phenix.prototype = {

	windowWidth : function() {
		if (window.innerWidth){
			return window.innerWidth
		} 
		else if (document.documentElement && document.documentElement.clientWidth){
			return document.documentElement.clientWidth;
		}
	},

	addEvent : function (element, event, listener) {
		if (element.addEventListener) {
			element.addEventListener(event, listener, false);
		}
		else if (element.attachEvent) {
			element.attachEvent('on' + event, listener);
		}
	},

	removeEvent : function (element, event, listener) {

		if (element.removeEventListener) {
			element.removeEventListener(event, listener, false);
		}
		else if (element.detachEvent) {
			element.detachEvent('on' + event, listener);
		}
	},
	/* To test */
	browser:{
		transform : function(){
			var xform = 'transform';
			['webkit', 'Moz', 'O', 'ms'].every(function (prefix) {
				var e = prefix + 'Transform';
				if (typeof view.style[e] !== 'undefined') {
					xform = e;
					return false;
				}
				return true;
			});
		},
		whichTransitionEvent : function(){
			var t;
			var el = document.createElement('fakeelement');
			var transitions = {
			  'transition':'transitionend',
			  'OTransition':'oTransitionEnd',
			  'MozTransition':'transitionend',
			  'WebkitTransition':'webkitTransitionEnd'
			}
			for(t in transitions){
				if( el.style[t] !== undefined ){
					return transitions[t];
				}
			}
		},
		isTransform3d : function(){
			var d = document.createElement('div').style;
			var test = ("webkitPerspective" in d || "MozPerspective" in d || "OPerspective" in d || "MsPerspective" in d || "perspective" in d);
			return test;
		},

		isTouchDevice : function(){
			return 'ontouchstart' in window || !!(navigator.msMaxTouchPoints);
		},
		touchIE: function(){
			return window.navigator.msPointerEnabled
		}
	}
}

if (window.jQuery || window.Zepto || window.$) {
	(function($){
		$.fn.phenix = function(options) {
			return this.each(function () {
				var carousel = new Phenix($(this)[0], options);
				$(this).data('phenix',carousel);
				carousel.init();
			});
		}
	})(window.jQuery || window.Zepto || window.$)
}


/* Phenix extended modules to do here*/