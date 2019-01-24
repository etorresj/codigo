<?php

$sura = new admin();

$arreglo = $sura->getRevistaId($_GET['id']);
$encabezados = $sura->getSecciones($_GET['id']);
$mercados = $sura->getMercados($_GET['id']);
$mercados = $mercados[0];
$economicos = $sura->getEconomicos($_GET['id']);
$monitoreo = $sura->getMonitoreo(1);

if ($mercados)
{

    foreach ($mercados as $key => $value)
    {
        $mercados[$key] = round($value, 2);

        if ($mercados[$key] == 0)
        {
            $mercados[$key] = "";
        }
        else if ($mercados[$key] < 0)
        {
            $mercados[$key] = "<span style='color:#002e4f'>" . $mercados[$key] . "</span>";
        }

        else if ($mercados[$key] >= 1000)
        {
            $mercados[$key] = number_format($mercados[$key]);
        }
        else
        {
            $mercados[$key] = number_format($mercados[$key], 2, ".", ",");
        }

    }

}
$fecha = date("Y-m-d");
$fecha = $sura->invFecha($fecha);

$url = 'http://azulgris.com/sura-mercado/';

include ('view/correos/plantilla.php');
$plantilla = ob_get_clean();
$homepage = $plantilla;

echo $homepage;

?>
