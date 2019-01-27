<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->editEspecialidad($_POST);
	if($success)
		$chopo->redirect("?section=especialidades", 3);
	else
		$error=1;
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$sucursales=$chopo->getSucursalesEsp();
$especialidad=$chopo->getEspecialidadId($id);

//archivo VISTA
require_once('view/especialidades/editarEspecialidad.php');
?>