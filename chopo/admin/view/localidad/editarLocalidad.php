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
			if($success) echo '<div class="sukses">Localidad '.$localidad[0]['nombre'].'  editada correctamente</div>';
			else if($error) echo '<div class="gagal">Error cargando datos</div>'; 
		?>
		<h3>Editar <?php echo $localidad[0]['nombre'] ?></h3>
		<form method="post" action="?section=editarLocalidad" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="sedang" value="<?php echo $localidad[0]['nombre'] ?>">
						<input type="hidden" name="id" value="<?php echo $localidad[0]['id']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Región</td>
					<td class="data">
						<select name="region_id">
							<?php foreach($regiones as $region) { 
								  $selected='';
								  if($localidad[0]['region_id']==$region['id'])
								  	$selected='selected="selected"';
								  ?>
								<option value="<?php echo $region['id'] ?>" <?php echo $selected; ?>><?php echo $region['nombre'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">C.P.</td>
					<td class="data">
						<input type="text" name="cp" class="sedang" value="<?php echo $localidad[0]['cp'] ?>">
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