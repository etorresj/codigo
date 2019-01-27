<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->editCentro($_POST);
	if($success)
		$chopo->redirect("?section=centroanalitico", 3);
	else
		$error=1;
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];

$centro=$chopo->getCentroId($id);

//archivo VISTA
require_once('view/centro/editarCentro.php');
?>