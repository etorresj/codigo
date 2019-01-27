<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");

if(isset($_POST['perfil_codigo'])) {
	$chopo->agregaPerfil($_POST);
}

//paginador
$registros=20;
$total=sizeof($chopo->getPerfiles("", $search));
$paginas=ceil($total/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;
//termina paginador


$perfiles=$chopo->getPerfiles($limite, $search);
//$servicios=$chopo->getServiciosDinamicos();

//$chopo->showArray($servicios);

//archivo VISTA
require_once('view/perfiles/perfiles.php');
?>