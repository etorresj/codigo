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
	if(isset($_POST['propertyId'])) {
		
		$token=$uploader->getTokens($_POST['propertyId']);
		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
		$playlist=$api->get("/v2/playlists");
		$assets=$api->get("/v2/assets");
		$videos=$uploader->getVideosPerProperty($_POST['propertyId']);
	}
	
	else if($_POST) {
				
		$token=$uploader->getTokens($_POST['property']);
		$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);

		$titulo=$_POST['name'];
		$option = $_POST['option'];
		
		$parameters=array();
		$parameters['type']="movie";
		$parameters['name']=$titulo;
		$parameters['items']=$option;	


		$results = $api->post("/v2/playlists", $parameters);
		$uploader->redirect("?section=newPlaylist&success=".$titulo,0);
		
	}


require_once('view/upload/newPlaylistB.php');
?>