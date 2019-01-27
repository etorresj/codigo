<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if(isset($_GET['visible'])&&isset($_GET['id'])) {
	$chopo->visibleSucursal($_GET);
}

$search=isset($_POST['search'])?utf8_decode($_POST['search']):(isset($_GET['search'])?utf8_decode($_GET['search']):"");

//paginador
$registros=20;
$total=sizeof($chopo->getSucursales("", $search));
$paginas=ceil($total/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;
//termina paginador


$sucursales=$chopo->getSucursales($limite, $search);
//$chopo->showArray($sucursales);

//archivo VISTA
require_once('view/sucursal/sucursal.php');
?>