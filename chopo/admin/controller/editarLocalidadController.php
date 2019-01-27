<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se edita region
if($_POST) {
	$success=$chopo->editLocalidad($_POST);
	if($success)
		$chopo->redirect("?section=localidad", 3);
	else
		$error=1;
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$regiones=$chopo->getRegiones();
$localidad=$chopo->getLocalidadId($id);
//archivo VISTA
require_once('view/localidad/editarLocalidad.php');
?>