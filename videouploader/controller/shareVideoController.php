<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

$permiso=new permisos();
if(!$permiso->vPermiso("1,3", $_SESSION['ooyalaUser']['profile'])&&!$_SESSION['ooyalaUser']['admin']) {
		echo "You don't have privileges to access this section";
		$permiso->redirige("?section=home",3);
		exit();
	}

	$uploader=new upload();
	$admin=new admin();
	if($_POST) {
		
		$arreglo=$_POST;
		$arreglo['idUser']=$_SESSION['ooyalaUser']['idlogin'];
		$arreglo['idProperty']=$_SESSION['ooyalaUser']['property'];
		$arreglo['title']=addslashes($arreglo['title']);
		
		$success=$uploader->share($arreglo);
	}

	if(isset($_GET['idVideo'])) {
		$properties=$admin->getProperties();
		$sharedProperties=$uploader->getShared($_GET['idVideo']);
	}
	
	else {
		$uploader->redirect("?section=home",0);
	
	}
	

require_once('view/upload/shareVideo.php');
?>