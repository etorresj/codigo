<?php
include('../model/includes.php');
$id=$_GET['id'];
$chopo=new front();

if($chopo->checarFolio($id))
	echo "1";

?>