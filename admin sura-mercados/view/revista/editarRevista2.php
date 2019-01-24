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


</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Revista atualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<!--<h3>Editar <?php echo $arreglo[0]['titulo']; ?></h3>
		<form method="post" action="?section=editarRevista" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
            <tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=revista">
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
						<input type="text" name="titulo" value="<?php echo $arreglo[0]['titulo']; ?>" class="panjang">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Fecha</td>
					<td class="data">

						Mes: 
                        <select name="mes">
                        <option value="1|Enero" <?php if($arreglo[0]['mesNum']==1) echo 'selected="selected"'; ?> >Enero</option>
                        <option value="2|Febrero" <?php if($arreglo[0]['mesNum']==2) echo 'selected="selected"'; ?>>Febrero</option>
                        <option value="3|Marzo" <?php if($arreglo[0]['mesNum']==3) echo 'selected="selected"'; ?>>Marzo</option>
                        <option value="4|Abril" <?php if($arreglo[0]['mesNum']==4) echo 'selected="selected"'; ?>>Abril</option>
                        <option value="5|Mayo" <?php if($arreglo[0]['mesNum']==5) echo 'selected="selected"'; ?>>Mayo</option>
                        <option value="6|Junio" <?php if($arreglo[0]['mesNum']==6) echo 'selected="selected"'; ?>>Junio</option>
                        <option value="7|Julio" <?php if($arreglo[0]['mesNum']==7) echo 'selected="selected"'; ?>>Julio</option>
                        <option value="8|Agosto" <?php if($arreglo[0]['mesNum']==8) echo 'selected="selected"'; ?>>Agosto</option>
                        <option value="9|Septiembre" <?php if($arreglo[0]['mesNum']==9) echo 'selected="selected"'; ?>>Septiembre</option>
                        <option value="10|Octubre" <?php if($arreglo[0]['mesNum']==10) echo 'selected="selected"'; ?>>Octubre</option>
                        <option value="11|Noviembre" <?php if($arreglo[0]['mesNum']==11) echo 'selected="selected"'; ?>>Noviembre</option>
                        <option value="12|Diciembre" <?php if($arreglo[0]['mesNum']==12) echo 'selected="selected"'; ?>>Diciembre</option>
                        </select> 
                        A&ntilde;o:
                        <select name="anio">
                        <?php $hoy=date('Y');
						for($i=$hoy-5; $i<=$hoy; $i++) {
						?>
                        <option value="<?php echo $i; ?>" <?php if($i==$arreglo[0]['anio']) echo 'selected="selected"'; ?> ><?php echo $i; ?></option>
                        <?php } ?>
                        </select>
                         N&uacute;mero:
                         <input type="text" name="numero" class="pendek" value="<?php echo $arreglo[0]['numero']; ?>">
					</td>
				</tr>
				
				<tr>
					<td class="data">Descripci&oacute;n</td>
					<td class="data">
						<textarea name="descripcion"><?php echo $arreglo[0]['descripcion']; ?></textarea>
					</td>
				</tr>
				

				<tr>
					<td class="data"> <?php if($arreglo[0]['img']) { ?>
                        <img src="../images/revistas/<?php echo $arreglo[0]['img']; ?>" height="80"><br>
                        <?php } ?>Imagen</td>
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
		</form>-->
        
        <h3><?php echo $titulo; ?><a name="abajo"></a></h3>
		<table class="data">
				<tr>
					<td colspan="10">
						<table width="100%">
							<tr>
								<td>	<a href="?section=editarRevista&id=<?php echo $_SESSION['padre']; ?>">
										<input type="button" class="button" value="Regresar">
									</a>
									<a href="?section=agregarSeccion2&idRevista=<?php echo $id; ?>&ms=<?php echo $muestraSubtemas;?>">
										<input type="button" class="button" value="Agregar Tema">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Titulo</th>
        
								<th class="data" width="75px">Visible</th>
        <?php if(!$muestraSubtemas) { ?>
				         <th class="data" width="75px">Orden</th>
								
				<?php } ?>
				<th class="data" width="75px">Editar</th>
				<?php if($muestraSubtemas) { ?>
				<th class="data" width="75px">Highlights</th>
				<th class="data" width="75px">Descargar</th>
				<th class="data" width="75px">Enviar</th>
				<th class="data" width="75px">Preview</th>
				<?php } ?>
				<th class="data" width="75px">Eliminar</th>
			</tr>
			<?php 
			$j=0;
			$registros=count($secciones)-1; 
			if($secciones)
			foreach ($secciones as $localidad) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $localidad['id']; ?></td>
				<td class="data">
					<?php echo $localidad['titulo']?$localidad['titulo']:"Sin titulo (<a href=\"?section=editarSeccion2&id=".$localidad['id']."\">editar)" ?>
				</td>
        
			
				<td class="data" width="75px">
					<center>
						<a href="?section=editarRevista2&id=<?php echo $_GET['id']; ?>&visible=<?php echo $localidad['visible'] ?>&idContenido=<?php echo $localidad['id'] ?>&tipo=<?php echo $search ?>">
							<img src="css/img/visible<?php echo $localidad['visible'] ?>.png">
						</a>
					</center>
				</td>
            	<?php if(!$muestraSubtemas) { ?>  
                 <td class="data"><center>
							  <?php  if($j>0) { ?>
			      <a href="ordenS3.php?id=<?php echo $localidad['id']; ?>&amp;order=1&amp;tipo=<?php echo $tipo; ?>"><img src="css/img/arriba.png" width="16" height="16" border="0" /></a>
			      <?php } else  { ?>
			      <img src="css/img/vacio.gif" width="16" height="16" border="0" />
			      <?php } if ($j<$registros) { ?>
			      <a href="ordenS3.php?id=<?php echo $localidad['id']; ?>&amp;order=0&amp;tipo=<?php echo $tipo; ?>"><img src="css/img/abajo.png" width="16" height="16" border="0" /></a>
			      <?php } else { ?>
			      <img src="css/img/vacio.gif" width="16" height="16" border="0" />
			      <?php

					 } ?>
				</center></td>
				
			
				<?php } ?>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarSeccion2&id=<?php echo $localidad['id'] ?>&ms=<?php echo $muestraSubtemas;?>">
						<img src="css/img/oke.png">
					</a>
				</center>
				</td>
				<?php if($muestraSubtemas) { ?>
				<td class="data" width="75px">
				<center>
					<a href="?section=editarRevista&id=<?php echo $localidad['id'] ?>">
						<img src="css/img/highlight.png" width="16">
					</a>
				</center>
				</td>
				<!-- DESCARGAR -->
				<td class="data" width="75px">
				<center>
					<a href="?section=descargar&id=<?php echo $localidad['id'] ?>">
						<img src="css/img/go_down_blue.png" width="16">
					</a>
				</center>
				</td>
				<!-- ENVIAR -->
				<td class="data" width="75px">
				<center>
					<a href="?section=enviarCorreo&id=<?php echo $localidad['id'] ?>">
						<img src="css/img/send_blue.png" width="16">
					</a>
				</center>
				</td>
				
				<!-- Preview -->
				<td class="data" width="75px">
				<center>
					<a href="?section=preview&id=<?php echo $localidad['id'] ?>" target="_blank">
						<img src="css/img/preview2.png" width="16">
					</a>
				</center>
				</td>
				
				<?php } ?>
				<td class="data" width="75px">
				<center>
					<img  src="css/img/deletered.png" style="cursor:pointer;" width="16" onClick="eliminarSeccion2('<?php echo $localidad['id']; ?>', '<?php echo $id; ?>');">
				</center>
				</td>
		  </tr>
			<?php 
			$j++;
			} 
			else {
				?>
				<tr>
					<td colspan="5" align="center">
						No se encontró ningún registro
					</td>
				</tr>
			<?php } ?>
		</table>
        
	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>