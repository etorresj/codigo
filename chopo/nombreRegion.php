<?php
include('admin/model/includes.php');
$chopo= new front();
$region = $chopo->getRegionId($_GET['id']);
echo ucwords(strtolower($region[0]['nombre']));

?>