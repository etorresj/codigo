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
			if($success) echo '<div class="sukses">Promoci&oacute;n editada correctamente</div>';
			else if($error) echo '<div class="gagal">Archivo no válido, porfavor verifique</div>'; 
		?>
		<h3>Editar Promoci&oacute;n</h3>
		<a href="?section=similares&id=<?php echo $promocion[0]['codigo']; ?>">
			<input type="button" class="button" value="Editar Promociones Similares">
		</a>
		<a href="?section=editarPromocionSucursales&id=<?php echo $promocion[0]['codigo']; ?>">
			<input type="button" class="button" value="Sucursales que ofrecen esta promoci&oacute;n">

		</a>
		<form method="post" action="?section=editarPromocion" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="sedang" value="<?php echo $promocion[0]['nombre']; ?>">
						<input type="hidden" name="id" value="<?php echo $promocion[0]['id']; ?>">
						<input type="hidden" name="promocion_codigo" value="<?php echo $promocion[0]['codigo']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Servicio</td>
					<td class="data">
						<select name="servicio_codigo">
							<?php foreach($servicios as $servicio) { 
									 $selected='';
								 	 if($promocion[0]['servicio_codigo']==$servicio['codigo'])
								  		$selected='selected="selected"';
								  	?>
								<option value="<?php echo $servicio['codigo'] ?>" <?php echo $selected; ?>><?php echo ($servicio['nombre']) ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Visible</td>
					<td class="data">
						<select name="visible">
							<option value="1" <?php echo $promocion[0]['visible']?'selected="selected"':''; ?>>Si</option>
							<option value="0"<?php echo $promocion[0]['visible']?'':'selected="selected"'; ?>>No</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Nivel</td>
					<td class="data">
							
						<select name="nivel">
							<option value="1" <?php echo $promocion[0]['nivel']=="1"?'selected="selected"':''; ?>>Regi&oacute;n</option>
							<option value="2" <?php echo $promocion[0]['nivel']=="2"?'selected="selected"':''; ?>>Tipo</option>
							<option value="3" <?php echo $promocion[0]['nivel']=="3"?'selected="selected"':''; ?>>Localidad</option>
							<option value="4" <?php echo $promocion[0]['nivel']=="4"?'selected="selected"':''; ?>>Sucursal</option>
							<option value="5" <?php echo $promocion[0]['nivel']=="5"?'selected="selected"':''; ?>>Precio Regular</option>
							<option value="6" <?php echo $promocion[0]['nivel']=="6"?'selected="selected"':''; ?>>Precio Promoci&oacute;n</option>
							
						</select>

					</td>
				</tr>
				<tr>
					<td class="data">Inicio</td>
					<td class="data">

						<input type="text" name="inicio" id="inicio" class="sedang" value="<?php echo $promocion[0]['inicio']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Finaliza</td>
					<td class="data">
						<input type="text" name="finaliza" id="finaliza" class="sedang" value="<?php echo $promocion[0]['finaliza']; ?>">
					</td>
				</tr>
				
				<tr>
					<td class="data">Recomendado</td>
					<td class="data">
						<textarea name="recomendado"><?php echo $promocion[0]['recomendado']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Incluye</td>
					<td class="data">
						<textarea name="incluye"><?php echo $promocion[0]['incluye']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Patología</td>
					<td class="data">
						<textarea name="patologia"><?php echo $promocion[0]['patologia']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Nota</td>
					<td class="data">
						<textarea name="nota"><?php echo $promocion[0]['nota']; ?></textarea>
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
						<textarea name="aviso"><?php echo $promocion[0]['aviso']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Tag</td>
					<td class="data">
						<input type="text" name="tag" class="sedang" value="<?php echo $promocion[0]['tag']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Keywords</td>
					<td class="data">
						<input type="text" name="keyword" class="sedang" value="<?php echo $promocion[0]['keyword']; ?>">
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