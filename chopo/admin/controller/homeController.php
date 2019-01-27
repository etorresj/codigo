<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();
$dash=$chopo->dash($_SESSION['chopoAdmin']);
//Archivo de home
require_once('view/home/home.php');
?>