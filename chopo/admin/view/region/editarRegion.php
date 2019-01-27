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
			if($success) echo '<div class="sukses">Región '.$region[0]['nombre'].'  editada correctamente</div>';
			else if($error) echo '<div class="gagal">El folio '.$_POST['folio'].' ya existe o no es válido, porfavor verifique</div>'; 
		?>
		<h3>Editar <?php echo $region[0]['nombre'] ?></h3>
		<form method="post" action="?section=editarRegion" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="panjang" value="<?php echo $region[0]['nombre'] ?>">
						<input type="hidden" name="id" value="<?php echo $region[0]['id']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Visible</td>
					<td class="data">
						<select name="visible">
							<option value="1" <?php echo $region[0]['visible']?'selected="selected"':''; ?>>Si</option>
							<option value="0"<?php echo $region[0]['visible']?'':'selected="selected"'; ?>>No</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Latitud</td>
					<td class="data">
						<input type="text" name="latitud" class="panjang" value="<?php echo $region[0]['latitud']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Logitud</td>
					<td class="data">
						<input type="text" name="longitud" class="panjang" value="<?php echo $region[0]['longitud']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
					</td>
				</tr>
				<tr>
					<td class="data">Teléfono</td>
					<td class="data">
						<input type="text" name="telefono" class="panjang" value="<?php echo $region[0]['telefono'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Tags</td>
					<td class="data">
						<input type="text" name="tag" class="panjang" value="<?php echo $region[0]['tag'] ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Folio</td>
					<td class="data">
						<select name="folio_id">
							<?php foreach($folios as $folio) { 
								  $selected='';
								  if($region[0]['folio_id']==$folio['id'])
								  	$selected='selected="selected"';
								  ?>
								<option value="<?php echo $folio['id'] ?>" <?php echo $selected; ?>><?php echo $folio['folio'] ?></option>
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