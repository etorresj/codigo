<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();

if (isset($_GET['visible']) && isset($_GET['idContenido']))
{
    $sura->visibleContenido($_GET);
}

$id = $_GET['id'];

$enviados = $sura->getEnviados($id) [0]['cuantos'];
$abiertos = $sura->getAbiertos($id) [0]['cuantos'];
$unicos = $sura->getUnicos($id) [0]['cuantos'];
$noAbiertos = $enviados - $unicos;
$rebotados = $sura->getRebote($id);
$porcentajeAbiertos = round((100 / $enviados) * $unicos);
$porcentajeNo = 100 - $porcentajeAbiertos;
$titulo = "SURA - Estadísticas";
$tituloB = $id == 1 ? "Boletín" : "Highlight";
require_once ('view/estadisticas/estadisticas.php');
?>
