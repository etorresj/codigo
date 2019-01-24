<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

	$permiso=new permisos();
if(!$permiso->vPermiso("1", $_SESSION['ooyalaUser']['profile'])&&!$_SESSION['ooyalaUser']['admin']) {
		echo "You don't have privileges to access this section";
		$permiso->redirige("?section=home",3);
		exit();
	}
	$uploader=new upload();

	if($_POST) {

		$token=$uploader->getTokens($_POST['propertyId']);
		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
		$titulo=$_POST['name'];
		$parameterslabel=array();
		$parameterslabel['name']=$titulo;


		//print_r($parameters);
		$results = $api->post("/v2/labels", $parameterslabel);

	}
	$properties=$uploader->searchProperties($_SESSION['ooyalaUser']['fkgroup']);

	

require_once('view/upload/newLabel.php');
?>