<?php include('lib/header.php');
 $noticias=$chopo->getNoticias("", $search);
 ?>  

<div id="contentwrap"> 
	<div id="content">  
	
<?php include('navegador.php') ?> 
	
	<div id="content-in">
		<div id="left-menu">
			<ul>
				<a href="chopo.php"><li>Bienvenida</li></a>
				<a href="responsabilidad-social.php"><li>Responsabilidad Social</li></a>
				<a href="sitios-de-interes.php"><li>Sitios de Intéres</li></a>
				<a href="politicas-de-privacidad.php"><li>Políticas de Privacidad</li></a>
				<a href="bolsa-de-trabajo.php"><li>Bolsa de Trabajo</li></a>
				<a href="noticias.php"><li class="select">Noticias</li></a>
				<a href="tarjeta-privilegios.php"><li>Tarjeta Privilegios Chopo</li></a>
				<a href="terminos-de-uso.php"><li>Términos de uso</li></a>
				<a href="legales.php"><li>Legales</li></a>
				<a href="aviso-de-privacidad.php"><li style="border-bottom:none">Aviso de Privacidad</li></a>
			</ul>
		</div>
		
		<div id="right-content">
			<?php foreach($noticias as $noticia) { ?>
			
			<?php echo $noticia['fecha']; ?>
			<br>
			<?php echo $noticia['titulo']; ?>
			<br>
			<img src="images/noticias/<?php echo $noticia['img']; ?>">
			<br><br>
			<?php } ?>
		</div>
		<div style="clear:both"></div>
	</div>

	</div>
</div>
<?php include('lib/footer.php') ?>  