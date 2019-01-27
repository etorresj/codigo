<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$idEstudio=$_POST['idEstudio']?$_POST['idEstudio']:$_GET['idEstudio'];
$idSucursal=$_POST['idSucursal']?$_POST['idSucursal']:$_GET['idSucursal'];
if($_POST) {
	$success=$chopo->editarPrecioEstudio($_POST);
	$chopo->redirect("?section=editarEstudioSucursales&id=".$idEstudio, 3);
	
}


$estudio=$chopo->getSucursalEstudio($idEstudio, $idSucursal);
//$chopo->showArray($estudio);
//archivo VISTA
require_once('view/servicios/editarPrecioEstudio.php');
?>