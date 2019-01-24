<?php
if ($_SESSION['suraAdmin']) header("Location: ?section=imagenes");

//declaramos clase usuarios (tabla, campo ID, campo usuario, campo password, campo activo -si existe-, session)
$usr = new usuarios("usuariosAdmin", "id", "usuario", "password", "activo", 0, "suraAdmin");
$error = 0;

if ($_POST)
{
    if (strlen($_POST['user']) > 0 && strlen($_POST['password']) > 0)
    {
        $usr->usuario($_POST['user'], md5($_POST['password']));
        if ($usr->allow())
        {
            $sura = new admin();
            $_SESSION['suraMes'] = date("m");
            $_SESSION['suraAnio'] = date("Y");
            header("Location: ?section=imagenes");
        }
        else $error = 1;
    }
    else $error = 2;
}

require_once ('view/login/login.php');
?>
