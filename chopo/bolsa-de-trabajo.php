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
				<a href="contacto-empresas.php"><li>Empresas</li></a>
				<a href="bolsa-de-trabajo.php"><li class="select" style="border-bottom:none">Bolsa de Trabajo</li></a>
			</ul>
		</div>
		
		<div id="right-content">
			<div class="privilegios">
				<form action="envia-correo.php" method="post" enctype="multipart/form-data">
				<input type="hidden" value="bolsa" name="pagina">
				<h1>CONTACTO LABORAL</h1>
					<?php if(isset($_GET['correo'])=='true'){ ?>
					<p class="mnsjok">El correo se ha enviado con éxito, en un momento nos comunicaremos con usted.</p>
					<?php }else if(isset($_GET['correo'])=='false'){ ?>
					<p class="mnsjerr">El correo no fue enviado.</p>
					<?php } ?>
					<p>Buscamos gente excepcional. Se parte de nuestro equipo de
colaboradores envíanos tu currículum aquí.</p>
					<p>*Nombre
						<input type="text" name="nombre"></p>
					<p>*E-Mail
						<input type="text" name="email"></p>
					<p>*Teléfono
						<input type="text" name="telefono" onkeypress="ValidaSoloNumeros()"></p>
					<p>Dirección
						<input type="text" name="direccion"></p>
					<p>*Área de interés
						<input type="text" name="areadeinteres"></p>
					<p>*Curriculum
						<td><input type="file" name="curriculum"></p>
					<p>*Ingresa tus comentarios
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
							} else if(telefono.value == ''){
							alert('Por favor escriba un n&uacute;mero de tel&eacute;fono para poder contactarlo'); 
							telefono.focus();
							return false;
							} else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))){
							alert('El correo electr&oacute;nico esta mal escrito, favor de verificarlo'); 
							email.focus();
							return false;					
							} else if(areadeinteres.value == ''){
							alert('Por favor escriba su área de interés'); 
							areadeinteres.focus();
							return false;
							} else if(curriculum.value == ''){
							alert('Por favor adjunte su curriculum'); 
							curriculum.focus();
							return false;
							} else if(comentarios.value == ''){
							alert('Redacte la raz&oacute;n de su contacto'); 
							comentarios.focus();
							return false;
 						}"></p><br/>
						<div style="clear:both"></div>
					<p>También puedes enviar tu currículum a esta dirección:</p>
					<p><h2>reclutamiento.seleccion@proa.com.mx</h2></p>
				</form>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>

	</div>
</div>
<?php include('lib/footer.php') ?>  