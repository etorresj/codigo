<?php include('lib/header.php') ?>  



<div id="slider1wrap"> 
	        <div class="container demo-1">
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				
				<?php $sliders=$chopo->getBanners();
				$i=1;
				foreach($sliders as $slider) { ?>
					<div class="sl-slide bg-<?php echo $i; ?>" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner">
						<img src="images/banners/<?php echo $slider['img']; ?>" alt="slider1" height="300" width="100%" />
						</div>
					</div>
				<?php 
					$i++;
					} ?>
					
				</div><!-- /sl-slider -->
				
				<nav id="nav-arrows" class="nav-arrows">
					<span class="nav-arrow-prev">Previous</span>
					<span class="nav-arrow-next">Next</span>
				</nav>

				<nav id="nav-dots" class="nav-dots">
					<span class="nav-dot-current"></span>
					<?php for($i=1; $i<sizeof($sliders);$i++)
							echo "<span></span>";
					?>
					
					
				</nav>

			</div><!-- /slider-wrapper -->

        </div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
		<script type="text/javascript" src="js/jquery.slitslider.js"></script>

		<script type="text/javascript">	
			$(function() {
			
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ),
						$nav = $( '#nav-dots > span' ),
						slitslider = $( '#slider' ).slitslider( {
							onBeforeChange : function( slide, pos ) {

								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );

							}
						} ),

						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':last' ).on( 'click', function() {

								slitslider.next();
								return false;

							} );

							$navArrows.children( ':first' ).on( 'click', function() {
								
								slitslider.previous();
								return false;

							} );

							$nav.each( function( i ) {
							
								$( this ).on( 'click', function( event ) {
									
									var $dot = $( this );
									
									if( !slitslider.isActive() ) {

										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									
									}
									
									slitslider.jump( i + 1 );
									return false;
								
								} );
								
							} );

						};

						return { init : init };

				})();


				//$("#arg").html('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');

				Page.init();

				/**
				 * Notes: 
				 * 
				 * example how to add items:
				 */

				
				
				//var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
				
				// call the plugin's add method
				//slitslider.add($items);

				
			
			});
		</script>
</div>





















