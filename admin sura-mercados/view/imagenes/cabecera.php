<html>
<head>
<title>Sura - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Panel de Administración ymca">
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
			if($success) echo '<div class="sukses">Cabecera actualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Tipo de archivo no válido</div>'; 
		?>
		<h3>Actualizar Cabecera</h3>
		<form method="post" action="?section=cabecera" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
                        
					</td>
				</tr>
				
				
		
              
				
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
				<tr>
					<td class="data">Imagen Actual</td>
					<td class="data">
						<img src="images/<?php echo $cabeza[0]['img']; ?>" width="500">
                        
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