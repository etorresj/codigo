<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega folio nuevo
if(isset($_POST['tag'])) {
	$success=$chopo->addTag($_POST);
	if($success)
		$chopo->redirect("?section=tags", 3);
	else
		$error=1;
}

//archivo VISTA
require_once('view/tags/agregarTag.php');
?>