<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->editServicio($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=perfiles", 3);
	else
		$error=1;
}
$id=$_POST['codigo']?$_POST['codigo']:$_GET['id'];
$servicio=$chopo->getServicioId($id);
$departamentos=$chopo->getDepartamentoDependencias();
//$chopo->showArray($servicio);
//archivo VISTA
require_once('view/perfiles/editarPerfil.php');
?>