<?php

if($_SESSION['ooyalaAdmin'])
header("Location: admin.php?section=admin");

$usr =  new tusers("tusers", "idlogin", "userL", "passL", "actL", 1, "ooyalaAdmin");
$error=0;

if($_POST) {
if(strlen($_POST['user'])>0&&strlen($_POST['password'])>0){
		$usr->usuario($_POST['user'], md5($_POST['password']));
		if($usr->allow()) {
			$user=new users();
			$dataUser=$user->getUser($_SESSION['ooyalaAdmin']);
			$_SESSION['ooyalaUser']=$dataUser[0];
			$_SESSION['ooyala']=$_SESSION['ooyalaAdmin'];
			header("Location: admin.php?section=admin");
			
		}
		else
			$error=1;
	}
else
	$error=2;
}


require_once('view/admin/login.php');
?>