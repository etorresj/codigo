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
			if($success) echo '<div class="sukses">Departamento editado correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Editar <?php echo $departamento[0]['nombre']; ?></h3>
		<form method="post" action="?section=editarDepartamento" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="panjang" value="<?php echo $departamento[0]['nombre']; ?>">
						<input type="hidden" name="id" value="<?php echo $departamento[0]['id']; ?>">
						
					</td>
				</tr>
				<tr>
					<td class="data">Especialidad</td>
					<td class="data">
						<select name="especialidad_id">
							<?php foreach($especialidades as $especialidad) { 
									 $selected='';
								 	 if($departamento[0]['especialidad_id']==$especialidad['especialidad_id'])
								  		$selected='selected="selected"';
								?>
								<option value="<?php echo $especialidad['especialidad_id'] ?>" <?php echo $selected; ?>><?php echo ($especialidad['nombre']) ?></option>
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