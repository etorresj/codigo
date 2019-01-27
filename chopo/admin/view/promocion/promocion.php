<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text; charset=iso-8859-1" />
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
		<h3>Promociones</h3>
		<table class="data">
			<form method="post" action="index.php?section=promocion">
				<tr>
					<td colspan="6">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarPromocion">
										<input type="button" class="button" value="Agregar Promoci&oacute;n">
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
				<th class="data" width="30px">C&oacute;digo</th>
				<th class="data" >Nombre</th>
				<th class="data" >Visible</th>
				<th class="data" width="75px">Orden</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Sucursales</th>
			</tr>
			<?php 
			$j=0;
			$registros=count($servicios)-1;
			if($servicios)
			foreach ($servicios as $servicio) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $servicio['codigo']; ?></td>
				<td class="data"><?php echo ($servicio['nombre']); ?></td>
				<td class="data" ><center>
						<a href="?section=promocion&visible=<?php echo $servicio['visible'] ?>&id=<?php echo $servicio['codigo'] ?>&search=<?php echo $search ?>">
							<img src="css/img/visible<?php echo $servicio['visible'] ?>.png">
						</a>
					</center></td>
					
					<td class="data"><center>
							  <?php  if($j>0) { ?>
			      <a href="ordenP.php?id=<?php echo $servicio['codigo']; ?>&amp;order=1&amp;pag=<?php echo $pag; ?>"><img src="css/img/arriba.png" width="16" height="16" border="0" /></a>
			      <?php } else  { ?>
			      <img src="css/img/vacio.gif" width="16" height="16" border="0" />
			      <?php } if ($j<$registros) { ?>
			      <a href="ordenP.php?id=<?php echo $servicio['codigo']; ?>&amp;order=0&amp;pag=<?php echo $pag; ?>"><img src="css/img/abajo.png" width="16" height="16" border="0" /></a>
			      <?php } else { ?>
			      <img src="css/img/vacio.gif" width="16" height="16" border="0" />
			      <?php

					 }  ?>
				</center></td>

				<td class="data" width="75px">
				<center>
					
					<a href="?section=editarPromocion&id=<?php echo $servicio['codigo'] ?>">
					
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<td class="data" width="75px">
				<center>
					
					<a href="?section=editarPromocionSucursales&id=<?php echo $servicio['codigo'] ?>">
					
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
			</tr>
			<?php 
				$j++;
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