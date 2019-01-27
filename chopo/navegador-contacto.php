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
				<a href="contacto-informes.php"><li>Informes</li></a>
				<a href="contacto-comentarios.php"><li>Comentarios</li></a>
				<a href="contacto-medicos.php"><li>Médicos</li></a>
				<a href="contacto-empresas.php"><li>Empresas</li></a>
				<a href="bolsa-de-trabajo.php"><li class="select" style="border-bottom:none">Bolsa de Trabajo</li></a>
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