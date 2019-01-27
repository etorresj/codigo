<?php
include('model/includes.php');
if(!$_SESSION['chopoAdmin']) {
header("Location: index.php");
exit(); }
$id=$_GET['id'];
$order=$_GET['order'];
$tipo=$_GET['tipo'];
$chopo=new admin();

//ordenando
$chopo->ordena($_GET, "banners");
echo '<script type="text/javascript">window.location = "index.php?section=banners"</script>';
