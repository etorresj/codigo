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
			if($success) echo '<div class="sukses">Especialidad agregada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Agregar Especialidad</h3>
		<form method="post" action="?section=agregarEspecialidad" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="panjang">
					</td>
				</tr>
				<tr>
					<td class="data">Sucursal</td>
					<td class="data">
						<select name="sucursal_id">
							<?php foreach($sucursales as $sucursal) { ?>
								<option value="<?php echo $sucursal['id'] ?>"><?php echo ($sucursal['nombre']) ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Horario</td>
					<td class="data">
						<input type="text" name="horario" class="panjang">
					</td>
				</tr>
				<tr>
					<td class="data">Comentarios</td>
					<td class="data">
						<textarea name="comentarios"></textarea>
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