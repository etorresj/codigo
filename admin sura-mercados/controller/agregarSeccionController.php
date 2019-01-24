<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();

//si se agrega localidad
if ($_POST)
{
    $success = $sura->addSeccion($_POST, $_FILES);
    if ($success)
    {

        if ($_POST['ms'] == 1) echo '<script type="text/javascript">window.location = "index.php?section=editarRevista&id=1#abajo"</script>';
        else echo '<script type="text/javascript">window.location = "index.php?section=editarRevista&id=' . $_POST['idRevista'] . '#abajo"</script>';

    }
    else $error = 0;
}

$idRevista = $_POST['idRevista'] ? $_POST['idRevista'] : $_GET['idRevista'];
$revista = $sura->getRevistaId($idRevista);
$titulo = $sura->getTituloSeccion($idRevista);
$seccionRegresar = "editarRevista";
$muestraSubtemas = $_GET['ms'];

require_once ('view/revista/agregarSeccion.php');
?>
