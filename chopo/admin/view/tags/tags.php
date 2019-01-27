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
		<h3>Tags</h3>
		<table class="data">
			<form method="post" action="index.php?section=tags">
				<tr>
					<td colspan="4">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarTag">
										<input type="button" class="button" value="Agregar Tag">
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
				<th class="data">Folio</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($folios)
			foreach ($folios as $folio) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $folio['id']; ?></td>
				<td class="data"><?php echo $folio['tag'] ?></td>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarTag&id=<?php echo $folio['id'] ?>">
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarTag('<?php echo $folio['id']; ?>');">
					
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