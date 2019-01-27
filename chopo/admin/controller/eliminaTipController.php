<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaTip($id);
$chopo->redirect("?section=tips", 0);

?>