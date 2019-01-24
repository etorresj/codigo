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
			if($success) echo '<div class="sukses">Información actualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos, intente de nuevo</div>'; 
		?>
		<h3>Lligas Menú</h3>
		<form method="post"  enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
            <tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="index.php">
										<input type="button" class="button" value="<< Regresar">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				
               
                 <tr>
					<td class="data">PRIMERAS PLANAS (URL)</td>
					<td class="data">
						<input type="text" name="liga1" value="<?php echo $arreglo[0]['liga1']; ?>" class="panjang">		
                         <input type="hidden" name="id" value="1">
					</td>
				</tr>
                <tr>
					<td class="data">PORTADAS DE NEGOCIOS (URL)</td>
					<td class="data">
						<input type="text" name="liga2" value="<?php echo $arreglo[0]['liga2']; ?>" class="panjang">		
					</td>
				</tr>
                <tr>
					<td class="data">CARTONES (URL)</td>
					<td class="data">
						<input type="text" name="liga3" value="<?php echo $arreglo[0]['liga3']; ?>" class="panjang">		
					</td>
				</tr>
                <tr>
					<td class="data">COLUMNAS POLÍTICAS (URL)</td>
					<td class="data">
						<input type="text" name="liga4" value="<?php echo $arreglo[0]['liga4']; ?>" class="panjang">		
					</td>
				</tr>
                <tr>
					<td class="data">COLUMNAS DE NEGOCIOS (URL)</td>
					<td class="data">
						<input type="text" name="liga5" value="<?php echo $arreglo[0]['liga5']; ?>" class="panjang">		
					</td>
				</tr>
                <tr>
					<td class="data">BOLSA DE VALORES (URL)</td>
					<td class="data">
						<input type="text" name="liga6" value="<?php echo $arreglo[0]['liga6']; ?>" class="panjang">		
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