<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();

$success = $sura->reordena("contenido");

?>
