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
		<h3>Sucursales</h3>
		<table class="data">
			<form method="post" action="index.php?section=sucursal">
				<tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarSucursal">
										<input type="button" class="button" value="Agregar Sucursal">
									</a>
								</td>
								<td align="right">
										<input type="text" id="search" name="search" value="<?php echo ($search); ?>">
										<input type="submit" value="Buscar">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</form>
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Sucursal</th>
				<th class="data">Región</th>
				<th class="data">Localidad</th>
				<th class="data">Tipo</th>
				<th class="data" width="75px">Visible</th>
				<th class="data" width="75px">Editar</th>
			</tr>
			<?php 
			if($sucursales)
			foreach ($sucursales as $sucursal) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $sucursal['id']; ?></td>
				<td class="data"><?php echo ($sucursal['nombre']) ?></td>
				<td class="data"><?php echo $sucursal['nombreLista'] ?></td>
				<td class="data"><?php echo $sucursal['nombreLocalidad'] ?></td>
				<td class="data"><?php echo $sucursal['nombreTipo'] ?></td>
				<td class="data" width="75px">
					<center>
						<a href="?section=sucursal&visible=<?php echo $sucursal['visible'] ?>&id=<?php echo $sucursal['id'] ?>&search=<?php echo $search ?>">
							<img src="css/img/visible<?php echo $sucursal['visible'] ?>.png">
						</a>
					</center>
				</td>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarSucursal&id=<?php echo $sucursal['id'] ?>">
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