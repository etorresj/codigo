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
		<h3>Suscripciones</h3>
		<table class="data">
			<form method="post" action="index.php?section=newsLetter">
				<tr>
					<td colspan="6">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=exportarNewsLetter&search=<?php echo $search; ?>">
										<input type="button" class="button" value="Exportar a Excel">
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
				<th class="data">Correo</th>
				<th class="data">Regi&oacute;n</th>
				<th class="data">Especialidad</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($servicios)
			foreach ($servicios as $servicio) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $servicio['id']; ?></td>
				<td class="data"><?php echo ($servicio['correo']); ?></td>
				<td class="data"><?php echo $servicio['nombreRegion']; ?></td>
				<td class="data">
				<?php echo $servicio['nombreEsp']; ?>
				</td>
				

				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarNewsLetter('<?php echo $servicio['id']; ?>');">
					
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