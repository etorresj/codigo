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
			if($success) echo '<div class="sukses">Alerta atualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Tipo de archivo no válido</div>'; 
		?>
		
			<table class="data">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td><a href="?section=imagenes">
										<input type="button" class="button" value="<< Regresar">
									</a>
									
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
                
			</table>
             <h3>Video</h3>
            <form method="post" action="?section=avisos" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data" colspan="2">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="1">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
        
          <h3>Concursos</h3>
            <form method="post" action="?section=avisos" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data" colspan="2">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="2">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
        
          <h3>Avisos informativos / Promociones</h3>
            <form method="post" action="?section=avisos" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data" colspan="2">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="3">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
            <h3>Inversión</h3>
            <form method="post" action="?section=alertas" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data" colspan="2">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="1">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
        
          <h3>Afore</h3>
            <form method="post" action="?section=alertas" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data" colspan="2">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="2">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
        
          <h3>Seguros</h3>
            <form method="post" action="?section=alertas" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data" colspan="2">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="3">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
        
    	  <h3>Pensiones</h3>
            <form method="post" action="?section=alertas" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data" colspan="2">
						<input type="file" name="imagen">
                        <input type="hidden" name="tipo" value="4">
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