<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->agregarPromocionSucursal($_POST);
	//$chopo->redirect("?section=editarPromocionSucursales&id=".$_POST['id'], 0);
	
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$promocion=$chopo->getPromocionId($id);
$sucursales=$chopo->getPromocionSucursal($id);
$precio=$chopo->getPrecioServicio($promocion[0]['servicio_codigo']);

//$chopo->showArray($precio);
//archivo VISTA
require_once('view/promocion/editarSucursales.php');
?>