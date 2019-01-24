<html>
<head>
<title>SURA - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Panel de Administración SURA">
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
			if($success) echo '<div class="sukses">Sección agregada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Agregar  <?php echo $titulo; ?></h3>
		<form method="post"  enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
            <tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=<?php echo $seccionRegresar; ?>&id=<?php echo $_GET['idRevista']; ?>#abajo">
										<input type="button" class="button" value="<< Regresar">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td class="data">Titulo:</td>
					<td class="data"><input type="text" class="panjang" name="titulo">
						<input type="hidden" name="idRevista" value="<?php echo $idRevista; ?>">
						<input type="hidden" name="ms" value="<?php echo $_GET['ms']; ?>">
					</td>
				</tr>	
				
					<?php if($muestraSubtemas) { ?>
					
				<?php } else { ?>
				
					<tr>
								<td class="data">Descripcion</td>
								<td class="data">
									<textarea name="descripcion"><?php echo $arreglo[0]['descripcion']; ?></textarea>
									<input type="hidden" name="id" value="<?php echo $id; ?>">
								</td>
							</tr>
				<?php }?>
				

		
				
				
              
				
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