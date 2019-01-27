<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new front();

$arreglo=$chopo->obtenerRegionesPromocion($_GET['codigoPromo'], $_GET['region']);
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['sucursalId'].'">'.ucwords(strtolower($value['sucursalNombre'])).'</option>';
?>

