<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->editSucursal($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=sucursal", 3);
	else
		$error=1;
}

$id=$_POST['id']?$_POST['id']:$_GET['id'];
$localidades=$chopo->getLocalidades();
$tipos=$chopo->getTipos();
$listas=$chopo->getListas();
$sucursal=$chopo->getSucursalId($id);

//archivo VISTA
require_once('view/sucursal/editarSucursal.php');
?>