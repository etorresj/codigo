<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaNoticia($id);
$chopo->redirect("?section=noticias", 0);

?>