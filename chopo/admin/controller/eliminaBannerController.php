<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaBanner($id);
$chopo->redirect("?section=banners", 0);

?>