<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");
$sura = new admin();

//si se agrega region
if ($_POST)
{
    $success = $sura->addImagen($_POST, $_FILES);
    if ($success) {
			$sura->redirect("?section=fondos&tipo=" . $_POST['navega'], 3);
		}
    else $error = 1;
}

$id = $_GET['tipo'];
require_once ('view/imagenes/agregarImagen.php');
?>
