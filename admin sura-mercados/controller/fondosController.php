<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();
if (isset($_GET['visible']) && isset($_GET['id']))
{
    $sura->visibleImagen($_GET);
}
$tipo = $_GET['tipo'];
$search = $tipo;

$_SESSION['padre'] = isset($_GET['padre']) ? $_GET['padre'] : $_SESSION['padre'];
//paginador
$registros = 20;
$total = sizeof($sura->getImagenes("", $search));
$paginas = ceil($total / $registros);
$pag = 0;
if (isset($_GET['pag'])) $pag = $_GET['pag'];
$pagLimite = $registros * $pag;
$limite = " limit " . $pagLimite . ", " . $registros;
//termina paginador

$arreglo = $sura->getImagenes($limite, $search);
$titulo = $sura->getRevistaId($tipo);

$fondo = "Imagenes " . $titulo[0]['titulo'];
require_once ('view/imagenes/fondos.php');
?>
