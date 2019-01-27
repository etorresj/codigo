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
		<h3>Especialidades</h3>
		<table class="data">
			<form method="post" action="index.php?section=especialidades">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarEspecialidad">
										<input type="button" class="button" value="Agregar Especialidad">
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
				<th class="data">Especialidad</th>
				<th class="data">Sucursal</th>
				<th class="data" width="75px">Editar</th>
			</tr>
			<?php 
			if($localidades)
			foreach ($localidades as $localidad) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $localidad['id']; ?></td>
				<td class="data"><?php echo $localidad['nombre'] ?></td>
				<td class="data"><?php echo $localidad['nombreSucursal'] ?></td>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarEspecialidad&id=<?php echo $localidad['id'] ?>">
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