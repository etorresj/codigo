<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new admin();

$arreglo=$chopo->getDepartamentoDependencias();
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
?>