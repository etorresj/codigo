<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$folio=$chopo->getFolioId($id);
//si se edita un folio
if(isset($_POST['folio'])) {
	if($_POST['folio']!=$folio[0]['folio']) {
		$success=$chopo->editFolio($_POST);
		if($success) {
			$chopo->redirect("?section=folios", 3);
			$folio=$chopo->getFolioId($id);
		}
		else
			$error=1;
	}
	else {  
		$success=1;
		$chopo->redirect("?section=folios", 3);
	}
}



//archivo VISTA
require_once('view/folios/editarFolio.php');
?>