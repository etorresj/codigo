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
		
		
		 <div class="clear"></div>
		<h3>Regiones</h3>
		<table class="data">
			<form method="post" action="index.php?section=region">
				<tr>
					<td colspan="4">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarRegion">
										<input type="button" class="button" value="Agregar Regi&oacute;n">
									</a>
								</td>
								<td align="right">
										<input type="text" id="search" name="search" value="<?php echo $search; ?>">
										<input type="submit" value="Buscar">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</form>
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Región</th>
				<th class="data" width="75px">Visible</th>
				<th class="data" width="75px">Editar</th>
			</tr>
			<?php 
			if($regiones)
			foreach ($regiones as $region) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $region['id']; ?></td>
				<td class="data"><?php echo $region['nombre'] ?></td>
				<td class="data" width="75px">
					<center>
						<a href="?section=region&visible=<?php echo $region['visible'] ?>&id=<?php echo $region['id'] ?>&search=<?php echo $search ?>">
							<img src="css/img/visible<?php echo $region['visible'] ?>.png">
						</a>
					</center>
				</td>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarRegion&id=<?php echo $region['id'] ?>">
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
			</tr>
			<?php } 
			else {
				?>
				<tr>
					<td colspan="5" align="center">
						No se encontró ningún registro
					</td>
				</tr>
			<?php } ?>
		</table>
		 <?php 
		 if($paginas>1)
		 include "view/estructura/paginador.php"; 
		 ?>
		
		

	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>