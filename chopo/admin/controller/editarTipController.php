<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->editTip($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=tips", 3);
	else
		$error=1;
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$tip=$chopo->getTipId($id);
$regiones=$chopo->getRegiones();


//archivo VISTA
require_once('view/tips/editarTip.php');
?>