<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaServicio($id);
$chopo->redirect("?section=servicios", 0);

?>