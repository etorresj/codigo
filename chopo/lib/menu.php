<div id="chopologo">
	<a href="index.php"><img src="images/chopologo.png" alt="chopologo" width="180" height="102" /></a>
</div>


    <nav id="menuprincipal">
    	<div id="showLeftPush"><a href="#" class="nav-mobile" id="nav-mobile"></a></div>
    	<script>
		    $(function() {		
		        var btn_movil = $('#nav-mobile'),
		            menu = $('#menuprincipal');
		
		        // Al dar click agregar/quitar clases que permiten el despliegue del menú
		        btn_movil.on('click', function (e) {
		            e.preventDefault();		
		            var el = $(this);		
		            el.toggleClass('nav-active');
		        })	
		    });
		</script>
        <div id="horizontalmenu">
        <ul>
        	<li class="plusmenu"><a href="http://medicos.chopo.com.mx/" target="_blank">Médicos</a></li>
			<li class="plusmenu"><a href="empresas.php">Empresas</a></li>
			<li class="plusmenu"><a href="privilegios-chopo.php">Privilegios Chopo</a></li>
            <li><a href="chopo.php">Chopo</a></li>
            
          
            
            <li><a href="estudios.php">Estudios</a></li>
            <li><a href="promociones.php">Promociones</a></li>
            <li>
            <a href="resultados.php">Servicios</a>
				<ul>
					<li><a href="resultados-pacientes.php">Resultados Pacientes</a></li> 
					<li><a href="resultados-medicos.php">Resultados Médicos</a></li> 
					<li><a href="resultados-empresas.php">Resultados Empresas</a></li> 
					<li><a href="http://201.149.87.134/facturacionpacientes/wpfacturacion.aspx?82">Facturación Electrónica</a></li> 
				</ul>
            </li>
            <li><a href="sucursales.php">Sucursales</a></li>
            <li><a href="tips-de-salud.php">Tips de salud</a></li>           
        </ul>      
        </div>  
    </nav>
<div style="clear:both"></div>


	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<h3>Menu</h3>
			<ul>
        	<li class="plusmenu"><a href="http://medicos.chopo.com.mx/" target="_blank">Médicos</a></li>
			<li class="plusmenu"><a href="empresas.php">Empresas</a></li>
			<li class="plusmenu"><a href="privilegios-chopo.php">Privilegios Chopo</a></li>
            <li><a href="chopo.php">Chopo</a></li>
            <li><a href="estudios.php">Estudios</a></li>
            <li><a href="promociones.php">Promociones</a></li>
            <li><a href="resultados.php">Servicios</a></li>
            <li><a href="sucursales.php">Sucursales</a></li>
            <li><a href="http://chopo.com.mx/blog/">Tips de salud</a></li>
             <li><a href=" http://201.149.87.134/facturacionpacientes/wpfacturacion.aspx?82">Facturación</a></li>
        </ul>
	</nav>
	
	
	<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};


			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
    
    
