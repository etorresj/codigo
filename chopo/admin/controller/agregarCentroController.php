<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addCentro($_POST);
	if($success)
		$chopo->redirect("?section=centroAnalitico", 3);
	else
		$error=1;
}

//archivo VISTA
require_once('view/centro/agregarCentro.php');
?>