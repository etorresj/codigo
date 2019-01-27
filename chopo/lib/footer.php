        <footer>
        	<div id="footinfowrap"> 
	        	<div id="footinfo"> 
	        		<div id="suscribete">
	        		
	        			<div class="suscrib-texto">
		        			<p class="letragrande">Suscríbete a nuestro<span class="verde"> boletín mensual</span></p>
		        			<p>Recibe nuestras promociones y paquetes por correo electrónico.</p>
	        			</div>
	        			
	        			<form action="envia-correo.php" method="post">
						<input type="hidden" value="suscripcion" name="pagina">
	        			<div class="suscrib-input">
		        					<input type="text" name="suscribete" class="susc" value="Correo Electrónico*" onclick="if(this.value=='Correo Electronico*') this.value=''" onblur="if(this.value=='') this.value='Correo Electronico*'">
		        			
									<label>
							            <select name="region" id="region" tabindex="2" class="susc">
							              <option value="0">Región*</option>
							              
							            </select>
									</label>
									
									<label>
							            <select name="especiadlidad" id="especialidad" tabindex="2" class="susc">
							              <option value="0">Especialidad*</option>
							             
							            </select>
									</label>	
	        			</div>
	        			
	        			
	        			<div class="suscrib-boton">
		        			<p class="letrapequena">*Campos obligatorios</p>
		        			<input type="image" src="images/enviar_button.jpg" class="enviarimage" onclick="if(suscribete.value == ''){
							alert('Su correo electr&oacute;nico es necesario'); 
							suscribete.focus();
							return false;
							} else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(suscribete.value))){
							alert('El correo electr&oacute;nico esta mal escrito, favor de verificarlo'); 
							suscribete.focus();
							return false;					
							} else if(region.value == '0'){
							alert('Seleccione una región'); 
							region.focus();
							return false;
							} else if(especiadlidad.value == '0'){
							alert('Seleccione una especiadlidad'); 
							especiadlidad.focus();
							return false;
							}else {
							alert('Se le ha enviado un correo donde podrá ver nuestras promociones, gracias por suscribirse'); 
							}">
	        			</div>
	        			
	        			</form>	
	        			
	        			
	        		</div>
	        		<div id="descarga">
	        			<p>Descarga la App <strong>Chopo Móvil</strong></p>
	        			<a href="https://itunes.apple.com/mx/app/chopo-mobile/id716950645?mt=8"><img src="images/appstore.jpg" alt="appstore" width="130" height="45" /></a>
	        			<a href="https://play.google.com/store/apps/details?id=com.artech.appeme3.chopo&hl=es"><img src="images/googleplay.jpg" alt="googleplay" width="130" height="45" /></a>
	        			<img src="images/chopo_foot.jpg" alt="chopo_foot" class="chopo_foot" width="80" height="80" />
	        		</div>    
				</div>
        	</div>

			<div id="footmenuwrap"> 
				<div id="footmenu"> 
					<div id="nuestrosestudios">  
						<span class="azul">Nuestros Estudios</span><br><br>
						<ul>
							<li><a href="http://chopo.com.mx/blog/analisis-clinicos/">Análisis Clínicos</a></li>
							<li><a href="">Rayos X</a></li>
							<li><a href="http://chopo.com.mx/blog/ultrasonido/">Ultrasonido</a></li>
							<li><a href="http://chopo.com.mx/blog/resonanciamagnetica/">Resonancia Magnética</a></li>
							<li><a href="http://chopo.com.mx/blog/analisis-clinicos/">Laboratorio</a></li>
							<li><a href="">Prueba de Embarazo</a></li>
							<li><a href="http://chopo.com.mx/promociones/detalle/videoendoscopia/distrito-federal">Endoscopía</a></li>
							<li><a href="http://chopo.com.mx/blog/cardiologia/">Electrocardiograma</a></li>
							<li><a href="http://chopo.com.mx/blog/hipertension/">Presión Arterial</a></li>
							<li>&nbsp</li>
							<li><a href="privilegios-chopo.php" class="azul">Privilegios Chopo</a></li>
							<li>&nbsp</li>
							<li>&nbsp</li>
							<li><a href="contacto-informes.php" class="azul">Contacto</a></li>
						</ul>  
						<ul>
							<li><a href="">Toxicología</a></li>
							<li><a href="">Mastografía</a></li>
							<li><a href="">Coploscopía</a></li>
							<li><a href="">Papanicolaou</a></li>
							<li><a href="">Tomografía</a></li>
							<li><a href="http://chopo.com.mx/blog/check-up/">Química Sanguínea</a></li>
							<li><a href="">Perfiles Hormonales</a></li>
							<li><a href="">Ecocardiograma</a></li>
							<li><a href="">Medicina Nuclear</a></li>
						</ul>     
					</div>
					<div id="unidades">   
						<span class="azul">Unidades</span><br><br>
						<ul>
							<li><a href="">Centro de Especialidades</a></li>
							<li><a href="">DF y zona metropolitana</a></li>
							<li><a href="">Guanajuato</a></li>
							<li><a href="">Hidalgo</a></li>
							<li><a href="">Jalisco</a></li>
							<li><a href="">Toluca y Michoacán</a></li>
							<li><a href="">Querétaro</a></li>
							<li>&nbsp</li>
							<li class="azul">Servicios</li><br/><br/>
							<li><a href="resultados-pacientes.php">Resultados Pacientes</a></li>
							<li><a href="resultados-empresas.php">Resultados Empresas</a></li>
							<li><a href="resultados-medicos.php">Resultados Médicos</a></li>
							<li><a href="http://201.149.87.134/facturacionpacientes/wpfacturacion.aspx?82">Facturación Electrónica</a></li>
						</ul>     
					</div>
					
					<div id="calidad"> 
						<table>
							<tr>
								<td colspan="3" align="center">La Calidad de nuestro centro analítico<br>CARPERMOR está acreditada y certificada por:</td>
							</tr>

							<tr >
								<td><img src="images/capacreedit.png" alt="capacreedit" width="94" height="53" /></td>
								<td><img src="images/iso.png" alt="iso" width="65" height="73" /></td>
								<td><img src="images/ngsp.png" alt="ngsp" width="81" height="58" /></td>
							</tr>
							<tr>
								<td colspan="3" align="center">Responsable Sanitario Q.F.B. Mario Garcia Sánchez Ced. Prof. 895854 U.A.M.</td>
							</tr>
						</table> 
						
						  
					</div> 
					<table  class="tablefinal">
							<tr>
								<td><img src="images/chopo3.png" alt="chopo3" width="149" height="55" /></td>
								<td><span class="azul" style="font-weight:lighter">© 2014 Chopo tu laboratorio de cabecera</span></td>
							</tr>
						</table>
					<div style="clear:both"></div>      
				</div>
			</div>
			<div id="footfinish"> 
			</div>
        </footer>
    </div>
    </body> 
</html>