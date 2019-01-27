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
			if($success) echo '<div class="sukses">Noticia agregada correctamente</div>';
			else if($error) echo '<div class="gagal">Tipo de archivo no válido</div>'; 
		?>
		<h3>Agregar Noticia</h3>
		<form method="post" action="?section=agregarNoticia" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Titulo</td>
					<td class="data"><input type="text" name="titulo"></td>
				</tr>
				<tr>
					<td class="data">Fecha</td>
					<td class="data"><input type="text" name="fecha" id="fecha" readonly="readonly"></td>
				</tr>
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
						<input type="hidden" name="url" value="http://www.chopo.com.mx">
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