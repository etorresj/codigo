<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new admin();

$arreglo=$chopo->showRegion($id);
echo ($arreglo);
?>