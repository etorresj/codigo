<?php include('lib/header.php');
extract($_GET);
$estudio=$chopo->getEstudioId($idEstudio);
$estudioPrecio=$chopo->getSucursalEstudio($idEstudio, $idSucursal);

$sucursal=$chopo->getSucursalId($idSucursal);
$sucursales=$chopo->getEstudioSucursales($idEstudio, $_SESSION['chopoRegion']);
$especialidades=$chopo->obtenerEspecialidadesSucursal($idSucursal);


 ?>  
<script type="text/javascript">
	//Cargando regiones
	$(document).ready(function(){
	
		initialize(<?php echo $sucursal[0]['latitud']; ?>, <?php echo $sucursal[0]['longitud']; ?>);
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
     // google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<div id="contentwrap"> 
	<div id="content">  
	
	
	<div id="content-in">
		<div id="left-menu" class="completo">
		<ul>
			<div class="titulo verde"><?php echo utf8_encode($estudio[0]['nombre']); ?></div>
			<div class="fondoverde">$<?php echo $estudioPrecio[0]['precio']; ?>.00 pesos</div>
		<?php if($estudio[0]['indicacion']) { ?>
		<p class="verde">Indicaciones:</p>
		<p><?php echo nl2br($estudio[0]['indicacion']); ?></p>
		<?php } ?>
		
		</ul>

		
		</div>
		
		
		<div class="left-menu-info" id="datosSucursal">
			<h1><?php echo utf8_encode(ucwords(strtolower($sucursal[0]['nombre']))); ?></h1>

			<p class="verde">Direccion:</p>
			<p><?php echo utf8_encode(ucwords(strtolower($sucursal[0]['direccion']))); ?></p>
			<p><span class="verde">Telefono:</span> <?php echo ucwords(strtolower($sucursal[0]['telefonos'])) ?></p>
			<!--<p class="verde">Especialidades:</p>
			<ul>
				<?php foreach($especialidades as $especialidad) 
						echo "<li>".ucwords(strtolower($especialidad['nombre']))."</li>";
				?> 
			</ul> -->
			
		</div>
		
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="right-content">
			<div id="map_canvas"></div>
			
			<div class="cuadro-blanco-info" id="horariosSucursal">
				<p class="verde">Sucursales:</p><p>
			<ul>
				<?php foreach($sucursales as $value) {
					echo "<a href='estudioSucursal.php?idEstudio=".$value['estudio_id']."&idSucursal=".$value['sucursal_id']."' target='_parent'>".ucfirst( strtolower(utf8_encode($value['nombre'])))."</a><br>";
				}
				?>
			</ul>
		</p>
			</div>
	</div>
		<div style="clear:both"></div>
	</div>
</div>
<?php include('lib/footer.php') ?>  