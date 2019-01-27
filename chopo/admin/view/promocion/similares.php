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
		<h3><?php echo $promocion[0]['nombre']; ?> - Similares</h3>
		<table class="data">
			
			<tr class="data">
				<th class="data" width="30px">Código</th>
				<th class="data">Nombre</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($similares)
			foreach ($similares as $region) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $region['promocion_similar']; ?></td>
				<td class="data"><?php echo ($region['nombre']) ?></td>
				
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarSimilar('<?php echo $region['id']; ?>','<?php echo $promocion[0]['codigo']; ?>');">
					
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
		
			<h3>Agregar Similar</h3>
		<form method="post" action="?section=similares" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Promoción</td>
					<td class="data">
						<select name="promocion_similar">
							<?php foreach($promociones as $promocionSim) { ?>
								<option value="<?php echo $promocionSim['codigo'] ?>"><?php echo ($promocionSim['nombre']) ?></option>
							<?php } ?>
						</select>
						<input type="hidden" name="promocion_codigo" value="<?php echo $promocion[0]['codigo'] ?>">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>		

	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>