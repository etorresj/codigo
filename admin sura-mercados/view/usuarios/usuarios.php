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
         <?php if($mensaje)
			echo $mensaje;
			?>
         <h3>Importar usuarios</h3>
          
		<form method="post" action="?section=usuarios" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				
                <tr>
					<td class="data">Archivo</td>
					<td class="data">
						<input type="file" name="archivo">
						
					</td>
				</tr>
				
				
			
			
               
				
              
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
		<h3>Usuarios</h3>
		<table class="data">
			<form method="post" action="?section=usuarios">
				<tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarUsuario">
										<input type="button" class="button" value="Agregar Usuario">
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
                <th class="data">Correo</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($arreglo)
			foreach ($arreglo as $localidad) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $localidad['id']; ?></td>
                <td class="data"><?php echo $localidad['nombre'] ?></td>
                <td class="data"><?php echo $localidad['email'] ?></td>
               
				<td class="data" width="75px">
				<center>
					<a href="?section=editarUsuario&id=<?php echo $localidad['id'] ?>">
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