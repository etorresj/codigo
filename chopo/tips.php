<?php include('lib/header.php');
$id=$_GET['id'];
$tip=$chopo->getTipId($id);


?>  
<?php
$seccion=$_POST['seccion'];
$consulta=$resultado=NULL;
if(isset($secciones[$seccion]))
{
	include 'conexion.php';
	conectar();
	
	$consulta=mysql_query("SELECT {$secciones[$seccion][3]} FROM {$secciones[$seccion][0]} WHERE {$secciones[$seccion][1]}={$secciones[$seccion][2]}") or
	die (mysql_error());
	
	desconectar();
	$resultado=mysql_fetch_array($consulta);
	echo utf8_encode($resultado[0]);
}
?> 


<div id="contentwrap"> 
	<div id="content">  
		
	<div id="content-in">
			

				
					<div class="fondo-blanco tips">
						<div class="headtips">
							<img src="images/regresar.jpg" alt="tips-de-salud" onclick="history.back();" class="regresar" />
							<div class="fecha-verde">
								<?php echo $chopo->invFecha($tip[0]['fecha']); ?>
							</div>
							<div class="social">
								<div id="fb-root"></div>
										<script>(function(d, s, id) {
										  var js, fjs = d.getElementsByTagName(s)[0];
										  if (d.getElementById(id)) return;
										  js = d.createElement(s); js.id = id;
										  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
										  fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
										<div class="fb-like" data-href="http://chopo.com.mx/tips.php?id=<?php echo $id; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
								<a href="http://chopo.com.mx/tips.php?id=<?php echo $id; ?>" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</div>
						</div>
						
						<div class="img">
							<img src="images/tips/<?php echo $tip[0]['img']; ?>" alt="tips-de-salud" />
						</div>
						
						<div>
						<h1><?php echo utf8_encode($tip[0]['titulo']); ?></h1>
<h3>Por <span class="underline">Laboratorio Médico del Chopo</span></h3>


						<?php echo utf8_encode($tip[0]['texto']); ?>
							
								
						<div class="navtips">
							<!--<a href=""><< Nota Anterior</a>
							<a href="" class="sig">Nota Siguiente>></a>-->
						</div>
							
						</div>						
					</div>
					
				



			
	</div>

	</div>
</div>
<?php include('lib/footer.php') ?>  
