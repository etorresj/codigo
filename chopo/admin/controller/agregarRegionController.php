<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega region
if($_POST) {
	$success=$chopo->addRegion($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=region", 3);
	else
		$error=1;
}

$folios=$chopo->getFolios();
//archivo VISTA
require_once('view/region/agregarRegion.php');
?>