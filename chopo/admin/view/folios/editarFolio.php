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
			if($success) echo '<div class="sukses">Folio editado correctamente</div>';
			else if($error) echo '<div class="gagal">El folio '.$_POST['folio'].' ya existe, porfavor verifique</div>'; 
		?>
		<h3>Editar Folio <?php echo $folio[0]['folio'] ?></h3>
		<form method="post" action="?section=editarFolio">
			<table class="data">
				<tr>
					<td class="data">Folio</td>
					<td class="data">
						<input type="text" name="folio" class="sedang" value="<?php echo $folio[0]['folio'] ?>">
						<input type="hidden" name="id" value="<?php echo $folio[0]['id'] ?>">
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