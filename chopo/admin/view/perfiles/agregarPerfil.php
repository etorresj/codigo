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
<script type="text/javascript" src="js/dependencias.js"></script>
<script type="text/javascript">
	//Cargando regiones
	$(document).ready(function(){
	cargaDepartamento();
	
	
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
			if($success) echo '<div class="sukses">Perfil agregado correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Agregar Perfil</h3>
		<form method="post" action="?section=agregarPerfil" enctype="multipart/form-data">
			<table class="data">
				<tr>
					<td class="data">Nombre</td>
					<td class="data">
						<input type="text" name="nombre" class="panjang">
					</td>
				</tr>
				
				<tr>
					<td class="data">Departamento</td>
					<td class="data">
						<select name="centroanalitico_id" id="departamento_id">
							<option value="0">Seleccione</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Comentario</td>
					<td>
						<textarea name="comentario"></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">Nota</td>
					<td>
						<textarea name="nota"></textarea>
					</td>
				</tr>
				<tr>
					<td class="data">URL</td>
					<td>
						<input type="text" name="url" class="panjang">	
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
						<input type="text" name="tag" class="panjang">	
					</td>
				</tr>
				<tr>
					<td class="data">Keywords</td>
					<td>
						<input type="text" name="keyword" class="panjang">	
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