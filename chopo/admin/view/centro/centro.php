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
		<h3>Centro Analítico</h3>
		<table class="data">
			<form method="post" action="index.php?section=centroAnalitico">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarCentro">
										<input type="button" class="button" value="Agregar Centro Analítico">
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
				<th class="data">Nombre</th>
				<th class="data" width="75px">Editar</th>
			</tr>
			<?php 
			if($centros)
			foreach ($centros as $centros) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $centros['id']; ?></td>
				<td class="data"><?php echo $centros['nombre'] ?></td>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarCentro&id=<?php echo $centros['id'] ?>">
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