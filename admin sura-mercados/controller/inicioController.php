<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();

if ($_POST)
{
    $success = $sura->editHome($_POST);
    if ($success) $sura->redirect("?section=home", 3);
    else $error = 1;
}
$id = 1;
$arreglo = $sura->getHome($id);

require_once ('view/inicio/inicio.php');
?>
