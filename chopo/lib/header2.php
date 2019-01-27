<?php
include('admin/model/includes.php');

$chopo= new front();
$regiones = $chopo->getRegiones();
//$chopo->showArray($regiones);
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        
        <script src="js/jquery-1.9.1.min.js"></script>  
        
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/paginador.css" />

		<link rel="stylesheet" type="text/css" href="css/mediaquerys.css" />
		<script type="text/javascript" src="js/js.js"></script>
		
		<! Carrousel Index >
		<link rel="stylesheet" href="css/phenix.css">	
	   
	    <! Galeria Index >
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
		
		<script type="text/javascript" src="js/tabs.js"></script>
		
		<! tags filters >
		<script src="js/underscore-min.js"></script>
		<script src="js/jquery.tagfiltering.js"></script>

		<! Dropkick (option select) >
		<link rel="stylesheet" href="css/dropkick.css" type="text/css">	
		<script src="js/jquery.dropkick.js"></script>
		
		<! sidr >
		<link rel="stylesheet" href="css/component.css" type="text/css">	
		<script src="js/classie.js"></script>
  
		<script type="text/javascript" src="js/jquery.cookie.js"></script>
  
  		<! comboEspecialidadRegion >
  		<script type="text/javascript" src="js/dependenciasHome.js"></script>

  
		<link rel="stylesheet" href="css/colorbox.css" />
		<script src="js/jquery.colorbox.js"></script>
		<script>
			if(!localStorage.chopoRegion)
				localStorage.chopoRegion=2;


			$(document).ready(function(){
				
				//cargando combo region-especialidad
				cargarRegion();
				$("#especialidad").attr("disabled",true);
				$("#region").change(function(){cargaEspecialidadRegion();});
				//


				//buscando region 
				$.get("buscaRegion.php", { id: localStorage.chopoRegion },
					function(resultado)
					{
				
						if ($('#edomex').length) {
							resultadoAux=resultado.replace('<br>'," ");
							$("#edomex").html("<p>"+resultadoAux+"</p>");
						}

						if ($('#chopoIdRegion').length) {
							$("#chopoIdRegion").html(resultado);
						}
						
						$("#comboRegion").val(localStorage.chopoRegion);

						<?php if(!isset($_SESSION['chopoRegion'])) { 
						?>
						cambiaRegion();
						<?php } ?>
					}
				);
				

				
				if ($('.ajax').length)
				$(".ajax").colorbox({iframe:true, width:"60%", height:"60%"});
			});
			function cambiaRegion() {
				var region=$("#comboRegion").val();
				localStorage.chopoRegion=region;
				$.get("buscaRegion.php", { id: localStorage.chopoRegion },
					function(resultado)
					{
				
						if ($('#edomex').length) {
							resultadoAux=resultado.replace('<br>'," ");
							$("#edomex").html("<p>"+resultadoAux+"</p>");
						}

						if ($('#chopoIdRegion').length) {
							$("#chopoIdRegion").html(resultado);
						}
						window.location.reload();
					
					}

				);
				
			}
		</script>
		



        <title>Chopo</title>
    </head>
 
    <body class="cbp-spmenu-push">
	<div id="wrapper">
        <header>
			<div id="contactwrap">   
				<div id="contact"> 
					<div id="telefono"> 
						<img src="images/telefono.png" alt="telefono" width="25" height="25">
						<p>01800 00 CHOPO (24676)</p> 
					</div>
					<div id="edomex"> 
						
					</div>
					<div id="contacto"> 
						<a href="bolsa-de-trabajo.php"><img src="images/contacto.png" alt="contacto" width="120" height="30"></a>
					</div>	
					<div style="clear:both;"></div>			
				</div>     
			</div>

			<div id="submenuwrap">   
				<div id="submenu"> 
					<div id="search"> 
						<input type="text" name="search">
						<!--<img src="images/esp.png" alt="esp" width="27" height="25">
						<img src="images/eng.png" alt="eng" width="27" height="25">-->
					</div>
					<div id="privilegios"> 
						<ul>
							<a href="http://medicos.chopo.com.mx/" target="_blank"><li>Médicos</li></a>
							<a href="empresas.php"><li>Empresas</li></a>
							<a href="privilegios-chopo.php"><li>Privilegios Chopo</li></a>
							<li>Región :</li>
							<li>
								<form action="#" method="post" accept-charset="utf-8" >
									<label>
							            <select name="estado" tabindex="2" class="region" id="comboRegion" onchange="cambiaRegion();">
							              <?php foreach ($regiones as $region) { 
							              		$selected='';
								  				if($region['id']==$_SESSION['chopoRegion'])
								  					$selected='selected="selected"';
							              	?>
							              <option value="<?php echo $region['id'] ?>" <?php echo $selected; ?>>
							              	<?php echo ucfirst( utf8_encode($region['nombre'])); ?>
							              </option>
							              <?php } ?>
							            </select>
									</label>
						        </form>	
					        </li>
						</ul>
					</div>	
				</div> 							   
			</div>

			
			<div id="menuwrap">   
				<div id="menu">  
				<?php include('menu.php') ?>
				</div>     
			</div>
        </header>
 
 
