<?php

if($_SESSION['chopoAdmin'])
header("Location: ?section=home");

//declaramos clase usuarios (tabla, campo ID, campo usuario, campo password, campo activo -si existe-, session)
$usr =  new usuarios("usuariosAdmin", "id", "usuario", "password", "activo", 0,"chopoAdmin");
$error=0;

if($_POST) {
if(strlen($_POST['user'])>0&&strlen($_POST['password'])>0){
		$usr->usuario($_POST['user'], md5($_POST['password']));
		if($usr->allow()) {
			$chopo=new admin();
			$chopo->guardaAcceso($_SESSION['chopoAdmin']);
			header("Location: ?section=home");
		}
		else
			$error=1;
	}
else
	$error=2;
}


//Archivo de la login
require_once('view/login/login.php');
?>