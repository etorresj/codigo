<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addLocalidad($_POST);
	if($success)
		$chopo->redirect("?section=localidad", 3);
	else
		$error=1;
}

$regiones=$chopo->getRegiones();
//archivo VISTA
require_once('view/localidad/agregarLocalidad.php');
?>