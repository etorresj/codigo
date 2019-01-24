<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");

if($_POST) {
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.F03qL", "V6KaPA6PWOVx4BmYsuXTc5uu8Mfhn2D0tFjxmUtB");
	$page=isset($_GET['page'])?$_GET['page']:0;
	 if($_POST['nexttoken']){
		//saving the prev page in a session
		$_SESSION['prevPage'][$page]=$_POST['nexttoken'];
		$beginmonth = $_POST['begin'];
		$currentdate = $_POST['expire'];
		$nexttoken=$_POST['nexttoken'];
		

		$parameters=array();
		$parameters['page_token']=$nexttoken;
		
		$assets=$api->get("/v2/analytics/reports/account/performance/videos/$beginmonth...$currentdate", $parameters);	

	
	}
	else if($_POST['prevPage']) {
		$beginmonth = $_POST['begin'];
		$currentdate = $_POST['expire'];
		$nexttoken=$_SESSION['prevPage'][$_POST['prevPage']];
		
		$parameters=array();
		$parameters['page_token']=$nexttoken;
		
		$assets=$api->get("/v2/analytics/reports/account/performance/videos/$beginmonth...$currentdate", $parameters);	
	
	}
	else{
		unset($_SESSION['prevPage']);
		$beginmonth = $_POST['begin'];
		$currentdate = $_POST['expire'];
	
		$parameters = array("where" => "name INCLUDES '$search'");	
		$assets=$api->get("/v2/analytics/reports/account/performance/videos/$beginmonth...$currentdate", $parameters);	
	}
	
	

	
}

require_once('view/admin/reports.php');
?>