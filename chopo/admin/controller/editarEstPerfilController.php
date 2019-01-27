<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

$id=$_POST['id']?$_POST['id']:$_GET['id'];

if(isset($_POST['perfil_codigo'])) {
	$chopo->agregaPerfil($_POST);
}

$pefilD=$chopo->getServicioId($id);
$perfiles=$chopo->getPerfilEstudios($id);

$servicios=$chopo->getEstudiosDinamicos();

//$chopo->showArray($perfiles);

//archivo VISTA
require_once('view/perfiles/editarEstPerfil.php');
?>