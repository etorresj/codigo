<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addPromocion($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=promocion", 3);
	else
		$error=1;
}

$servicios=$chopo->getServiciosDinamicos();

//archivo VISTA
require_once('view/promocion/agregarPromocion.php');
?>