<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if(isset($_GET['visible'])&&isset($_GET['id'])) {
	$chopo->visibleRegion($_GET);
}

$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");

//paginador
$registros=20;
$total=$chopo->consulta("SELECT COUNT(*) AS cuantos from region where nombre like '%$search%' or tag like '%$search%' ");
$paginas=ceil($total[0]['cuantos']/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;
//termina paginador


$regiones=$chopo->getRegiones($limite, $search);

//archivo VISTA
require_once('view/region/region.php');
?>