<div id="contentwrap"> 
	<div id="content">  
		<div class="boxverde" onclick="window.location='estudios.php'">
			<img src="images/serv-estudios.png" alt="serv-estudios" width="51" height="51" />
				<h2>Estudios de Laboratorio y Gabinete</h2>
				<p>Tenemos los estudios que usted necesita, con tecnología de vanguardia.</p>
				<a href="estudios.php" class="link">Ver más</a>
		</div>
		<div class="boxverde der" onclick="window.location='sucursales.php'">
			<img src="images/serv-sucursales.png" alt="serv-sucursales" width="52" height="51" />
				<span><h2>La red más amplia de Sucursales</h2></span>
				<p>Mas de 170 sucursales, servicio los 365 días del año</p><a href="sucursales.php" class="link">Ver más</a>
		</div>
		<div class="boxverde" onclick="window.location='servicios.php'">
			<img src="images/serv-calidad.png" alt="serv-calidad" width="51" height="51" />
				<h2>Calidad Certificada</h2>
				<p>Para tu seguridad contamos con certificaciones nacionales e internacionales</p><a href="servicios.php" class="link mas">Ver más</a>		
		</div>
		<div class="boxverde der" onclick="window.location='resultados.php'">
			<img src="images/serv-resultados.png" alt="serv-resultados" width="51" height="51" />
				<h2>Resultados en Línea</h2>
				<p>Consulta o recibe por correo tus resultados de laboratorio.</p><a href="resultados.php" class="link mas">Ver más</a>
		</div>
		<div class="boxazul">
			<h2><img src="images/fon-white.png" alt="fon-white"/>01800 00 CHOPO (24676)</h2>
			<p id="chopoIdRegion"></p>
			<ul>
				<li><a href="https://www.facebook.com/chopo.com.mx" target="_blank"><img src="images/icon-face.png" alt="icon-face"/></a></li>
				<li><a href="https://twitter.com/chopo_cercadeti" target="_blank"><img src="images/icon-twitter.png" alt="icon-twitter"/></a></li>
				<li><a href="https://plus.google.com/u/0/+chopo/posts" target="_blank"><img src="images/icon-google.png" alt="icon-google"/></a></li>
				<li><a href="http://www.youtube.com/user/ChopoCercaDeTi?feature=watch" target="_blank"><img src="images/icon-youtube.png" alt="icon-youtube"/></a></li>
			</ul>			
		</div>
		<div style="clear:both"></div>
		
		<div class="barraazul">PROMOCIONES</div>
		<div class="slider2">
			
			<div class="carousel-wrap">
			<div class="phenix local" id="arg" >
			
			<?php
			$promociones = $chopo->getPromociones($_SESSION['chopoRegion']);
			if($promociones)
				foreach($promociones as $promocion) {
			?>
			

			<div class="article">
				<img src="images/promocion/<?php echo $promocion['imagen'] ?>" alt="<?php echo $promocion['nombre'] ?>" width="100" height="100">
				<span class="azul"><?php echo utf8_encode($promocion['nombre']) ?></span>
				<p><?php echo utf8_encode($promocion['patologia']) ?></p>
				<a href="promocion.php?codigoPromo=<?php echo $promocion['codigo']; ?>&region=<?php echo $_SESSION['chopoRegion']; ?>" class="azul">Ver Mas</a>
			</div>

				<?php } ?>
				
			</div>
			<a href="" class="phenix-prev"></a>
			<a href="" class="phenix-next"></a>
		</div>
	
		
		</div>
	</div>
	<div id="seccion3wrap">
		<div id="seccion3">
			<div class="barrablanca">
				Tips de Salud
			</div>
			<div class="slider2">
				<div class="carousel-wrap">
					<div class="phenix one">
						
						<?php $tips=$chopo->getTips(); 
							if($tips)
							foreach($tips as $tip) {
						?>
						<div class="article-one">
							<img src="images/tips/<?php echo $tip['img']; ?>" alt="loultimo">
							<span class="blanco"><?php echo utf8_encode($tip['titulo']); ?></span>
							<p>
								<?php echo utf8_encode($tip['resumen']); ?>
							</p>
							<a href="tips.php?id=<?php echo $tip['id']; ?>"><img src="images/seguir-leyendo.jpg" alt="seguir-leyendo" /></a>
							<div style="clear:both"></div>
						</div>
						<?php } ?>
						
					</div>
					<a href="" class="phenix-prev-one"></a>
					<a href="" class="phenix-next-one"></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/phenix.js"></script>
	<script>
	$(document).ready(function($) {


		


		$(".local").phenix({
			responsiveItems : [
				[320, 1],
		        [480, 2],
		        [600, 2],
		        [700, 2],
		        [800, 3]
		      ]
		});
		$(".one").phenix({
			responsiveItems : [
				[320, 1],
		        [480, 1],
		        [600, 1],
		        [700, 1],
		        [800, 1]
		      ]
		});

		$(".center").phenix({
			scrollPerPage: true,
			centerItem:true,
			siblingsMargin: 70,
			responsiveItems : [
				[320, 1],
		        [480, 1],
		        [700, 3],
		        [1000, 5]
		      ],
		    itemStyle:{
		    	marginRight:0,
		    	marginRightPercent:0
		    }
		});


		$(".json").phenix({
			scrollPerPage: true,
			jsonPath: "json/content.json",
			jsonLazyLoad:true,
			jsonStructure: letsBuildStructure,
			responsiveItems : [
				[320, 1],
		        [480, 3],
		        [600, 5],
		        [700, 6],
		        [800, 7]
		      ]
		});

		$(".phenix-next").click(function(e){
			e.preventDefault();
			$(".local").trigger('phenix-next')
			//$(".json")[0].c()
		})

		$(".phenix-prev").click(function(e){
			e.preventDefault();
			$(".local").trigger('phenix-prev')
		})
		$(".phenix-next-one").click(function(e){
			e.preventDefault();
			$(".one").trigger('phenix-next-one')
			//$(".json")[0].c()
		})

		$(".phenix-prev-one").click(function(e){
			e.preventDefault();
			$(".one").trigger('phenix-prev-one')
		})

		$('.phenix-item').click(function(){
			console.log(this.getIndex());
		})

		function letsBuildStructure(data){
	        var html="",header,text,link,imgDestkop,imgTablet,result;
	        header = "<h3>"+ data.header +"</h3>";
	        text = "<p>"+ data.text +"</p>";
	        link = "<a href=\"\">"+ data.link +"</a>";
	        image = "<img src=\"" + data.imgDesktop + "\">"
	        html += header;
	        result = $("<div class=\"article-json\"></div>").append(html);
	        return result;
        }

	});


	</script>

<?php include('lib/footer.php') ?>  