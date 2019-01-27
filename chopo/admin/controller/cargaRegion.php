<?php
include('../model/includes.php');
$chopo=new admin();
$arreglo=$chopo->getRegiones();
foreach($arreglo as $value)
echo '<option value="'.$value['id'].'">'.ucfirst( utf8_encode($value['nombre'])).'</option>';
?>
