<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");

//paginador
$registros=50;
$total=sizeof($chopo->getNewsLetter("",$search));
$paginas=ceil($total/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;


//termina paginador

$servicios=$chopo->getNewsLetter($limite, $search);

//$chopo->showArray($servicios);

//archivo VISTA
require_once('view/newsletter/newsletter.php');
?>