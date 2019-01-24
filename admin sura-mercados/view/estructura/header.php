<script>window.jQuery || document.write('<script src="http://code.jquery.com/jquery-1.11.1.min.js"><\/script>')</script>
<?php
$myUsuario = new admin();
$usuarioValido=$myUsuario->obtenUsuarios($_SESSION['suraAdmin']);
?>
<div class="inHeader">
		<div class="mosAdmin">
		Bienvenido <?php echo $usuarioValido[0]['nombre']; ?><br>
		
		<a href="salir.php"><span style="color:#fff;">Salir</span></a>
		</div>
	<div class="clear"></div>
	</div>