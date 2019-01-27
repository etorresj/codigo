<?php
include('admin/model/includes.php');
$_SESSION['chopoRegion']=$_GET['id'];

$chopo= new front();
$region = $chopo->getRegionId($_GET['id']);
echo ucfirst( utf8_encode($region[0]['nombre']))."<br>".$region[0]['telefono'];

?>