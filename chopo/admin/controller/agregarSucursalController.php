<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addSucursal($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=sucursal", 3);
	else
		$error=1;
}

$localidades=$chopo->getLocalidades();
$tipos=$chopo->getTipos();
$listas=$chopo->getListas();
//archivo VISTA
require_once('view/sucursal/agregarSucursal.php');
?>