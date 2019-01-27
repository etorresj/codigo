<?php include('lib/header.php');

$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");

//paginador
$registros=5;
$total=sizeof($chopo->getTips("", $search, $_SESSION['chopoRegion']));
$paginas=ceil($total/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;
//termina paginador



$tips=$chopo->getTipsFront($limite, $search, $_SESSION['chopoRegion']);

 ?>  
<?php
/*$seccion=$_POST['seccion'];
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
}*/
?> 


<div id="contentwrap"> 
	<div id="content">  
	
	<div id="navegador">
		<ul class="texto">
			<a href="index.php"><li>Chopo</li></a>
			<li>></li>
			<li class="underline">Tips de salud</li></a>
		</ul>
		<ul class="breadscrumb">
				<li><a href="https://www.facebook.com/chopo.com.mx" target="_blank"><img src="images/icon-face.png" alt="icon-face"/></a></li>
				<li><a href="https://twitter.com/chopo_cercadeti" target="_blank"><img src="images/icon-twitter.png" alt="icon-twitter"/></a></li>
				<li><a href="https://plus.google.com/u/0/+chopo/posts" target="_blank"><img src="images/icon-google.png" alt="icon-google"/></a></li>
				<li><a href="http://www.youtube.com/user/ChopoCercaDeTi?feature=watch" target="_blank"><img src="images/icon-youtube.png" alt="icon-youtube"/></a></li>
		</ul>
	</div>
	
	<div id="content-in">
			<div class="busqueda">
				<form id="formaEstudios" name="formaEstudios" method="post">
						<input type="text"  name="search" class="headersearch" value="<?php echo $search; ?>" >
						<input type="image" src="images/search-lupa.jpg" alt="search-lupa" class="headersearch lupa" value=""  onclick=" document.formaEstudios.submit()">	
					</form>
			</div>
			
			<div class="busqueda-tips">
				<div class="tabOn" id="tab1">Ultimas notas</div>
				
				<div id="tabContenido">

					<?php 
					if($tips)
					foreach($tips as $tip) { ?>
					<div class="fondo-blanco">
						<div class="img">
							<div class="fecha-verde">
								<?php echo $chopo->invFecha($tip['fecha']); ?>
							</div>
							<img src="images/tips/<?php echo $tip['img']; ?>" alt="tips-de-salud" />
						</div>
						<div>
						<h1><?php echo utf8_encode($tip['titulo']); ?></h1>
						<h2><?php echo utf8_encode($tip['resumen']); ?></h2>
						
							<div class="social">
							
								<h3>Por <span class="underline">Laboratorio Médico del Chopo</span></h3>
									<div id="fb-root"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
									<div class="fb-like" data-href="http://chopo.com.mx/tips.php?id=<?php echo $tip['id']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
									
									<a href="http://chopo.com.mx/tips.php?id=<?php echo $tip['id']; ?>" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
								<a href="tips.php?id=<?php echo $tip['id']; ?>">Leer mas</a>
							
							</div>
						</div>						
					</div>
					
					<?php } ?>
					
					

				</div>				
			</div>

			
	</div>

	</div>
</div>
<?php include('lib/footer.php') ?>  
