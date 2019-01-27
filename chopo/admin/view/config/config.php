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
			if($success) echo '<div class="sukses">Configuraci&oacute;n actualizada</div>';
			else if($error) echo '<div class="gagal">Las contrase&ntilde;as no coinciden</div>'; 
		?>
		<h3>Configuraci&oacute;n de sistema</h3>
		<form method="post" action="?section=config" enctype="multipart/form-data">
			<table class="data">
				
				<tr>
					<td class="data">Cambiar Contrase&ntilde;a</td>
					<td class="data">
						<input type="password" name="password">
					</td>
				</tr>
				<tr>
					<td class="data">Verificar Contrase&ntilde;a</td>
					<td class="data">
						<input type="password" name="passwordB">
					</td>
				</tr>
				<tr>
					<td class="data">Paginar Estudios</td>
					<td class="data">
						<input type="text" name="estudios" value="<?php echo $config[0]['estudios']; ?>">
					</td>
				</tr>
				
				
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Actualizar">
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