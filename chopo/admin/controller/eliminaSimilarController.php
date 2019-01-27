<?php
if(!$_SESSION['chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

extract($_GET);

$chopo->eliminaSimilar($id);
$chopo->redirect("?section=similares&id=".$promocion, 0);

?>