<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->agregarEstudioSucursal($_POST);
	//$chopo->redirect("?section=editarPromocionSucursales&id=".$_POST['id'], 0);
	
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];

$sucursales=$chopo->getEstudioSucursales($id);
$estudio=$chopo->getServicioId($id);
//$chopo->showArray($estudio);
//archivo VISTA
require_once('view/servicios/editarSucursales.php');
?>