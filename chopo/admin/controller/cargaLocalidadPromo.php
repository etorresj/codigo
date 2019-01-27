<?php
include('../model/includes.php');
$id=$_GET['id'];
extract($_GET);
$chopo=new admin();

$arreglo=$chopo->getLocalidadPromo($id, $region);
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['localidad_id'].'">'.utf8_encode(ucwords(strtolower($value['nombre']))).'</option>';
?>