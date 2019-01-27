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
<script type="text/javascript">
	//Cargando regiones
	$(document).ready(function(){
	cargarRegion();
	$("#localidad").attr("disabled",true);
	$("#sucursal").attr("disabled",true);
	$("#region").change(function(){cargaLocalidad();});
	$("#localidad").change(function(){cargaSucursal();});
	
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
		<h3><?php echo $estudio[0]['nombre']; ?> - Sucursales</h3>
		<table class="data">
			
			<tr class="data">
				<th class="data" width="30px">C&oacute;digo</th>
				<th class="data">Nombre</th>
				<th class="data">Localidad</th>
				<th class="data">Regi&oacute;n</th>
				<th class="data" width="100px">Editar Precio</th>
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
				<td class="data" align="center">
					<a href="?section=editarPrecioEstudio&idEstudio=<?php echo $id; ?>&idSucursal=<?php echo $sucursal['sucursal_id']; ?>">
						$<?php echo ($sucursal['precio']) ?>
						<img src="css/img/oke.png" width="10">
					</a>
				</td>
				
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarSucursalEstudio('<?php echo $id; ?>','<?php echo $sucursal['sucursal_id']; ?>');">
					
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
		<form method="post" action="?section=editarEstudioSucursales" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Regi&oacute;n</td>
					<td class="data">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<select name="region" id="region">
							<option value="0">Seleccione</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Localidad</td>
					<td class="data">
						<select name="localidad" id="localidad">
							<option value="0">Seleccione</option>	
						</select> * Dejar vac&iacute;o para seleccionar toda una regi&oacute;n
					</td>
				</tr>
				<tr>
					<td class="data">Sucursal</td>
					<td class="data">
						<select name="sucursal" id="sucursal">
							<option value="0">Seleccione</option>	
						</select> * Dejar vac&iacute;o para seleccionar toda una localidad
					</td>
				</tr>
				<tr>
					<td class="data">Precio </td>
					<td><input type="text" name="precio"></td>
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