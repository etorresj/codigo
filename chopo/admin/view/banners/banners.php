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
		<h3>Banners</h3>
		<table class="data">
			<form method="post" action="index.php?section=folios">
				<tr>
					<td colspan="6">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarBanner">
										<input type="button" class="button" value="Agregar Banner">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
			</form>
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Banner</th>
				<th class="data" width="75px">Visible</th>
				<th class="data" width="75px">Orden</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			$j=0;
			$registros=count($folios)-1;
			if($folios)
			foreach ($folios as $value) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $value['id']; ?></td>
				<td class="data">
					<a href="<?php echo $value['url']; ?>" target="top">
						<img src="../images/banners/<?php echo $value['img']; ?>" width="250">
					</a>
				</td>
				
				<td class="data" width="75px">
					<center>
						<a href="?section=banners&visible=<?php echo $value['visible'] ?>&id=<?php echo $value['id'] ?>&search=<?php echo $search ?>">
							<img src="css/img/visible<?php echo $value['visible'] ?>.png">
						</a>
					</center>
				</td>

				<td class="data"><center>
							  <?php  if($j>0&&$value['id']>1) { ?>
			      <a href="orden.php?id=<?php echo $value['id']; ?>&amp;order=1&amp;tipo=<?php echo $tipo; ?>"><img src="css/img/arriba.png" width="16" height="16" border="0" /></a>
			      <?php } else  { ?>
			      <img src="css/img/vacio.gif" width="16" height="16" border="0" />
			      <?php } if ($j<$registros&&$value['id']>1) { ?>
			      <a href="orden.php?id=<?php echo $value['id']; ?>&amp;order=0&amp;tipo=<?php echo $tipo; ?>"><img src="css/img/abajo.png" width="16" height="16" border="0" /></a>
			      <?php } else { ?>
			      <img src="css/img/vacio.gif" width="16" height="16" border="0" />
			      <?php

					 }  ?>
				</center></td>

				<td class="data" width="75px">
				<center>
					<a href="?section=editarBanner&id=<?php echo $value['id'] ?>">
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarBanner('<?php echo $value['id']; ?>');">
					
				</center>
				</td>
			</tr>
			<?php $j++;
				} 
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