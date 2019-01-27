<?php include('lib/header.php') ?>  
<script type="text/javascript" src="js/privilegios.js"></script>

<div id="contentwrap"> 
	<div id="content">  
	
	
	<div id="content-in">
		<div class="privilegios">
			
			<h1>PRIVILEGIOS CHOPO</h1>
			<h2>Registre su Tarjeta Privilegios Chopo y obtenga notificaciones sobre ofertas
y promociones especiales. <strong>Es fácil, rápido y gratuito.</strong></h2>
			<p>Llene por favor el siguiente formulario para obtener los beneficios de ser un cliente registrado.</p>
					<?php if(isset($_GET['correo'])=='true'){ ?>
					<p class="mnsjok">El correo se ha enviado con éxito, en un momento nos comunicaremos con usted.</p>
					<?php } else if(isset($_GET['correo'])=='false'){ ?>
					<p class="mnsjerr">El correo no fue enviado.</p>
					<?php } ?>
			<div class="privilegios-form">
			<form action="envia-correo.php" method="post" id="formaPriv" name="formaPriv">
			<input type="hidden" value="privilegios" name="pagina">
				<p>*Nombre(s)
					<input type="text" name="nombre"></p>
				<p>*Apellido Materno
					<input type="text" name="materno"></p>
				<p>*Apellido Paterno
					<input type="text" name="paterno"></p>
				<p>*Correo Electrónico
					<input type="text" name="correo"></p>
				<p>*Folio de la tarjeta
					<input type="text" name="folio" id="folio" onkeypress="return justNumbers(event);"></p>
				<p><h3>Los campos marcados con un asterisco (*) son requeridos</h3></p>
				
				<p><input type="button" value="Enviar" onclick="if(nombre.value == ''){
							alert('Es necesario que escriba su nombre'); 
							nombre.focus();
							return false;
		                    }  else if(paterno.value == '' || materno.value == ''){
							alert('Es necesario que escriba sus apellidos'); 
							materno.focus();
							return false;
							} else if(correo.value == ''){
							alert('Su correo electr&oacute;nico es necesario'); 
							correo.focus();
							return false;
							}else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo.value))){
							alert('El correo electr&oacute;nico esta mal escrito, favor de verificarlo'); 
							correo.focus();
							return false;					
							} else if(folio.value == ''){
							alert('Es necesario que escriba su folio'); 
							folio.focus();
							return false;
							}else { 
							checaPrivilegios();
							folio.focus();
							}	 
							 "></p>
				<div style="clear:both"></div>
			</form>
			</div>
		
		
		
		<p><span>En chopo tu lealtad es recompensada</span></p>
			<img src="images/tarjeta-privilegios-banner.jpg" alt="tarjeta-privilegios-banner" width="100%;"/>
		<!--<p><span><strong>Para dar de alta tu nueva Tarjeta Privilegios Chopo da clic en el siguiente enlace: <a href="" style="color:#0077c0">http://chopo.com.mx/privilegios</a></strong></span></p>-->
			
			<p><span>Si ya te diste de alta ahora:</span></p>			
			<p><span>Imprime los siguientes cupones y preséntalos junto con tu Tarjeta Privilegios Chopo para hacer válidos los descuentos que se indican en ellos.</span></p>
			<img src="images/cupon1.jpg" alt="cupon1" class="cupones" />
			<img src="images/cupon2.jpg" alt="cupon2" class="cupones"/>
			<img src="images/cupon3.jpg" alt="cupon3" class="cupones"/>
			<p>Para dudas o aclaraciones puedes llamarnos al 1946-0606</p>
		
		
	</div>
	</div>
	</div>
</div>
<?php include('lib/footer.php') ?>  