<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
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
			if($success) echo '<div class="sukses">Regi&oacute;n agregada correctamente</div>';
			else if($error) echo '<div class="gagal">Tipo de archivo no válido</div>'; 
		?>
		<h3>Agregar Regi&oacute;n</h3>
		<form method="post" action="?section=agregarRegion" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="panjang">
					</td>
				</tr>

				<tr>
					<td class="data">Visible</td>
					<td class="data">
						<select name="visible">
							<option value="1" selected="selected">Si</option>
							<option value="0">No</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Latitud</td>
					<td class="data">
						<input type="text" name="latitud" class="panjang">
					</td>
				</tr>
				<tr>
					<td class="data">Logitud</td>
					<td class="data">
						<input type="text" name="longitud" class="panjang">
					</td>
				</tr>
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
					</td>
				</tr>
				<tr>
					<td class="data">Tel&eacute;fono</td>
					<td class="data">
						<input type="text" name="telefono" class="panjang">
					</td>
				</tr>
				<tr>
					<td class="data">Tags</td>
					<td class="data">
						<input type="text" name="tag" class="panjang">
					</td>
				</tr>
				<tr>
					<td class="data">Folio</td>
					<td class="data">
						<select name="folio_id">
							<?php foreach($folios as $folio) { ?>
								<option value="<?php echo $folio['id'] ?>"><?php echo $folio['folio'] ?></option>
							<?php } ?>
						</select>
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