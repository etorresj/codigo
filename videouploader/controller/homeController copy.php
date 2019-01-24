<?php
ini_set('max_execution_time', '9999'); 
if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

//profiles
if($_SESSION['ooyalaUser']['profile']=='3'&&$_SESSION['ooyalaUser']['admin']==0)
	header("Location: index.php?section=ooyalaVideos");
else if($_SESSION['ooyalaUser']['profile']!='1'&&$_SESSION['ooyalaUser']['admin']==0)
	header("Location: index.php?section=localVideos");



$uploader=new upload();

if($_POST){

	$idProperty=$_POST['propertyId'];	
	$propertycode=$uploader->propertycode($idProperty);
    
    
	
	$token=$uploader->getTokens($_POST['propertyId']);
	$api = new OoyalaApi($token[0]['apikey'], $token[0]['apisecret']);
	$players=$api->get("players");
	$success=1;

	if($embed_code=$uploader->directuploadOoyala())
		$success=1;
		$title=$_POST['titlename'];
		$description=$_POST['description'];		
		
}
	
	$properties=$uploader->searchProperties($_SESSION['ooyalaUser']['fkgroup']);


	

require_once('view/upload/home.php');
?>