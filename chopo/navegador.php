	<div id="navegador">
	<a href="#" class="nav-mobile-sub" id="nav-mobile-sub"></a>
		<ul class="menu-horizontal">
			<a href="index.php"><li>Chopo</li></a>
			<li>></li>
			<li class="underline">Bienvenida</li></a>
		</ul>
		<ul class="breadscrumb">
				<li><a href="https://www.facebook.com/chopo.com.mx" target="_blank"><img src="images/icon-face.png" alt="icon-face"/></a></li>
				<li><a href="https://twitter.com/chopo_cercadeti" target="_blank"><img src="images/icon-twitter.png" alt="icon-twitter"/></a></li>
				<li><a href="https://plus.google.com/u/0/+chopo/posts" target="_blank"><img src="images/icon-google.png" alt="icon-google"/></a></li>
				<li><a href="http://www.youtube.com/user/ChopoCercaDeTi?feature=watch" target="_blank"><img src="images/icon-youtube.png" alt="icon-youtube"/></a></li>
		</ul>
		    <nav id="left-menu-nav">
			<ul>
				<a href="chopo.php"><li>Bienvenida</li></a>
				<a href="responsabilidad-social.php"><li>Responsabilidad Social</li></a>
				<a href="sitios-de-interes.php"><li>Sitios de Intéres</li></a>
				<a href="politicas-de-privacidad.php"><li>Políticas de Privacidad</li></a>
				<a href="bolsa-de-trabajo.php"><li>Bolsa de Trabajo</li></a>
				<a href="noticias.php"><li>Noticias</li></a>
				<a href="tarjeta-privilegios.php"><li>Tarjeta Privilegios Chopo</li></a>
				<a href="terminos-de-uso.php"><li>Términos de uso</li></a>
				<a href="legales.php"><li>Legales</li></a>
				<a href="aviso-de-privacidad.php"><li>Aviso de Privacidad</li></a>
			</ul>
		    </nav>
	</nav>
	</div>
	<script>
	    $(function() {
	
	        var btn_movil = $('#nav-mobile-sub'),
	            menu = $('#left-menu-nav').find('ul');
	
	        // Al dar click agregar/quitar clases que permiten el despliegue del menú
	        btn_movil.on('click', function (e) {
	            e.preventDefault();
	
	            var el = $(this);
	
	            el.toggleClass('nav-active');
	            menu.toggleClass('open-menu');
	        })
	
	    });
	</script>