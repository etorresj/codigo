<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega region
if($_POST) {
	$success=$chopo->addNoticia($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=noticias", 3);
	else
		$error=1;
}

//archivo VISTA
require_once('view/noticias/agregarNoticia.php');
?>