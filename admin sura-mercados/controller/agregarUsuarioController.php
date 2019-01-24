<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();
if ($_POST)
{
    $success = $sura->addUsuario($_POST);
    if ($success) $sura->redirect("?section=usuarios", 3);
    else
    {
        $error = 1;
    }
}
require_once ('view/usuarios/agregarUsuario.php');
?>
