<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new admin();
$arreglo=$chopo->getTipos($id);
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['id'].'">'.ucfirst(mb_strtolower( utf8_encode($value['nombre']),"UTF-8" )).'</option>';
?>

