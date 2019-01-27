<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaNewsLetter($id);
$chopo->redirect("?section=newsLetter", 0);

?>