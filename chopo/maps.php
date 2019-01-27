<?php include('lib/header.php') ?>  

<div id="contentwrap"> 
	<div id="content">  

	
 <style>
      #map_canvas {
        width: 500px;
        height: 400px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
      function initialize(lat,lng) {
          var myLatlng = new google.maps.LatLng(lat,lng);
		  var mapOptions = {
		    zoom: 15,
		    center: myLatlng,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		  var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map,
		      title:"Chopo"
		  });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>


<div id="map_canvas"></div>




<input type="button" value="casa" onclick="javascript:initialize(19.570444,-99.222848)">

<input type="button" value="escuela" onclick="javascript:initialize(19.546126,-99.240328)">

<input type="button" value="palacio" onclick="javascript:initialize(19.405343,-99.099630)">


		</div>
		<div style="clear:both"></div>
	</div>

	</div>
</div>
<?php include('lib/footer.php') ?>  