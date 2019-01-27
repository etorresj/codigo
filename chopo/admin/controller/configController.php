<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST){
	extract($_POST);
	if($password) {
		if($password==$passwordB)
			$chopo->actualizaPassword($_SESSION['chopoAdmin'], $password);
		else
			$error=1;
	}
	$chopo->actualizaConfig($_POST);
	if(!$error)
		$success=1;
}
$config=$chopo->getConfig();
//$chopo->showArray($config);
//archivo VISTA
require_once('view/config/config.php');
?>