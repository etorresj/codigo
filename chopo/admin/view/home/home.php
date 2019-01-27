<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> 
<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
	<h3>Dashboard</h3>
	
	 
	<div class="shortcutHome">
		<a href="?section=sucursal"><img src="css/img/pharmacy.png" width="64" height="64"><br>
		Sucursales</a>
	</div>
	<div class="shortcutHome">
		<a href="?section=especialidades"><img src="css/img/doctor.png" width="64" height="64"><br>
		Especialidades</a>
	</div>
	<div class="shortcutHome">
		<a href="?section=departamento"><img src="css/img/departamentos.png" width="64" height="64"><br>
		Departamentos</a>
	</div>
	
	<div class="shortcutHome">
		<a href="?section=servicios"><img src="css/img/lists.png" width="64" height="64"><br>
		Servicios</a>
	</div>
	<div class="shortcutHome">
		<a href="?section=perfiles"><img src="css/img/perfiles.png" width="64" height="64"><br>
		Perfiles</a>
	</div>
	<div class="shortcutHome">
		<a href="?section=promocion"><img src="css/img/promo.png" width="64" height="64"><br>
		Promociones</a>
	</div>
	<div class="shortcutHome">
		<a href="?section=config"><img src="css/img/config.png" width="64" height="64"><br>
		Config</a>
	</div>
		<div class="clear"></div>
		
		
        
		<div id="smallRight">
		<h3>Actividad de Usuarios</h3>
		
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr>
		  <td style="border: none;padding: 4px;">Usuarios registrados</td><td style="border: none;padding: 4px;"><b><?php echo $dash['usuarios']; ?></b></td></tr>
			<tr>
			  <td style="border: none;padding: 4px;">Ultimo usuario registrado</td><td style="border: none;padding: 4px;"><b><?php echo $dash['ultimoUsuario']; ?></b></td></tr>
			<tr>
			  <td style="border: none;padding: 4px;">Ultimo acceso</td><td style="border: none;padding: 4px;"><b><?php echo $dash['ultimoAcceso']; ?></b></td></tr>
		</table>
		</div>
	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>