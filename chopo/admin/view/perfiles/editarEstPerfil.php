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
		<h3><?php echo $pefilD[0]['nombre'] ?></h3>
		<table class="data">
			
			<tr class="data">
				<th class="data" width="30px">Id</th>
				
				<th class="data">Estudio</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($perfiles)
			foreach ($perfiles as $perfil) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $perfil['codigo']; ?></td>
				
				<td class="data"><?php echo ($perfil['nombre']) ?></td>
				<td class="data" width="75px">
				<center>
					<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onclick="eliminarPerfil('<?php echo $perfil['id']; ?>','<?php echo $id; ?>');">
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
		<h3>Agregar Estudio</h3>
		<form method="post" action="?section=editarEstPerfil" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Perfil</td>
					<td class="data">
						<?php echo $pefilD[0]['nombre'] ?>
						<input type="hidden" name="perfil_codigo" value="<?php echo $id; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Estudio</td>
					<td class="data">
						<select name="estudio_codigo">
							<?php foreach($servicios as $servicio) { ?>
								<option value="<?php echo $servicio['codigo'] ?>"><?php echo ($servicio['nombre']) ?></option>
							<?php } ?>
						</select>
						
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