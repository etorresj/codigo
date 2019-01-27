<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaPromoSucursal($id);
$chopo->redirect("?section=editarPromocionSucursales&id=".$idSucursal, 0);

?>