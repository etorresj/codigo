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
		<h3>Cambiar fecha de edición</h3>
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
					<td class="data">Mes</td>
					<td class="data">
						<select name="mes">
							<?php for($i=1; $i<=12; $i++) {
								$selected=""; 
								if($i==$_SESSION['suraMes'])
									$selected="selected";
									
							?>
							<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $sura->getMes($i); ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
                <tr>
					<td class="data">Año</td>
					<td class="data">
						<select name="anio">
							<?php 
								$selected1=$selected2="";
								if($anio==$_SESSION['suraAnio'])
									$selected1="selected";
								if($_SESSION['suraAnio']==$anio+1)
									$selected2="selected";
								if($_SESSION['suraAnio']==$anio-1)
									$selected3="selected";
								?>
							<option value="<?php echo $anio-1; ?>" <?php echo $selected3; ?>><?php echo $anio-1; ?></option>
							<option value="<?php echo $anio; ?>" <?php echo $selected1; ?>><?php echo $anio; ?></option>
							<option value="<?php echo $anio+1; ?>" <?php echo $selected2; ?>><?php echo $anio+1; ?></option>
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