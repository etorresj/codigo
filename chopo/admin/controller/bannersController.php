<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();
if(isset($_GET['visible'])&&isset($_GET['id'])) {
	$chopo->visibleBanner($_GET);
}
$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");

//paginador
$registros=20;
$total=sizeof($chopo->getBanners("", $search));
$paginas=ceil($total/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;
//termina paginador


$folios=$chopo->getBanners($limite, $search);

//archivo VISTA
require_once('view/banners/banners.php');
?>