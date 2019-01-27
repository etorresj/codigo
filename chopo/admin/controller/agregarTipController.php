<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addTip($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=tips", 3);
	else
		$error=1;
}
$regiones=$chopo->getRegiones();

//archivo VISTA
require_once('view/tips/agregarTip.php');
?>