<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega folio nuevo
if(isset($_POST['folio'])) {
	$success=$chopo->addFolio($_POST);
	if($success)
		$chopo->redirect("?section=folios", 3);
	else
		$error=1;
}

//archivo VISTA
require_once('view/folios/agregarFolio.php');
?>