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
	$page=isset($_GET['page'])?$_GET['page']:0;


	if($_POST['nexttoken']){
		//saving the prev page in a session
		$_SESSION['prevPage'][$page]=$_POST['nexttoken'];
		$nexttoken=$_POST['nexttoken'];
	}
	else if($_POST['prevPage']) {
		$nexttoken=$_SESSION['prevPage'][$_POST['prevPage']];
	}
	else{
		unset($_SESSION['prevPage']);
		$nexttoken=0;
	}

	

	if(($_POST['search'])) {
		$videos=$uploader->getOooyalaVideos($_POST['search'], $idProperty, $nexttoken);
		//$videos=$videos->items;
	} else { 
		//directo from ooyala
		$videos=$uploader->getOooyalaVideos("",$idProperty, $nexttoken);
		//$videos=$videos->items;
		
	}
	$token=explode("&",$videos->next_page);
	foreach($token as $value)
		if(preg_match("/page_token/", $value)) {
			$nexttoken=explode("page_token=", $value);
			$nexttoken=$nexttoken[1];
		}
		else
			$nexttoken=0;
$videos=$videos->items;	

require_once('view/upload/ooyalaVideos.php');
?>