<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> 
<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>

</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Estudio editado correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Editar Estudio</h3>

		<form method="post" action="?section=editarServicio" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=editarEstudioSucursales&id=<?php echo $id; ?>">
										<input type="button" class="button" value="Editar sucursales">
									</a>
									
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="panjang" value="<?php echo ($servicio[0]['nombre']); ?>">
						<input type="hidden" name="codigo" value="<?php echo $servicio[0]['codigo']; ?>">
					</td>
				</tr>
				<tr>
					<td class="data">Departamento</td>
					<td class="data">
						<select name="departamento_id" >
							<?php foreach($departamentos as $departamento) { 
									$selected='';
								  if($servicio[0]['departamento_id']==$departamento['id'])
								  	$selected='selected="selected"';
							?>
							<option value="<?php echo $departamento['id']; ?>"<?php echo $selected; ?>><?php echo $departamento['nombre']; ?></option>
							<?php } ?>	
						</select>
					</td>
				</tr>
				
				<tr>
					<td class="data">Comentario</td>
					<td>
						<textarea name="comentario"><?php echo $servicio[0]['comentario']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Nota</td>
					<td>
						<textarea name="nota"><?php echo $servicio[0]['nota']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Indicaciones <br>(para el paciente)</td>
					<td>
						<textarea name="indicacion"><?php echo $servicio[0]['indicacion']; ?></textarea>
						<?php if($servicio[0]['indicacion']) { ?>
						<input type="hidden" name="indicacionAux" value="1">
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="data">URL</td>
					<td>
						<input type="text" name="url" class="panjang" value="<?php echo $servicio[0]['url']; ?>">	
					</td>
				</tr>
				<tr>
					<td class="data">Imagen</td>
					<td>
						<input type="file" name="imagen" class="panjang">	
					</td>
				</tr>
				<tr>
					<td class="data">tag</td>
					<td>
						<input type="text" name="tag" class="panjang" value="<?php echo $servicio[0]['tag']; ?>">	
					</td>
				</tr>
				<tr>
					<td class="data">Keywords</td>
					<td>
						<input type="text" name="keyword" class="panjang" value="<?php echo $servicio[0]['keyword']; ?>">	
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