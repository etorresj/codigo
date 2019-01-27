<?php 
include('../model/includes.php');
extract($_GET);
$chopo=new front();
$arreglo=$chopo->getPrecioSucursal($promo, $sucursal);
//print_r($arreglo);
if(is_numeric($arreglo[0]['precio']))
echo "$ ".$arreglo[0]['precio'].".00";
else 
	echo utf8_encode($arreglo[0]['precio']);

?>