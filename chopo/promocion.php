
<?php include('lib/header.php');
$chopo=new front();

if($_SESSION['chopoRegion']!=$_GET['region'])
	$_GET['region']=$_SESSION['chopoRegion'];

$promocion=$chopo->obtenerPromocionDatos($_GET['codigoPromo'], $_GET['region']);
$promocion=$promocion[0];
//$regiones=$chopo->obtenerRegionesPromocion($_GET['codigoPromo']);
//$chopo->showArray($promocion);
$aviso=$promocion['aviso'];

function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

$path_info = parse_path();
//echo '<pre>'.print_r($path_info, true).'</pre>';



 ?>  
<script type="text/javascript" src="/js/dependenciasSucursal.js"></script>
<script type="text/javascript">
	//Cargando regiones
	$(document).ready(function(){
	cargaLocalidadPromo(<?php echo $_GET['codigoPromo']; ?>, <?php echo $_GET['region']; ?>);
	$("#sucursalPromo").attr("disabled",true);
	$("#localidadPromo").change(function(){cargaSucursalPromo(<?php echo $_GET['codigoPromo']; ?>);});
	$("#sucursalS").change(function(){cargaLatitud();});
	$("#sucursalS").change(function(){cargaPrecioSucursal(<?php echo $_GET['codigoPromo']; ?>);});



	});
