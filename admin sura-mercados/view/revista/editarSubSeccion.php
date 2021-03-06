<html>
<head>
<title>YMCA - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Panel de Administración YMCA">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> 
<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script src="js/main.js"></script>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	//	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	new nicEditor({maxHeight : 300, fullPanel : true}).panelInstance('texto');
});
</script>



</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Sección atualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Editar <?php echo $arreglo[0]['titulo']; ?></h3>
		<form method="post" action="?section=editarSubSeccion" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data">Titulo</td>
					<td class="data">
						<input type="text" name="titulo" value="<?php echo $arreglo[0]['titulo']; ?>" class="panjang">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</td>
				</tr>
				
				
				<tr>
					<td class="data">Descripci&oacute;n</td>
					<td class="data">
						<textarea name="descripcion"><?php echo $arreglo[0]['descripcion']; ?></textarea>
					</td>
				</tr>
				  <tr>
					<td class="data">Texto completo</td>
					<td class="data">
						<textarea name="texto" id="texto" style="width:600px;"><?php echo $arreglo[0]['texto']; ?></textarea>
					</td>
				</tr>
				

				<tr>
					<td class="data"> <?php if($arreglo[0]['img']) { ?>
                        <img src="../images/revistas/<?php echo $arreglo[0]['img']; ?>" width="60"><br>
                        <?php } ?>Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
                       
					</td>
				</tr>
                
              
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
        
        <h3>Menú izquierdo</h3>
		<table class="data">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=agregarSubSeccion2&idRevista=<?php echo $id; ?>">
										<input type="button" class="button" value="Agregar Sub sección">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Titulo</th>
				<th class="data" width="75px">Editar</th>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			if($secciones)
			foreach ($secciones as $localidad) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $localidad['id']; ?></td>
				<td class="data"><?php echo $localidad['titulo'] ?></td>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarSubSeccion2&id=<?php echo $localidad['id'] ?>">
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<td class="data" width="75px">
				<center>
					<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onClick="eliminarSubSeccion2('<?php echo $localidad['id']; ?>', '<?php echo $id; ?>');">
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
        
	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>