<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();
$arreglo = $sura->getRevistaId($_GET['id']);
if ($_POST) {
    extract($_POST);

    //armando correo
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
    $asunto = $_POST['asunto'];

    require 'model/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'server3.netmarketingweb3.net';
    $mail->SMTPAuth = true;
    //$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
    $mail->Port = 25;
    $mail->Username = 'economico@suramexico.co';
    $mail->Password = 'tWblD3pcHp';
    $mail->Sender = 'bounce@azulgris.com';

    $url = 'http://azulgris.net/sura-mercado1/';

    if ($correos)
    { //personalizando
        ob_start();
        include ('view/correos/plantillaEnviar.php');
        $plantilla = ob_get_clean();
        $mensaje = $plantilla;
        //$mensaje=utf8_encode($mensaje);
        $mensaje = $sura->accentEncode($mensaje);
        $asunto = utf8_decode($asunto);

        $mail->setFrom($remite);
        $mail->addReplyTo($remite);
        $mail->Subject = $asunto;
        $mail->msgHTML($mensaje);
        $correoEnvia = explode(",", $correos);
        foreach ($correoEnvia as $correoDir)
        {
            $mail->addAddress($correoDir);
            $mail->send();
            $mail->ClearAllRecipients();
        }
        $sura->guardaLog($correoEnvia, $estado);
        $sura->guardaEnvio($_GET['id'], $correoEnvia);
    }

    if ($toda)
    {

        $listaCorreos = $sura->getUsuarios();
        foreach ($listaCorreos as $elCorreo)
        {
            ob_start();
            $correoEnvia = $elCorreo['email'];
            //	echo $correoEnvia;
            include ('view/correos/plantillaEnviar.php');
            $plantilla = ob_get_clean();
            $mensaje = $plantilla;

            $mensaje = $sura->accentEncode($mensaje);
            $asunto = utf8_decode($asunto);

            $mail->setFrom($remite);
            $mail->addReplyTo($remite);
            $mail->Subject = $asunto;
            $mail->msgHTML($mensaje);
            $mail->addAddress($correoEnvia);
            $mail->send();
            $mail->ClearAllRecipients();
            $sura->guardaLog($correoEnvia, $estado);
            $sura->guardaEnvioBD($_GET['id'], $correoEnvia);
        }
    }
    $success = 1;

}
require_once ('view/correos/enviarCorreo.php');
?>
