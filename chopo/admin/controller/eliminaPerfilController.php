<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaPerfil($id);
$chopo->redirect("?section=editarEstPerfil&id=".$idPerfil, 0);

?>