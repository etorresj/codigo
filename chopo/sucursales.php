<?php include('lib/header.php') ?>  
<script type="text/javascript" src="js/dependenciasSucursal.js"></script>
<script type="text/javascript">
	//Cargando regiones
	$(document).ready(function(){
	cargarRegionS();
	$("#localidadS").attr("disabled",true);
	$("#sucursalS").attr("disabled",true);
	$("#regionS").change(function(){cargaLocalidadS();});
	$("#regionS").change(function(){cargaLatitudRegion();});
	$("#localidadS").change(function(){cargaSucursalS();});
	$("#sucursalS").change(function(){cargaSucursalDatos();});
	$("#sucursalS").change(function(){cargaSucursalHorarios();});
	$("#sucursalS").change(function(){cargaLatitud();});



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
	
	
	<div id="content-in">
		<div id="left-menu" class="completo">
		<ul>
			<p>Región</p>
			<select id="regionS">
				<option value="0">Seleccione</option>
				
			</select>
			<p>Delegación/Municipio</p>
			<select id="localidadS">
				<option value="0">Seleccione</option>
				
			</select>
			<p>Sucursal</p>
			<select id="sucursalS">
				<option value="0">Seleccione</option>				
			</select>
		</ul>
		</div>
		
		
		<div class="left-menu-info" id="datosSucursal">
			
			

		</div>
		
		
		
		<div id="right-content">
			<div id="map_canvas"></div>
			
			<div class="cuadro-blanco-info" id="horariosSucursal">
				
			</div>
	</div>
		<div style="clear:both"></div>
	</div>
</div>
<?php include('lib/footer.php') ?>  