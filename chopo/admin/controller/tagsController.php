<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");

//paginador
$registros=20;
$total=$chopo->consulta("SELECT COUNT(*) AS cuantos from tags where tag like '%$search%' ");
$paginas=ceil($total[0]['cuantos']/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;
//termina paginador


$folios=$chopo->getTags($limite, $search);

//archivo VISTA
require_once('view/tags/tags.php');
?>