<?php include('lib/header.php') ?>  

<div id="contentwrap"> 
	<div id="content">  
	
<?php include('navegador-contacto.php') ?> 
	
	<div id="content-in">
		<div id="left-menu">
			<ul>
				<a href="contacto-informes.php"><li>Informes</li></a>
				<a href="contacto-comentarios.php"><li>Comentarios</li></a>
				<a href="contacto-medicos.php"><li>Médicos</li></a>
				<a href="contacto-empresas.php"><li class="select">Empresas</li></a>
				<a href="bolsa-de-trabajo.php"><li style="border-bottom:none">Bolsa de Trabajo</li></a>
			</ul>
		</div>
		
		<div id="right-content">
			<div class="privilegios">
				<form action="envia-correo.php" method="post">
				<input type="hidden" value="empresas" name="pagina">
				<h1>ATENCIÓN EMPRESARIAL</h1>
					<?php if(isset($_GET['correo'])=='true'){ ?>
					<p class="mnsjok">El correo se ha enviado con éxito, en un momento nos comunicaremos con usted.</p>
					<?php }else if(isset($_GET['correo'])=='false'){ ?>
					<p class="mnsjerr">El correo no fue enviado.</p>
					<?php } ?>
					<p>Reduce tus costos en el Seguro Social y cumple con los requerimientos de Ley en materia de Salud, solicita la visita de uno de nuestros representantes.</p>
					<p>*Nombre
						<input type="text" name="nombre"></p>
					<p>*E-Mail
						<input type="text" name="email"></p>
					<p>*Empresa
						<input type="text" name="empresa"></p>
					<p>*Giro
						<input type="text" name="giro"></p>
					<p>*Numero de Empleados
						<input type="text" name="empleados"></p>
					<p>*Teléfono
						<input type="text" name="telefono" onkeypress="ValidaSoloNumeros()"></p>
					<p>*Dirección
						<input type="text" name="direccion"></p>
					<p>*Ingresa tu mensaje
						<textarea name="comentarios"></textarea></p>
						<div style="clear:both"></div>
					<p><h3>Los campos marcados con un asterisco (*) son requeridos</h3>
						<input type="submit" value="Enviar" onclick="if(nombre.value == ''){
							alert('Es necesario que escriba su nombre'); 
							nombre.focus();
							return false;
		                    }  else if(email.value == ''){
							alert('Su correo electr&oacute;nico es necesario'); 
							email.focus();
							return false;
							} else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))){
							alert('El correo electr&oacute;nico esta mal escrito, favor de verificarlo'); 
							email.focus();
							return false;					
							} else if(empresa.value == ''){
							alert('Por favor escriba el nombre de su empresa'); 
							empresa.focus();
							return false;
							} else if(giro.value == ''){
							alert('Por favor escriba el giro de su empresa'); 
							giro.focus();
							return false;
							} else if(empleados.value == ''){
							alert('Por favor escriba el numero de empleados'); 
							empleados.focus();
							return false;
							} else if(telefono.value == ''){
							alert('Por favor escriba un n&uacute;mero de tel&eacute;fono para poder contactarlo'); 
							telefono.focus();
							return false;
							} else if(direccion.value == ''){
							alert('Por favor escriba la dirección'); 
							direccion.focus();
							return false;
							} else if(comentarios.value == ''){
							alert('Redacte la raz&oacute;n de su contacto'); 
							comentarios.focus();
							return false;
							}"></p><br/>
				</form>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>

	</div>
</div>
<?php include('lib/footer.php') ?>  