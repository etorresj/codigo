<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addEspecialidad($_POST);
	if($success)
		$chopo->redirect("?section=especialidades", 3);
	else
		$error=1;
}

$sucursales=$chopo->getSucursalesEsp();
//archivo VISTA
require_once('view/especialidades/agregarEspecialidad.php');
?>