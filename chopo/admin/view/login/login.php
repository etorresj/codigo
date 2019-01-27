
<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> <!--  favicon-->
<link rel="stylesheet" type="text/css" href="css/estilo.css"> <!-- file css-->
</head>

<body>
<div id="header">
	<div class="inHeaderLogin"></div>
</div>

<div id="loginForm">
	<div class="headLoginForm">
	Login Administrador
	</div>
	<div class="fieldLogin">
	<form method="POST" action="">
	<label>Usuario</label><br>
	<input name="user" type="text" class="login" id="user"><br>
	<label>Password</label><br>
	<input name="password" type="password" class="login" id="password"><br>
	<input type="submit" class="button" value="Login">
	</form>
	</div> 
	<div align="center">
    <?php if($error==1) { ?>
			
					<strong>Error</strong> | <span>usuario/password incorrecto(s)</span>
				
			<?php } 
			else if($error==2) { ?>
			
					<strong>Error</strong> | <span>debes proporcionar un usuario y una contrase&ntilde;a</span>
				
			<?php } ?>
    </div>
</div>
</body>
</html>