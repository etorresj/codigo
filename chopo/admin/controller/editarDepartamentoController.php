<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->editDepartamento($_POST);
	if($success)
		$chopo->redirect("?section=departamento", 3);
	else
		$error=1;
}
$id=$_POST['id']?$_POST['id']:$_GET['id'];
$especialidades=$chopo->getEspecialidadesDep();
$departamento=$chopo->getDepartamentoId($id);

//archivo VISTA
require_once('view/departamento/editarDepartamento.php');
?>