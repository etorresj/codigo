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
			<form method="post" action="?section=correos">
				<tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarCorreo">
										<input type="button" class="button" value="Agregar Correo">
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
				
                <th class="data">Titulo</th>
				<th class="data" width="75px">Enviar</th>
                <th class="data" width="75px">Envios</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($arreglo)
			foreach ($arreglo as $localidad) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $localidad['id']; ?></td>
				
                <td class="data"><a href="?section=preview&id=<?php echo $localidad['id']; ?>" target="_blank"><?php echo $localidad['titulo'] ?></a></td>
                <td class="data" width="75px">
				<center>
					<a href="?section=enviarCorreo&id=<?php echo $localidad['id'] ?>">
						<img src="css/img/send.png" width="24">
					</a>
				</center>
				</td>
				
                <td class="data"><center><?php echo $localidad['envios']?$localidad['envios']:0 ?></center></td>
               
				<td class="data" width="75px">
				<center>
					<a href="?section=editarCorreo&id=<?php echo $localidad['id'] ?>">
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