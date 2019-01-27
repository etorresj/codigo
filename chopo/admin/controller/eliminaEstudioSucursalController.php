<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaEstudioSucursal($idEstudio, $idSucursal);
$chopo->redirect("?section=editarEstudioSucursales&id=".$idEstudio, 0);

?>