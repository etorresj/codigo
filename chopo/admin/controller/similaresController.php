<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->agregaSimilar($_POST);
	$chopo->redirect("?section=similares&id=".$_POST['promocion_codigo'], 0);
	
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$promocion=$chopo->getPromocionId($id);
$similares=$chopo->getSimilares($id);
$promociones=$chopo->getPromocionDinamicos();
//archivo VISTA
require_once('view/promocion/similares.php');
?>