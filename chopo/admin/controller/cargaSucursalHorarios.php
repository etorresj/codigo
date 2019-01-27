<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new front();
$sucursal=$chopo->getSucursalId($id);

$especialidades=$chopo->obtenerEspecialidadesSucursal($id);
//$chopo->showArray($especialidades);

?>

				<?php if($sucursal[0]['horario']) { ?>
				<p class="verde">Horario:</p>
				<p><?php echo utf8_encode((strtolower($sucursal[0]['horario']))); ?></p>
				<?php } if($sucursal[0]['accesabilidad']) { ?>
				<p class="verde">Accesabilidad:</p>
				<?php } ?>
				<p><?php echo utf8_encode(ucwords(strtolower($sucursal[0]['accesabilidad']))); ?></p>

