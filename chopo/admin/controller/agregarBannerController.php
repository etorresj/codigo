<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega region
if($_POST) {
	$success=$chopo->addBanner($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=banners", 3);
	else
		$error=1;
}

$regiones=$chopo->getRegiones();

//archivo VISTA
require_once('view/banners/agregarBanner.php');
?>