<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se edita region
if($_POST) {
	$success=$chopo->editRegion($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=region", 3);
	else
		$error=1;
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$folios=$chopo->getFolios();
$region=$chopo->getRegionId($id);
//archivo VISTA
require_once('view/region/editarRegion.php');
?>