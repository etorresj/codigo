<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

//si se agrega localidad
if($_POST) {
	$success=$chopo->addDepartamento($_POST);
	if($success)
		$chopo->redirect("?section=departamento", 3);
	else
		$error=1;
}

$especialidades=$chopo->getEspecialidades();
//archivo VISTA
require_once('view/departamento/agregarDepartamento.php');
?>