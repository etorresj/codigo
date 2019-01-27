<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> 
<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
<script src="js/main.js"></script>

</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Banner editado correctamente</div>';
			else if($error) echo '<div class="gagal">Tipo de archivo no válido</div>'; 
		?>
		<h3>Editar Banner</h3>
		<form method="post" action="?section=editarBanner" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
					</td>
				</tr>
				<tr>
					<td class="data">URL</td>
					<td class="data">
						<input type="text" name="url" value="<?php echo $banner[0]['url']; ?>" class="panjang">
						<input type="hidden" name="id" value="<?php echo $banner[0]['id']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Regi&oacute;n</td>
					<td class="data">
						<input name="todosTipos" type="checkbox" class="checkbox" id="todosTipos" onClick="javascript:SeleccionarCheck(this, 'forma1');" value=""  /> Todos<br>
						<?php foreach($regiones as $region) {
							$checked="";
							if($chopo->esRegion($id, $region['id']))
								$checked='checked="CHECKED"';
							 ?>
							<input type="checkbox" name="region[]"  value="<?php echo $region['id']; ?>" <?php echo $checked; ?>><?php echo $region['nombre']; ?><br>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="data">Visible</td>
					<td class="data">
						<select name="visible">
							<option value="1" <?php echo $banner[0]['visible']?'selected="selected"':''; ?>>Si</option>
							<option value="0"<?php echo $banner[0]['visible']?'':'selected="selected"'; ?>>No</option>
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