<link rel="stylesheet" type="text/css" href="css/shadowbox.css">
<script type="text/javascript" src="js/shadowbox.js"></script>

<script type="text/javascript">
Shadowbox.init();
</script>
<?php
$myUsuario = new admin();
$usuarioValido=$myUsuario->obtenUsuarios($_SESSION['chopoAdmin']);
?>
<div class="inHeader">
		<div class="mosAdmin">
		Bienvenido <?php echo $usuarioValido[0]['nombre']; ?><br>
		<a href="salir.php"><span style="color:#fff;">Salir</span></a>
		</div>
	<div class="clear"></div>
	</div>