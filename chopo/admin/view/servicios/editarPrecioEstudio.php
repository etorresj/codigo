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

</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Precio editado correctamente</div>';
			else if($error) echo '<div class="gagal">Error cargando datos</div>'; 
		?>
		
			<h3>Editar Precio Sucursal</h3>
		<form method="post" action="?section=editarPrecioEstudio" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Regi&oacute;n</td>
					<td class="data">
						<?php echo $estudio[0]['nombreReg']; ?>
						<input type="hidden" name="idEstudio" value="<?php echo $idEstudio; ?>">
						<input type="hidden" name="idSucursal" value="<?php echo $idSucursal; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Localidad</td>
					<td class="data">
						<?php echo $estudio[0]['nombreLoc']; ?>
					</td>
				</tr>
				<tr>
					<td class="data">Sucursal</td>
					<td class="data">
						<?php echo $estudio[0]['nombre']; ?>
					</td>
				</tr>
				<tr>
					<td class="data">Precio </td>
					<td><input type="text" name="precio" value="<?php echo $estudio[0]['precio']; ?>"></td>
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