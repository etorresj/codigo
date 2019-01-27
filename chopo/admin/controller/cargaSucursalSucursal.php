<?php
include('../model/includes.php');
extract($_GET);
$chopo=new admin();
$arreglo=$chopo->getSucursalDependenciasSucursal($id, $tipo);
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['id'].'">'.ucfirst(mb_strtolower( utf8_encode($value['nombre']),"UTF-8" )).'</option>';
?>

