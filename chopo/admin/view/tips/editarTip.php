<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
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
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
		<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"fecha",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	
	};
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
			if($success) echo '<div class="sukses">Tip agregado correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Agregar Tip de Salud</h3>
		<form method="post" action="?section=editarTip" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td class="data">Titulo</td>
					<td class="data">
						<input type="text" name="titulo" value="<?php echo $tip[0]['titulo']; ?>" class="panjang">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Regi&oacute;n</td>
					<td class="data">
						<input name="todosTipos" type="checkbox" class="checkbox" id="todosTipos" onClick="javascript:SeleccionarCheck(this, 'forma1');" value=""  /> Todos<br>
						<?php foreach($regiones as $region) {
							$checked="";
							if($chopo->esRegionTip($id, $region['id']))
								$checked='checked="CHECKED"';
							 ?>
							<input type="checkbox" name="region[]"  value="<?php echo $region['id']; ?>" <?php echo $checked; ?>><?php echo $region['nombre']; ?><br>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="data">Fecha</td>
					<td class="data">

						<input type="text" value="<?php echo $tip[0]['fecha']; ?>" readonly="readonly" name="fecha" id="fecha" class="sedang">
					</td>
				</tr>
				<tr>
					<td class="data">Resumen</td>
					<td class="data">
						<textarea name="resumen"><?php echo $tip[0]['resumen']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Texto completo</td>
					<td class="data">
						<textarea name="texto" id="texto" style="width:600px;"><?php echo $tip[0]['texto']; ?></textarea>
					</td>
				</tr>

				<tr>
					<td class="data">Imagen</td>
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
	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>