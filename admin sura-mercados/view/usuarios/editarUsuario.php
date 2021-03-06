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
			if($success) echo '<div class="sukses">Sección atualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Editar <?php echo $arreglo[0]['nombre']; ?></h3>
		<form method="post" action="?section=editarUsuario" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td><a href="?section=usuarios">
										<input type="button" class="button" value="<< Regresar">
									</a>
									
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
                <tr>
					<td class="data">Titulo</td>
					<td class="data">
						<input type="text" name="nombre" value="<?php echo $arreglo[0]['nombre']; ?>" class="panjang">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</td>
				</tr>
				
				
			
				
                <tr>
					<td class="data">email</td>
					<td class="data">
						<input type="text" name="email" class="panjang" value="<?php echo $arreglo[0]['email']; ?>">
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