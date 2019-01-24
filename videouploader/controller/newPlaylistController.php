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
	$properties=$uploader->searchProperties($_SESSION['ooyalaUser']['fkgroup']);

require_once('view/upload/newPlaylist.php');
?>