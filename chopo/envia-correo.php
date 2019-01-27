<?php
if($_POST['pagina']=='informes'){
	$rn="\n";
					$To='informes.web@chopo.com.mx';
					$cc="edgar.osorio@proa.com.mx"; 
					$cc2="marcos.olivo@proa.com.mx"; 
					$From='Laboratorios Chopo';
					//$FromAddress=$_POST['email'];
					//$Host=$hostName;
					$Subject = 'Contacto '.$_POST['pagina'].'';
					
					//Sending e-mail
					$Header = "MIME-Version: 1.0".$rn;
					$Header.= "Content-type: text/html; charset=utf-8".$rn;
					$Header.= "Content-Transfer-Encoding: 8bit".$rn; 
					$Header.="X-Mailer: DFM PHP/".phpversion().$rn;
					$Header.="X-Priority: 3".$rn;
					$Header.="From: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Return-Path: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Reply-To: ".$From." <Laboratorios Chopo>".$rn;
					//$Header.="Sender: ".$Host.$rn;
					$Header.="Sent: ".date("d-m-Y").$rn;  
					
					$Message='
					<html>
					<head>
					  <title>Mensaje de Laboratorios Chopo</title>
					</head>
					<body>
					  <table width="100%">
					  	<tr>
					      <td align="center" bgcolor="#016DB9"><img src="http://chopo.com.mx/images/chopologo.png" alt="chopologo" width="150" height="85" /></td>
					    </tr>
					    <tr>
					      <td><p>&nbsp</p></td>
					    </tr>
					    <tr>
					      <td>
					      		<p><strong>Nombre:</strong> '.$_POST['nombre'].'</p>
								<p><strong>E-Mail:</strong> '.$_POST['email'].'</p>
								<p><strong>Teléfono:</strong> '.$_POST['telefono'].'</p>
								<p><strong>Dirección:</strong> '.$_POST['direccion'].'</p>
								<p><strong>Sucursal:</strong> '.$_POST['sucursal'].'</p>
								<p><strong>Mensaje:</strong> '.$_POST['comentarios'].'</td>
					    </tr>
					  </table>
					</body>
					</html>
					';	
					if(mail("$To,$cc,$cc2",$Subject,$Message,$Header) or die ("System error, try again later"))
				        $seEnvio = true;
				    else
				        $seEnvio = false;
				 
					//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
					        if($seEnvio == true)
					    {
					        header('Location: contacto-informes.php?correo=true');
					    }
					    else
					    {
					        header('Location: contacto-informes.php?correo=false');
					    }		
} else if($_POST['pagina']=='comentarios'){
	$rn="\n";
					$To='comentarios.calidad@chopo.com.mx';
					$cc="edgar.osorio@proa.com.mx"; 
					$cc2="marcos.olivo@proa.com.mx"; 
					$From='Laboratorios Chopo';
					//$FromAddress=$_POST['email'];
					//$Host=$hostName;
					$Subject = 'Contacto '.$_POST['pagina'].'';
					
					//Sending e-mail
					$Header = "MIME-Version: 1.0".$rn;
					$Header.= "Content-type: text/html; charset=utf-8".$rn;
					$Header.= "Content-Transfer-Encoding: 8bit".$rn; 
					$Header.="X-Mailer: DFM PHP/".phpversion().$rn;
					$Header.="X-Priority: 3".$rn;
					$Header.="From: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Return-Path: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Reply-To: ".$From." <Laboratorios Chopo>".$rn;
					//$Header.="Sender: ".$Host.$rn;
					$Header.="Sent: ".date("d-m-Y").$rn;  
					
					$Message='
					<html>
					<head>
					  <title>Mensaje de Laboratorios Chopo</title>
					</head>
					<body>
					  <table width="100%">
					  	<tr>
					      <td align="center" bgcolor="#016DB9"><img src="http://chopo.com.mx/images/chopologo.png" alt="chopologo" width="150" height="85" /></td>
					    </tr>
					    <tr>
					      <td><p>&nbsp</p></td>
					    </tr>
					    <tr>
					      <td>
					      		<p><strong>Nombre:</strong> '.$_POST['nombre'].'</p>
								<p><strong>E-Mail:</strong> '.$_POST['email'].'</p>
								<p><strong>Teléfono:</strong> '.$_POST['telefono'].'</p>
								<p><strong>Especialidad:</strong> '.$_POST['especialidad'].'</p>
								<p><strong>Mensaje:</strong> '.$_POST['comentarios'].'</td>
					    </tr>
					  </table>
					</body>
					</html>
					';	
					if(mail("$To,$cc,$cc2",$Subject,$Message,$Header) or die ("System error, try again later"))
				        $seEnvio = true;
				    else
				        $seEnvio = false;
				 
					//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
					        if($seEnvio == true)
					    {
					        header('Location: contacto-comentarios.php?correo=true');
					    }
					    else
					    {
					        header('Location: contacto-comentarios.php?correo=false');
					    }		
} else if($_POST['pagina']=='medicos'){
	$rn="\n";
					$To='atención.medicos@chopo.com.mx';
					$cc="edgar.osorio@proa.com.mx"; 
					$cc2="marcos.olivo@proa.com.mx"; 
					$From='Laboratorios Chopo';
					//$FromAddress=$_POST['email'];
					//$Host=$hostName;
					$Subject = 'Contacto '.$_POST['pagina'].'';
					
					//Sending e-mail
					$Header = "MIME-Version: 1.0".$rn;
					$Header.= "Content-type: text/html; charset=utf-8".$rn;
					$Header.= "Content-Transfer-Encoding: 8bit".$rn; 
					$Header.="X-Mailer: DFM PHP/".phpversion().$rn;
					$Header.="X-Priority: 3".$rn;
					$Header.="From: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Return-Path: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Reply-To: ".$From." <Laboratorios Chopo>".$rn;
					//$Header.="Sender: ".$Host.$rn;
					$Header.="Sent: ".date("d-m-Y").$rn;  
					
					$Message='
					<html>
					<head>
					  <title>Mensaje de Laboratorios Chopo</title>
					</head>
					<body>
					  <table width="100%">
					  	<tr>
					      <td align="center" bgcolor="#016DB9"><img src="http://chopo.com.mx/images/chopologo.png" alt="chopologo" width="150" height="85" /></td>
					    </tr>
					    <tr>
					      <td><p>&nbsp</p></td>
					    </tr>
					    <tr>
					      <td>
					      		<p><strong>Nombre:</strong> '.$_POST['nombre'].'</p>
								<p><strong>E-Mail:</strong> '.$_POST['email'].'</p>
								<p><strong>Teléfono:</strong> '.$_POST['telefono'].'</p>
								<p><strong>Dirección:</strong> '.$_POST['direccion'].'</p>
								<p><strong>Especialidad:</strong> '.$_POST['especialidad'].'</p>
								<p><strong>Código:</strong> '.$_POST['codigo'].'</p>
								<p><strong>Mensaje:</strong> '.$_POST['comentarios'].'</td>
					    </tr>
					  </table>
					</body>
					</html>
					';	
					if(mail("$To,$cc,$cc2",$Subject,$Message,$Header) or die ("System error, try again later"))
				        $seEnvio = true;
				    else
				        $seEnvio = false;
				 
					//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
					        if($seEnvio == true)
					    {
					        header('Location: contacto-medicos.php?correo=true');
					    }
					    else
					    {
					        header('Location: contacto-medicos.php?correo=false');
					    }		
} else if($_POST['pagina']=='empresas'){
	$rn="\n";
					$To='atención.empresarial@chopo.com.mx';
					$cc="edgar.osorio@proa.com.mx"; 
					$cc2="marcos.olivo@proa.com.mx"; 
					$From='Laboratorios Chopo';
					//$FromAddress=$_POST['email'];
					//$Host=$hostName;
					$Subject = 'Contacto '.$_POST['pagina'].'';
				 
					
					
					//Sending e-mail
					$Header = "MIME-Version: 1.0".$rn;
					$Header.= "Content-type: text/html; charset=utf-8".$rn;
					$Header.= "Content-Transfer-Encoding: 8bit".$rn; 
					$Header.="X-Mailer: DFM PHP/".phpversion().$rn;
					$Header.="X-Priority: 3".$rn;
					$Header.="From: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Return-Path: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Reply-To: ".$From." <Laboratorios Chopo>".$rn;
					//$Header.="Sender: ".$Host.$rn;
					$Header.="Sent: ".date("d-m-Y").$rn;  
					
					$Message='
					<html>
					<head>
					  <title>Mensaje de Laboratorios Chopo</title>
					</head>
					<body>
					  <table width="100%">
					  	<tr>
					      <td align="center" bgcolor="#016DB9"><img src="http://chopo.com.mx/images/chopologo.png" alt="chopologo" width="150" height="85" /></td>
					    </tr>
					    <tr>
					      <td><p>&nbsp</p></td>
					    </tr>
					    <tr>
					      <td>
					      		<p><strong>Nombre:</strong> '.$_POST['nombre'].'</p>
								<p><strong>E-Mail:</strong> '.$_POST['email'].'</p>
								<p><strong>Empresa:</strong> '.$_POST['empresa'].'</p>
								<p><strong>Giro:</strong> '.$_POST['giro'].'</p>
								<p><strong>Numero de Empleados:</strong> '.$_POST['empleados'].'</p>
								<p><strong>Teléfono:</strong> '.$_POST['telefono'].'</p>
								<p><strong>Dirección:</strong> '.$_POST['direccion'].'</p>
								<p><strong>Mensaje:</strong> '.$_POST['comentarios'].'</td>
					    </tr>
					  </table>
					</body>
					</html>
					';	
					if(mail("$To,$cc,$cc2",$Subject,$Message,$Header) or die ("System error, try again later"))
				        $seEnvio = true;
				    else
				        $seEnvio = false;
				 
					//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
					        if($seEnvio == true)
					    {
					        header('Location: contacto-empresas.php?correo=true');
					    }
					    else
					    {
					        header('Location: contacto-empresas.php?correo=false');
					    }		
} else if($_POST['pagina']=='bolsa'){
	$rn="\n";
					$To='reclutamiento.selección@proa.com.mx';
					$cc="edgar.osorio@proa.com.mx"; 
					$cc2="marcos.olivo@proa.com.mx";
					//$From='Laboratorios Chopo';
					//$FromAddress=$_POST['email'];
					//$Host=$hostName;
					$Subject = 'Contacto '.$_POST['pagina'].'';
					
					$_name=$_FILES["curriculum"]["name"];
					$_type=$_FILES["curriculum"]["type"];
					$_size=$_FILES["curriculum"]["size"];
					$_temp=$_FILES["curriculum"]["tmp_name"];
					$Message='
					<html>
					<head>
					  <title>Mensaje de Laboratorios Chopo</title>
					</head>
					<body>
					  <table width="100%">
					  	<tr>
					      <td align="center" bgcolor="#016DB9"><img src="http://chopo.com.mx/images/chopologo.png" alt="chopologo" width="150" height="85" /></td>
					    </tr>
					    <tr>
					      <td><p>&nbsp</p></td>
					    </tr>
					    <tr>
					      <td>
					      		<p><strong>Nombre:</strong> '.$_POST['nombre'].'</p>
								<p><strong>E-Mail:</strong> '.$_POST['email'].'</p>
								<p><strong>Teléfono:</strong> '.$_POST['telefono'].'</p>
								<p><strong>Dirección:</strong> '.$_POST['direccion'].'</p>
								<p><strong>Area de Interes:</strong> '.$_POST['areadeinteres'].'</p>
								<p><strong>Mensaje:</strong> '.$_POST['comentarios'].'</p>
						  </td>
					    </tr>
					  </table>
					</body>
					</html>
					';
					$num = md5(time());
					
					//Sending e-mail
					if( strcmp($_name, "") ) //FILES EXISTS
					{ 
					$fp = fopen($_temp, "rb");
					$file = fread($fp, $_size);
					$file = chunk_split(base64_encode($file)); 
					
					// MULTI-HEADERS Content-Type: multipart/mixed and Boundary is mandatory.
					$headers = "From: Laboratorios Chopo";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: multipart/mixed; "; 
					$headers .= "boundary=".$num."\r\n";
					$headers .= "--".$num."\n"; 
					
					// HTML HEADERS 
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
					$headers .= "Content-Transfer-Encoding: 8bit\r\n";
					$headers .= "".$Message."\n";
					$headers .= "--".$num."\n"; 
					
					// FILES HEADERS 
					$headers .= "Content-Type:application/octet-stream "; 
					$headers .= "name=\"".$_name."\"r\n";
					$headers .= "Content-Transfer-Encoding: base64\r\n";
					$headers .= "Content-Disposition: attachment; ";
					$headers .= "filename=\"".$_name."\"\r\n\n";
					$headers .= "".$file."\r\n";
					$headers .= "--".$num."--"; 
					
					}else { //FILES NO EXISTS
					
					// HTML HEADERS
					$headers = "From: GME \r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
					$headers .= "Content-Transfer-Encoding: 8bit\r\n";
					} 
 
					
						
					if(mail("$To,$cc,$cc2",$Subject,$Message,$headers) or die ("System error, try again later"))
				        $seEnvio = true;
				    else
				        $seEnvio = false;
				 
					//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
					        if($seEnvio == true)
					    {
					        header('Location: bolsa-de-trabajo.php?correo=true');
					    }
					    else
					    {
					        header('Location: bolsa-de-trabajo.php?correo=false');
					    }		
}	
else if($_POST['pagina']=='suscripcion'){


					$rn="\n";
					$To=$_POST['suscribete'];
					$From='Laboratorios Chopo';
					//$FromAddress=$_POST['email'];
					//$Host=$hostName;
					$Subject = 'Suscripción boletín mensual';
				 
					
					
					//Sending e-mail
					$Header = "MIME-Version: 1.0".$rn;
					$Header.= "Content-type: text/html; charset=utf-8".$rn;
					$Header.= "Content-Transfer-Encoding: 8bit".$rn; 
					$Header.="X-Mailer: DFM PHP/".phpversion().$rn;
					$Header.="X-Priority: 3".$rn;
					$Header.="From: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Return-Path: ".$From." <Laboratorios Chopo>".$rn;
					$Header.="Reply-To: ".$From." <Laboratorios Chopo>".$rn;
					//$Header.="Sender: ".$Host.$rn;
					$Header.="Sent: ".date("d-m-Y").$rn;  
					
					$Message='
					<html>
					<head>
					  <title>Mensaje de Laboratorios Chopo</title>
					</head>
					<body>
					  <table width="100%">
					  	<tr>
					      <td align="center" bgcolor="#016DB9"><img src="http://chopo.com.mx/images/chopologo.png" alt="chopologo" width="150" height="85" /></td>
					    </tr>
					    <tr>
					      <td><p>&nbsp</p></td>
					    </tr>
					    <tr>
					      <td>
					      		<p><strong>Imagenes</p>
					    </tr>
					  </table>
					</body>
					</html>
					';	
					if(mail($To,$Subject,$Message,$Header) or die ("System error, try again later"))
				        $seEnvio = true;
				    else
				        $seEnvio = false;
				 
					//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
					        if($seEnvio == true)
					    {
					        header('Location:' . $_SERVER['HTTP_REFERER']);
					    }
					    else
					    {
					        header('Location:' . $_SERVER['HTTP_REFERER']);
					    //}		
}							
?>
