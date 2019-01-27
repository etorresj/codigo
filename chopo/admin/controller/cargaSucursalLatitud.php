<?php 
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new admin();
$arreglo=$chopo->getSucursalId($id);
//print_r($arreglo);
echo $arreglo[0]['latitud'].",".$arreglo[0]['longitud'];
?>