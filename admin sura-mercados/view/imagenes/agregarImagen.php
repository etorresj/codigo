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
			if($success) echo '<div class="sukses">Imagen agregada correctamente</div>';
			else if($error) echo '<div class="gagal">Tipo de archivo no válido</div>'; 
		?>
		<h3> <?php echo $fondo; ?></h3>
		<form method="post" action="?section=agregarImagen" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data">Titulo:</td>
					<td class="data"><input type="text" class="panjang" name="titulo"></td>
				</tr>	
				
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="<?php echo $id; ?>">
                        <input type="hidden" name="navega" value="<?php echo $_GET['tipo']; ?>">
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