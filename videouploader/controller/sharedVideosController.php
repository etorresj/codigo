<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

$permiso=new permisos();
if(!$permiso->vPermiso("1,3", $_SESSION['ooyalaUser']['profile'])&&!$_SESSION['ooyalaUser']['admin']) {
		echo "You don't have privileges to access this section";
		$permiso->redirige("?section=home",3);
		exit();
	}

	//print_r($_POST);
	$uploader=new upload();
	$properties=$uploader->searchProperties($_SESSION['ooyalaUser']['fkgroup']);
	$idProperty=(isset($_POST['propertyId']))?$_POST['propertyId']:$properties[0]['idProperty'];


	

	$videos=$uploader->getSharedVideos($_SESSION['ooyalaUser']['fkgroup']);

	

	
	
require_once('view/upload/sharedVideos.php');
?>