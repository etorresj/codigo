<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new front();

$arreglo=$chopo->especialidadRegion($id);
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['especialidad_id'].'">'.ucwords(strtolower($value['especialidadNombre'])).'</option>';
?>

