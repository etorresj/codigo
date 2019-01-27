<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new front();
$sucursal=$chopo->getSucursalId($id);

$especialidades=$chopo->obtenerEspecialidadesSucursal($id);
//$chopo->showArray($especialidades);

?>

<h1><?php echo utf8_encode(ucwords(strtolower($sucursal[0]['nombre']))); ?></h1>
			<p class="verde">Dirección:</p>
			<p><?php echo utf8_encode(ucwords(strtolower($sucursal[0]['direccion']))); ?></p>
			<p><span class="verde">Teléfono:</span> <?php echo ucwords(strtolower($sucursal[0]['telefonos'])) ?></p>
			<p class="verde">Especialidades:</p>
			<ul>
				<?php foreach($especialidades as $especialidad) 
						echo '<li><a href="especialidad.php?id='.$especialidad['especialidad_id'].'&sucursal='.$id.'" class=\'ajax\'><span style="color:#fff">'.ucwords(strtolower($especialidad['nombre']))."</span></a></li>";
				?> 
			</ul>

<script>
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
				        $(".ajax").colorbox({iframe:true, width:'95%', height:'95%'});
				    } else {
				        $(".ajax").colorbox({iframe:true, width:'60%', height:'60%'});
				    }
</script>