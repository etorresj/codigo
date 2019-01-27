<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraci&oacute;nm Chopo">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> 
<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Sucursal agregada correctamente</div>';
			else if($error) echo '<div class="gagal">Archivo no válido, porfavor verifique</div>'; 
		?>
		<h3>Agregar Sucursal</h3>
		<form method="post" action="?section=editarSucursal" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="sedang" value="<?php echo $sucursal[0]['nombre'] ?>">
						<input type="hidden" name="id" value="<?php echo $sucursal[0]['id'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Neumonico</td>
					<td class="data">
						<input type="text" name="neumonico" class="sedang" value="<?php echo $sucursal[0]['neumonico'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Localidad</td>
					<td class="data">
						<select name="localidad_id">
							<?php foreach($localidades as $localidad) { 
								$selected='';
								  if($sucursal[0]['localidad_id']==$localidad['id'])
								  	$selected='selected="selected"';
								  ?>
								<option value="<?php echo $localidad['id'] ?>" <?php echo $selected; ?>><?php echo $localidad['nombre'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Tipo</td>
					<td class="data">
						<select name="tipo_id">
							<?php foreach($tipos as $tipo) { 
								$selected='';
								  if($sucursal[0]['tipo_id']==$tipo['id'])
								  	$selected='selected="selected"';
								  ?>
								<option value="<?php echo $tipo['id'] ?>" <?php echo $selected; ?>><?php echo $tipo['nombre'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Visible</td>
					<td class="data">
						<select name="visible">
							<option value="1" <?php echo $sucursal[0]['visible']?'selected="selected"':''; ?>>Si</option>
							<option value="0"<?php echo $sucursal[0]['visible']?'':'selected="selected"'; ?>>No</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
					</td>
				</tr>
				<tr>
					<td class="data">Alta especialidad</td>
					<td class="data">
						<select name="altaEspecialidad">
							<option value="1" <?php echo $sucursal[0]['altaEspecialidad']?'selected="selected"':''; ?>>Si</option>
							<option value="0"<?php echo $sucursal[0]['altaEspecialidad']?'':'selected="selected"'; ?>>No</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Latitud</td>
					<td class="data">
						<input type="text" name="latitud" class="sedang" value="<?php echo $sucursal[0]['latitud'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Longitud</td>
					<td class="data">
						<input type="text" name="longitud" class="sedang" value="<?php echo $sucursal[0]['longitud'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Tel&eacute;fonos</td>
					<td class="data">
						<input type="text" name="telefonos" class="sedang" value="<?php echo $sucursal[0]['telefonos'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Direcci&oacute;n</td>
					<td class="data">
						<textarea name="direccion"><?php echo $sucursal[0]['direccion'] ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Descripci&oacute;n</td>
					<td class="data">
						<textarea name="descripcion"><?php echo $sucursal[0]['descripcion'] ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Accesabilidad</td>
					<td class="data">
						<textarea name="accesabilidad"><?php echo $sucursal[0]['accesabilidad'] ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Horario</td>
					<td class="data">
						<input type="text" name="horario" class="sedang" value="<?php echo $sucursal[0]['horario']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Tag</td>
					<td class="data">
						<input type="text" name="tag" class="sedang" value="<?php echo $sucursal[0]['tag'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Keywords</td>
					<td class="data">
						<input type="text" name="keyword" class="sedang" value="<?php echo $sucursal[0]['keyword'] ?>">
					</td>
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