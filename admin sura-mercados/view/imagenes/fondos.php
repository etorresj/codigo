<html>
<head>
<title>Sura - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Panel de Administración ymca">
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
		<h3> <?php echo $fondo; ?></h3>
		<table class="data">
			<form method="post">
				<tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=editarRevista&id=<?php echo $_SESSION['padre']; ?>">
										<input type="button" class="button" value="Regresar">
									</a>
									<a href="?section=agregarImagen&tipo=<?php echo $_GET['tipo']; ?>">
										<input type="button" class="button" value="Agregar">
									</a>
									
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
			</form>
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Titulo</th>
				<th class="data" width="75px">Orden</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			$j=0;
			$registros=count($arreglo)-1;
			if($arreglo)
			foreach ($arreglo as $value) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $value['id']; ?></td>
				<td class="data">
						<?php echo $value['titulo']; ?>
				</td>
				
				 
				 
				 <td class="data"><center>
				<?php  if($j>0) { ?>
		<a href="orden.php?id=<?php echo $value['id']; ?>&amp;order=1&amp;tipo=<?php echo $tipo; ?>"><img src="css/img/arriba.png" width="16" height="16" border="0" /></a>
		<?php } else  { ?>
		<img src="css/img/vacio.gif" width="16" height="16" border="0" />
		<?php } if ($j<$registros) { ?>
		<a href="orden.php?id=<?php echo $value['id']; ?>&amp;order=0&amp;tipo=<?php echo $tipo; ?>"><img src="css/img/abajo.png" width="16" height="16" border="0" /></a>
		<?php } else { ?>
		<img src="css/img/vacio.gif" width="16" height="16" border="0" />
		<?php

	 } ?>
</center></td>

              

					<td class="data" width="75px">
				<center>
						<a href="?section=editarImagen&id=<?php echo $value['id']; ?>">
						<img  src="css/img/oke.png" style="cursor:pointer;" width="16">
						</a>
				</center>
				</td>

				
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onClick="eliminarBanner('<?php echo $value['id']; ?>');">
					
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