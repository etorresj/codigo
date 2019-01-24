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
			if($success) echo '<div class="sukses">Correo enviado correctamente</div>';
			else if($error) echo '<div class="gagal">Error enviando correo, intente de nuevo</div>'; 
		?>
		<h3>Enviar  <?php echo $arreglo[0]['titulo']; ?></h3>
		<form method="post"  enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
            <tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=correos">
										<input type="button" class="button" value="<< Regresar">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				
                <tr>
					<td class="data">Para</td>
					<td class="data">
						<input type="text" name="correos" value="" class="panjang">		
					</td>
				</tr>
				
                 <tr>
					<td class="data">Remite</td>
					<td class="data">
						<input type="text" name="remite" value="" class="panjang">		
					</td>
				</tr>
                 <tr>
					<td class="data">Asunto</td>
					<td class="data">
						<input type="text" name="asunto" value="" class="panjang">		

					</td>
				</tr>
                <tr>
					<td class="data">Enviar a BD</td>
					<td class="data">
						<input type="checkbox" name="toda">

					</td>
				</tr>
				

				
				
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
                        <a href="?section=preview&id=<?php echo $arreglo[0]['id']; ?>" target="_blank">
										<input type="button" class="button" value="Preview">
									</a>
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