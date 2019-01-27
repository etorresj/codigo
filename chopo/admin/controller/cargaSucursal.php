<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new admin();
echo $id;
$arreglo=$chopo->getSucursalDependencias($id);
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['id'].'">'.ucfirst( utf8_encode($value['nombre'])).'</option>';
?>

