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

</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		
		 <div class="clear"></div>
		<h3>Estudios</h3>
		<table class="data">
			<form method="post" action="index.php?section=servicios">
				<tr>
					<td colspan="6">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarServicioDep">
										<input type="button" class="button" value="Agregar Estudio">
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
				<th class="data">Estudio</th>
				<th class="data">Departamento</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Sucursales</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($servicios)
			foreach ($servicios as $servicio) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $servicio['codigo']; ?></td>
				<td class="data"><?php echo ($servicio['nombre']); ?></td>
				<td class="data"><?php echo $servicio['nombreDep']?$servicio['nombreDep']:$servicio['nombreCen']; ?></td>
				<td class="data" width="75px">
				<center>
					
					<a href="?section=editarServicio&id=<?php echo $servicio['codigo'] ?>">
					
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<td class="data" width="75px">
				<center>
					
					<a href="?section=editarEstudioSucursales&id=<?php echo $servicio['codigo'] ?>">
					
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarServicio('<?php echo $servicio['codigo']; ?>');">
					
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