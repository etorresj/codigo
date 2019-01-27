<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text; charset=iso-8859-1" />
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
			target:"inicio",
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
		new JsDatePick({
			useMode:2,
			target:"finaliza",
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
			if($success) echo '<div class="sukses">Promoci&oacute;n agregada correctamente</div>';
			else if($error) echo '<div class="gagal">Archivo no válido, porfavor verifique</div>'; 
		?>
		<h3>Agregar Promoci&oacute;n</h3>
		<form method="post" action="?section=agregarPromocion" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="sedang">
					</td>
				</tr>
				<tr>
					<td class="data">Servicio</td>
					<td class="data">
						<select name="servicio_codigo">
							<?php foreach($servicios as $servicio) { ?>
								<option value="<?php echo $servicio['codigo'] ?>"><?php echo ($servicio['nombre']) ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Visible</td>
					<td class="data">
						<select name="visible">
							<option value="1" selected="selected">Si</option>
							<option value="0">No</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Nivel</td>
					<td class="data">
						<select name="nivel">
							<option value="1" selected="selected">Regi&oacute;n</option>
							<option value="2">Tipo</option>
							<option value="3">Localidad</option>
							<option value="4">Sucursal</option>
							<option value="5">Precio Regular</option>
							<option value="6">Precio Promoci&oacute;n</option>
							
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Inicio</td>
					<td class="data">

						<input type="text" name="inicio" id="inicio" class="sedang">
					</td>
				</tr>
				<tr>
					<td class="data">Finaliza</td>
					<td class="data">
						<input type="text" name="finaliza" id="finaliza" class="sedang">
					</td>
				</tr>
				
				<tr>
					<td class="data">Recomendado</td>
					<td class="data">
						<textarea name="recomendado"></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Incluye</td>
					<td class="data">
						<textarea name="incluye"></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Patología</td>
					<td class="data">
						<textarea name="patologia"></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Nota</td>
					<td class="data">
						<textarea name="nota"></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Imagen</td>
					<td class="data">
						<input type="file" name="imagen">
					</td>
				</tr>
				<tr>
					<td class="data">Banner</td>
					<td class="data">
						<input type="file" name="banner">
					</td>
				</tr>
				<tr>
					<td class="data">Aviso</td>
					<td class="data">
						<textarea name="aviso"></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Tag</td>
					<td class="data">
						<input type="text" name="tag" class="sedang">
					</td>
				</tr>
				<tr>
					<td class="data">Keywords</td>
					<td class="data">
						<input type="text" name="keyword" class="sedang">
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