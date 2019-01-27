<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$folio=$chopo->getTagId($id);
//si se edita un folio
if(isset($_POST['tag'])) {
	if($_POST['tag']!=$folio[0]['tag']) {
		$success=$chopo->editTag($_POST);
		if($success) {
			$chopo->redirect("?section=tags", 3);
			$folio=$chopo->getTagId($id);
		}
		else
			$error=1;
	}
	else {  
		$success=1;
		$chopo->redirect("?section=tags", 3);
	}
}



//archivo VISTA
require_once('view/tags/editarTag.php');
?>