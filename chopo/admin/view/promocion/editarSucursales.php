<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> 
<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/dependencias.js"></script>
<script type="text/javascript" src="js/dependenciasSucursal.js"></script>

<script type="text/javascript">
	//Cargando regiones
	$(document).ready(function(){
	cargarRegionS();
	$("#localidadS").attr("disabled",true);
	$("#sucursalS").attr("disabled",true);
	$("#tipo").attr("disabled",true);
	$("#regionS").change(function(){cargaLocalidadS();});
	$("#regionS").change(function(){cargaTipo();});
	$("#tipo").change(function(){cargaLocalidadS();});


	$("#localidadS").change(function(){cargaSucursalS();});
	
	});
</script>

</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		
		 <div class="clear"></div>
		<h3><?php echo $promocion[0]['nombre']; ?> - Sucursales</h3>
		<table class="data">
			
			<tr class="data">
				<th class="data" width="30px">C&oacute;digo</th>
				<th class="data">Nombre</th>
				<th class="data">Localidad</th>
				<th class="data">Región</th>
				<th class="data">Precio</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($sucursales)
			foreach ($sucursales as $sucursal) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $sucursal['sucursal_id']; ?></td>
				<td class="data"><?php echo ($sucursal['nombre']) ?></td>
				<td class="data"><?php echo ($sucursal['nombreLoc']) ?></td>
				<td class="data"><?php echo ($sucursal['nombreReg']) ?></td>
				<td class="data">$<?php echo ($sucursal['precio']) ?></td>
				
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarSucursal('<?php echo $sucursal['promoId']; ?>','<?php echo $id; ?>');">
					
				</center>
				</td>
			</tr>
			<?php } 
			else {
				?>
				<tr>
					<td colspan="5" align="center">
						No se encontró ningún registro
					</td>
				</tr>
			<?php } ?>
		</table>
		 <?php 
		 if($paginas>1)
		 include "view/estructura/paginador.php"; 
		 ?>
		
			<h3>Agregar Sucursal</h3>
		<form method="post" action="?section=editarPromocionSucursales" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Regi&oacute;n</td>
					<td class="data">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<select name="region" id="regionS">
							<option value="0">Seleccione</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Tipo</td>
					<td class="data">
						<select name="tipo" id="tipo">
							<option value="0">Seleccione</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Localidad</td>
					<td class="data">
						<select name="localidad" id="localidadS">
							<option value="0">Seleccione</option>	
						</select> * Dejar vac&iacute;o para seleccionar toda una regi&oacute;n
					</td>
				</tr>
				<tr>
					<td class="data">Sucursal</td>
					<td class="data">
						<select name="sucursal" id="sucursalS">
							<option value="0">Seleccione</option>	
						</select> * Dejar vac&iacute;o para seleccionar toda una localidad
					</td>
				</tr>
				<tr>
					<td class="data">Precio Normal</td>
					<td>
						<input type="text" name="precioNormal" value="<?php echo $precio; ?>">
						<input type="hidden" name="servicio_codigo" value="<?php echo $promocion[0]['servicio_codigo']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Precio Promoci&oacute;n</td>
					<td><input type="text" name="precio"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>		

	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>