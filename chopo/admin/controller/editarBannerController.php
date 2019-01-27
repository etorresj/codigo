<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se edita region
if($_POST) {
	$success=$chopo->editBanner($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=banners", 3);
	else
		$error=1;
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$banner=$chopo->getBannerId($id);
$regiones=$chopo->getRegiones();

//archivo VISTA
require_once('view/banners/editarBanner.php');
?>