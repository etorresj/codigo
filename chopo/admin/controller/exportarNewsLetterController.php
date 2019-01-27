<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");

$servicios=$chopo->getNewsLetter("", $search);

//$chopo->showArray($servicios);
$hoy=date("d-m-Y");
//archivo VISTA
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("Content-Disposition: attachment; filename=NewsLetter-".$search."-".$hoy.".xls");
require_once('view/newsletter/newsletterExporta.php');
?>