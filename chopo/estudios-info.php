<?php 
include('admin/model/includes.php');
$chopo= new front();

extract($_GET);
$estudio=$chopo->getEstudioId($id);
//$chopo->showArray($estudio);
$sucursales=$chopo->getEstudioSucursales($id, $_SESSION['chopoRegion']);
//$chopo->showArray($sucursales);
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
			<style>
			body {
					font-family: arial;
				}
				.titulo{
					width: 100%;
					border-bottom: solid #6c6c6c thin;
					padding-bottom: 10px;
				}
				.verde{
					color: #7ac142;					
				}
				.azul{
					color: #0077c0;					
				}
				a{
					color: #0077c0;		
					text-decoration: underline;			
				}
			</style>
	</head>
	<body>

		<div class="titulo verde"><?php echo utf8_encode($estudio[0]['nombre']); ?></div>
		<?php if($estudio[0]['indicacion']) { ?>
		<p class="verde">Indicaciones:</p>
		<p><?php echo nl2br($estudio[0]['indicacion']); ?></p>
		<?php } ?>
		
		<p class="verde">Sucursales:</p>
		<p>
			<ul>
				<?php foreach($sucursales as $value) {
					echo "<li><a href='estudioSucursal.php?idEstudio=".$value['estudio_id']."&idSucursal=".$value['sucursal_id']."' target='_parent'>".ucfirst( strtolower(utf8_encode($value['nombre'])))."</a></li>";
				}
				?>
			</ul>
		</p>
	            
	    <div style="text-align:center">
	    	<p>Las sucursales, preparaciones y horarios disponibles para este estudio o promoción podrán ser confirmadas a los teléfonos:<span class="azul">1946 0606</span> Del interior: <span class="azul">01 800 00 24676.</span></p>
	    	<p>También nos podrás mandar un correo electrónico a <a href="mailto:informes.web@chopo.com.mx">informes.web@chopo.com.mx</a></p>
	    </div>      
	</body>
</html>