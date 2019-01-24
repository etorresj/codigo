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
	
	$idProperty=$_GET['propertyId'];
	$propertycode=$uploader->propertycode($idProperty);	
	$players=$uploader->getTokenPlayers($idProperty);

		
	

require_once('view/upload/embedCode.php');
?>