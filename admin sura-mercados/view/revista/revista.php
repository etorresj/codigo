<html>
<head>
<title>SURA - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Panel de Administración SURA">
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
		<h3><?php echo $titulo; ?></h3>
		<table class="data">
			<form method="post" action="?section=contenido&tipo=<?php echo $_GET['tipo']; ?>">
				<tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarRevista&tipo=<?php echo $_GET['tipo']; ?>">
										<input type="button" class="button" value="Agregar <?php echo $titulo; ?>">
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
				<?php if($_GET['tipo']<=4) { ?>
                <th class="data">Mes</th>
				<?php } ?>
                <th class="data">Día</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($arreglo)
			foreach ($arreglo as $localidad) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $localidad['id']; ?></td>
				<?php if($_GET['tipo']<=4) { ?>
                <td class="data"><?php echo $localidad['mes'] ?></td>
				<?php }  ?>
                <td class="data"><?php echo $localidad['dia'] ?></td>
               
				<td class="data" width="75px">
				<center>
					<a href="?section=editarRevista&id=<?php echo $localidad['id'] ?>">
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<td class="data" width="75px">
				<center>
					<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onClick="eliminarRevista('<?php echo $localidad['id']; ?>','<?php echo $localidad['tipo']; ?>');">
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