</script>
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
      function initializeZoom(lat,lng, zo) {
          var myLatlng = new google.maps.LatLng(lat,lng);
		  var mapOptions = {
		    zoom: zo,
		    center: myLatlng,
		    
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		  
      }
      //google.maps.event.addDomListener(window, 'load', initialize);
       $(document).ready(function() {
      	initializeZoom(23.6266557,-102.5375006,5);
      });
    </script>
<div id="contentwrap"> 
	<div id="content">  

	
		<div id="left-content">
			<div id="info">
					<span class="titleazul promo"><?php echo utf8_encode($promocion['nombre']); ?></span>
					<?php if($promocion['precioNormal']) { ?>
					<div class="fondoverde" id="desdePrecio">

					  <?php if($promocion['precio']<=0) { ?>
					  	<p style="font-size: 12px">*Esta promoci&oacute;n no est&aacute; disponible en esta regi&oacute;n.</p>
					  <?php } else { ?>
					  <p>Desde: $<?php echo number_format($promocion['precio'], 2, '.', ','); ?> pesos </p>
					  <p style="font-size: 12px">*Precio puede variar de acuerdo a sucursal.</p>
					  <?php } ?>
					</div>
					<?php } ?>
					<?php if($promocion['finaliza']) { ?>
					<p class="azul">Vigencia:</p>
					<p><?php echo $chopo->convierteFecha($promocion['finaliza']); ?></p><br>
					<?php } ?>
					<?php if($promocion['incluye']) { ?>
					<p class="azul">Incluye:</p>
					<p><?php echo utf8_encode($promocion['incluye']); ?></p><br>
					<?php } ?>
					<?php if($promocion['recomendado']) { ?>
					<p class="azul">Estudio recomendado para:</p>
					<p><?php echo utf8_encode($promocion['recomendado']); ?></p><br>
					<?php } ?>
					<?php if($promocion['patologia']) { ?>
					<p class="azul">Patología a detectar:</p>
					<p><?php echo utf8_encode($promocion['patologia']); ?></p><br>
					<?php } ?>
					<?php if($promocion['indicaciones']) { ?>
					<p class="azul">Indicaciones:</p>
					<p><?php echo nl2br(utf8_encode($promocion['indicaciones'])); ?></p><br>
					<?php } ?>
					<?php if($promocion['nota']) { ?>
					<p class="azul">Comentario:</p>
					<p><?php echo utf8_encode($promocion['nota']); ?></p><br>
					<?php } ?>
					
					
			</div>
			<!-- <?php if($promocion['banner']) { ?>
			<input type="image" src="/images/promocion/banners/<?php echo $promocion['banner'] ?>" alt="imprimir_cupon" class="imprimir_cupon" />
			<?php } else if($promocion['imagen']) { ?>
			<input type="image" src="/images/promocion/<?php echo $promocion['imagen'] ?>" alt="imprimir_cupon" class="imprimir_cupon" />
			<?php } ?> -->

			<?php 
			$promociones = $chopo->getSimilaresFront($_SESSION['chopoRegion'], $_GET['codigoPromo']);
			if($promociones[0]['nombre']) {
			?>
			<div class="titleazul promo">Promociones similares</div>
			<?php } ?>
			<div id="similares">	
			
				<div class="slider2">
				<div class="carousel-wrap">
					<div class="phenix one" id="arg" >				
						<?php
						
			
						
						if($promociones)
							foreach($promociones as $promocion) {
								if($promocion['imagen']) {
						?>
						
			
						<div class="article">
						
							<div class="fondoblanco">
							<a href="/promocion.php?codigoPromo=<?php echo $promocion['codigo']; ?>&region=<?php echo $_SESSION['chopoRegion']; ?>">
								<img src="/images/promocion/<?php echo $promocion['imagen'] ?>" alt="<?php echo $promocion['nombre'] ?>" width="100" height="100">
							</a>
							</div>
							
								<div class="footcarrousel promo">
								<div class="nombre-promocion-carrousel">
									<?php echo utf8_encode($promocion['nombre']) ?>
								</div>
								
								<div class="bold">
									<?php 
									if(is_numeric($promocion['precio']))
										echo "$".$promocion['precio'].".00 pesos";
									else
										echo utf8_encode($promocion['precio']);
									 ?>
								</div>								
							</div>

							
						
						</div>
			
							<?php } 
						}
						?>
							
						</div>
					<?php if($promociones[0]['nombre']) { ?>	
						<a href="" class="phenix-prev-one"></a>
						<a href="" class="phenix-next-one"></a>
					<?php } ?>
					</div>	
					
				</div>
				</div>		
				
		    </div>
		
		
		
		<div id="right-content">
			<div id="importante">
				<div class="fondoverde importante">Aprovecha esta promoción</div>
				<p><strong><?php 
				if(is_numeric($promocion['precio']))
					echo "$".number_format($promocion['precio'], 2, '.', ',')." pesos";
				else
					echo utf8_encode($promocion['precio']);
				 ?></strong></p>
				 <?php echo utf8_encode($aviso); ?>
			</div>
			
			<div id="telefono">
				<p>Las sucursales, preparaciones y horarios disponibles para este estudio o promoción podrán ser confirmadas a los teléfonos:</p>
				<p>Distrito Federal: <strong>1946 0606</strong></p><br/>
				<p>En el interior: <strong>01 800 00 24676</strong></p>
				<p>También nos podrás mandar un correo electrónico a: <a href="mailto:informes.web@chopo.com.mx">informes.web@chopo.com.mx</a></p>
				<p><strong>Seleccione</strong></p><br>
				<p>
					Localidad: <select name="localidadPromo" id="localidadPromo" class="select_azul" tabindex="2">
						<option value="0">Seleccione</option>
		            </select>
				</p><br>
				<p>
					Sucursal: <select name="sucursalS" id="sucursalS" class="select_azul estado" tabindex="3">
		            <option value="0">Seleccione</option>
		            </select>
				</p><br>
				
				<a href="/contacto-promociones.php?codigoPromo=<?php echo $_GET['codigoPromo']; ?>&nombre=<?php echo utf8_encode($promocion['nombre']);  ?>" class='ajax'><input type="button" value="Pedir más información" class="infopromo"></a>
			</div>
			
			<div id="mapas"><br><br><br><div style="clear:both; height:250px"></div>
				<div id="map_canvas"></div>
			<div style="clear:both"></div>

			</div>
		</div>		
		
		
		<div style="clear:both"></div>
	</div>

	</div>
</div>
<script>

				
				//cargando combo region-especialidad
				
				$("#especialidadPromocion").attr("disabled",true);
				$("#regionPromocion").change(function(){cargaEspecialidadPromocion(<?php echo $_GET['codigoPromo'] ?>);});
				//
				//
				cargaEspecialidadPromocion(<?php echo $_GET['codigoPromo'] ?>);

</script>

<meta property="og:image" content="<img src="/images/promocion/<?php echo $promocion['imagen'] ?>" />
<meta property="og:title" content="<?php echo $promocion['nombre'] ?>" />
<meta property="og:description" content="<?php echo $promocion['precio'] ?>" />

<script src="/js/phenix.js"></script>
	<script>
	$(document).ready(function($) {
		$(".one").phenix({
			responsiveItems : [
				[320, 1],
		        [480, 1],
		        [600, 1],
		        [700, 1],
		        [800, 1]
		      ]
		});
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

	});


	</script>
<?php include('lib/footer.php') ?>  