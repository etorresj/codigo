<?php 
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new admin();
$arreglo=$chopo->getRegionId($id);
//print_r($arreglo);
echo $arreglo[0]['latitud'].",".$arreglo[0]['longitud'];
?>