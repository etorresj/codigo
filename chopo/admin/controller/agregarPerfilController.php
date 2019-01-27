<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addServicio($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=perfiles", 3);
	else
		$error=1;
}

$sucursales=$chopo->getSucursalesEsp();
//archivo VISTA
require_once('view/perfiles/agregarPerfil.php');
?>