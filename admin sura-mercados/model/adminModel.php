<?php
class admin extends conexion
{
    public function redirect($url, $time, $no_session_par = null)
    {
        $url = urlencode($url);

        $url = str_replace('%3F', '?', $url);
        $url = str_replace('%3D', '=', $url);
        $url = str_replace('%26', '&', $url);
        $time = $time * 1000;
        echo '<script>setTimeout(function() {window.location="' . $url . '";}, ' . $time . ');</script>';

    }
    public function showArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    public function invFecha($fecha)
    {
        $fecha2 = explode("-", $fecha);
        $fechaArray = array(
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        );
        return ($fecha2[2] . " de " . $fechaArray[$fecha2[1] - 1] . " de " . $fecha2[0]);
    }
    public function obtenUsuarios($id)
    {
        return $this->queryResultados("select * from usuariosAdmin where id='$id'");
    }
    //////////////
    ///IMAGENES////
    /////////////
    public function getImagenes($limite, $tipo)
    {
        return $this->queryResultados("select * from banners where tipo ='$tipo' order by orden ASC");
    }
    public function eliminaImagen($id)
    {
        $resultado = $this->queryResultados("select tipo from banners where id='$id'");
        $this->querySimple("delete from banners where id='$id'");
        return $resultado[0]['tipo'];
    }
    public function addImagen($arreglo, $archivo)
    {
        extract($archivo);
        if ($imagen['size'] > 0)
        { //si hay foto
            $ext = explode(".", $imagen['name']);
            $ext = end($ext);
            if ($ext == "jpg")
            { //extensiones validas
                $nombreFoto = date("U") . rand(0, 100) . "." . $ext;
                list($ancho_orig, $alto_orig) = getimagesize($imagen['tmp_name']);
                $ratio_orig = $ancho_orig / $alto_orig;
                $ancho = 600;
                $alto = 600 / $ratio_orig;
                $image_p = imagecreatetruecolor(600, $alto);
                $image = imagecreatefromjpeg($imagen['tmp_name']);
                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $ancho, $alto, $ancho_orig, $alto_orig);
                imagejpeg($image_p, "../images/secciones/" . $nombreFoto, 100);
                
            }
            else return 0;
        }
        //agregando datos a BD
        extract($arreglo);
        $arreglo['titulo'] = $this->accentEncode($arreglo['titulo']);
        $arreglo['fuente'] = $this->accentEncode($arreglo['fuente']);

        $this->reordena("banners", $tipo);

        $query = "insert into banners (img, url, visible, ventana, tipo, titulo, fuente)
	 						values ('$nombreFoto', '$url','$visible', '$ventana', '$tipo', '$titulo', '$fuente')";
        $idBanner = $this->queryInsert($query);

        return 1;

    }

    public function updateCabecera($archivo)
    {

        extract($archivo);
        if ($imagen['size'] > 0)
        { //si hay foto
            $ext = explode(".", $imagen['name']);
            $ext = end($ext);
            if ($ext == "jpg" || $ext == "gif" || $ext == "png")
            { //extensiones validas
                $nombreFoto = date("U") . rand(0, 100) . "." . $ext;
                move_uploaded_file($imagen['tmp_name'], "images/" . $nombreFoto);
            }
            else return 0;
            //buscando archivo original para borrarlo
            $cabeza = $this->getCabeza(1);
            @unlink("images/" . $cabeza[0]['img']);

            $query = "update  cabecera set img='$nombreFoto' where id='1'";
            $this->querySimple($query);

            return 1;

        }

    }

    public function getCabeza($id)
    {
        return $this->queryResultados("select * from cabecera where id='$id'");
    }

    public function visibleImagen($arreglo)
    {
        extract($arreglo);
        if ($id)
        {
            $visible = $visible == 1 ? 0 : 1;
            $this->querySimple("update banners set visible='$visible' where id='$id'");
            return 1;
        }
        else return 0;
    }
    public function getImagenId($id)
    {
        return $this->queryResultados("select * from banners where id='$id'");
    }  
    public function reordena($tabla, $tipo = 0)
    {
        $auxTipo = "";
        if ($tipo) $auxTipo = " where tipo='$tipo'";
        //reordenando
        $query = "select id from " . $tabla . $auxTipo . " order by orden";
        $resultado = $this->queryResultados($query);
        $ord = 1;
        foreach ($resultado as $value)
        {
            $this->querySimple("update " . $tabla . " set orden='$ord' where id='" . $value['id'] . "'");
            $ord++;
        } //reordenando
        
    }
    public function ordena($arreglo, $tabla)
    {
        extract($arreglo);
        $qTipo = "";
        if ($tipo) $qTipo = " and tipo='$tipo'";
        //obteniendo el orden
        $query = "select * from " . $tabla . " where id ='$id'";
        $resultado = $this->queryResultados($query);
        $ordenA = $resultado[0]['orden'];
        //buscando el orden y la id del producto anterior/posterior
        if ($order == 0) $query = "select min(orden) as ordenB from " . $tabla . " where  orden>'$ordenA'" . $qTipo;
        else $query = "select max(orden) as ordenB from " . $tabla . " where  orden<'$ordenA'" . $qTipo;
        $resultado = $this->queryResultados($query);
        $ordenB = ($resultado[0]['ordenB']);
        //buscando segunda ID
        $query = "select * from " . $tabla . " where orden='$ordenB'" . $qTipo;
        $resultado = $this->queryResultados($query);
        $idB = $resultado[0]['id'];

        //cambiando orden
        $query = "update " . $tabla . " set orden='$ordenB' where id='$id'";
        $this->querySimple($query);
        $query = "update " . $tabla . " set orden='$ordenA' where id='$idB'";
        $this->querySimple($query);

        return 1;

    }

    public function actualizaPassword($id, $password)
    {
        $password = md5($password);
        $q = "update usuariosAdmin set password='$password' where id='$id'";
        $this->querySimple($q);
    }

    public function getImagenesFront()
    {
        return $this->queryResultados("select * from banners where visible='1' order by orden ASC");
    }

    ////////////////
    ///Contenito///
    //////////////
    public function getContenidoTipo($tipo)
    {
        $q = " select * from contenido where idPadre='$tipo' and visible='1' ORDER BY orden  ";
        return ($this->queryResultados($q));
    }
    public function getContenidoTipoB($mes, $anio)
    {
        $tipo = $this->getTitularMes($mes, $anio);
        $q = " select * from contenido where idPadre='$tipo' and visible='1' ORDER BY orden  ";
        return ($this->queryResultados($q));
    }

    public function getContenidoId($mes, $anio, $id)
    {
        //para no modificar bd, el campo dia=anio y mes=mesNum
        $q = " select * from contenido where tipo='$id' and dia='$anio' and mesNum='$mes'";
        return ($this->queryResultados($q));
    }
    public function getContenidoMes($tipo, $mes)
    {

        $q = " select * from contenido where tipo='$tipo' and mesNum='$mes' ORDER BY dia DESC ";

        $r = $this->queryResultados($q);
        $i = 0;
        for ($i = 0;$i < sizeof($r);$i++)
        {
            $r[$i]['secciones'] = $this->getSecciones($r[$i]['id']);

        }
        return $r;
    }
    public function getContenido($limite = "", $param = "", $tipo = 0)
    {
        if ($tipo) $aux = " and tipo='$tipo' ";
        if ($param) $aux .= "and (titulo like '%$param%'
						or mes like '%$param%'
						or dia like '%$param%'
	 					)
						";
        $q = " select * from contenido where 1 " . $aux . " ORDER BY mesNum ASC, dia DESC " . $limite;

        return ($this->queryResultados($q));
    }

    public function getUsuarios($limite = "", $param = "")
    {
        $aux = "";
        if ($param) $aux .= "and (nombre like '%$param%'
						or email like '%$param%'

	 					)
						";
        $q = " select * from usuarios where 1 " . $aux . " ORDER BY nombre ASC " . $limite;

        return ($this->queryResultados($q));
    }

    public function getTituloSeccion($tipo)
    {

        $tituloSeccion = $this->getRevistaId($tipo);
        $tituloSeccion = $tituloSeccion[0];

        switch ($tipo)
        {
            case 1:
                $titulo = "SURA México - Highlights";
            break;
            case 2:
                $titulo = "Entorno Financiero";
            break;
            case 3:
                $titulo = "Afore y Pensiones";
            break;
            case 4:
                $titulo = "Bancos e Inversiones";
            break;
            case 5:
                $titulo = "Seguros de Vida";
            break;

            default:
                $titulo = $tituloSeccion['titulo'];
            break;
        }
        return $titulo;

    }
    public function eliminaRevista($id)
    {
        $this->querySimple("delete from contenido where id='$id'");
        return 1;
    }
    public function eliminaUsuario($id)
    {
        $this->querySimple("delete from usuarios where id='$id'");
        return 1;
    }
    public function getMeses()
    {
        return $this->queryResultados("select * from meses");
    }
    public function addRevista($arreglo)
    {
        extract($arreglo);
        $diaExtract = explode("|", $mes);
        $mesNum = $diaExtract[0];
        $mes = $diaExtract[1];
        $q = "select * from contenido where tipo='$tipo' and mes='$mes' and dia='$dia'";
        $r = $this->queryResultados($q);

        if (!$r)
        {
            $q = "insert into contenido (dia, mes, mesNum, tipo) values ('$dia', '$mes', '$mesNum', '$tipo')";
            return $this->queryInsert($q);
        }
        return 0;
    }
    public function addUsuario($arreglo)
    {
        extract($arreglo);
        $q = "select * from usuarios where email='$email' ";
        $r = $this->queryResultados($q);

        if (!$r)
        {
            $q = "insert into usuarios (nombre, email) values ('$nombre', '$email')";
            return $this->queryInsert($q);
        }
        return 0;
    }
    public function getRevistaId($id)
    {
        $q = "select * from contenido where id='$id'";
        return ($this->queryResultados($q));
    }
    public function getUsuarioId($id)
    {
        $q = "select * from usuarios where id='$id'";
        return ($this->queryResultados($q));
    }
    public function getSecciones($id)
    {
        $q = "select * from contenido where idPadre='$id' order by orden ASC";
        return ($this->queryResultados($q));
    }
    public function reordenaContenido($id_padre)
    {
        //reordenando
        $query = "select id from contenido where idPadre='$id_padre' order by orden";
        $resultado = $this->queryResultados($query);
        $ord = 1;
        foreach ($resultado as $value)
        {
            $this->querySimple("update contenido set orden='$ord' where id='" . $value['id'] . "'");
            $ord++;
        } //reordenando
        
    }
    public function getRegresar($id)
    {
        $q = "select idPadre from contenido where id='$id'";
        $r = $this->queryResultados($q);
        return $r[0]['idPadre'];
    }
    public function editSeccionP($arreglo, $archivo)
    {
        $arreglo['titulo'] = $this->accentEncode($arreglo['titulo']);
        $arreglo['descripcion'] = $this->accentEncode($arreglo['descripcion']);
        $arreglo['medio'] = $this->accentEncode($arreglo['medio']);

        $arreglo['descripcion'] = addslashes($arreglo['descripcion']);
        //$arreglo['descripcion']=nl2br($arreglo['descripcion']);
        extract($archivo);
        if ($imagen['size'] > 0)
        { //si hay foto
            $ext = explode(".", $imagen['name']);
            $ext = end($ext);
            if ($ext == "jpg" || $ext == "gif" || $ext == "png" || $ext == "zip" || $ext == "pdf" || $ext == "xls")
            { //extensiones validas
                $nombreFoto = date("U") . rand(0, 100) . "." . $ext;
                move_uploaded_file($imagen['tmp_name'], "../images/secciones/" . $nombreFoto);
                $aux = ", imagen='$nombreFoto'";
            }
            else return 0;
        }
        if ($pdf['size'] > 0)
        { //si hay foto
            $ext = explode(".", $pdf['name']);
            $ext = end($ext);
            if ($ext == "pdf" || $ext == "xls" || $ext == "zip")
            { //extensiones validas
                $nombrePdf = date("U") . rand(0, 100) . "." . $ext;
                move_uploaded_file($pdf['tmp_name'], "../images/secciones/" . $nombrePdf);
                $aux = ", pdf='$nombrePdf'";
            }
            else return 0;
        }
        //agregando datos a BD
        extract($arreglo);
        $fecha = explode("|", $mes);
        $mesNum = $fecha[0];
        $mes = $fecha[1];
        $padre = $padre == 1 ? 1 : 0;
        $query = "update contenido set titulo='$titulo', descripcion='$descripcion', medio='$medio', url='$url' " . $aux . " where id='$id'";
        $this->querySimple($query);
        return 1;
    }
    public function obtenMeses()
    {
        $q = "select distinct mes, mesNum from contenido order by mesNum";
        return $this->queryResultados($q);
    }

    public function editAlerta($arreglo, $archivo)
    {
        extract($archivo);
        if ($imagen['size'] > 0)
        { //si hay foto
            $ext = explode(".", $imagen['name']);
            $ext = end($ext);
            if ($ext == "gif")
            { //extensiones validas
                extract($arreglo);
                if ($tipo == 1) $nombreFoto = "img_nuevos_inv.gif";
                else if ($tipo == 2) $nombreFoto = "img_nuevos_afore.gif";
                else if ($tipo == 3) $nombreFoto = "img_nuevos_seguros.gif";
                else if ($tipo == 4) $nombreFoto = "img_nuevos_pensiones.gif";

                move_uploaded_file($imagen['tmp_name'], "../images/" . $nombreFoto);
            }
            else return 0;

        }
        else return 0;

        return 1;
    }

    public function editAviso($arreglo, $archivo)
    {
        extract($archivo);
        if ($imagen['size'] > 0)
        { //si hay foto
            $ext = explode(".", $imagen['name']);
            $ext = end($ext);
            if ($ext == "gif" || $ext == "jpg")
            { //extensiones validas
                extract($arreglo);

                $nombreFoto = date("U") . rand(0, 100) . "." . $ext;

                if ($tipo == 1) $q = "update avisos set videos='$nombreFoto' where id='1'";
                else if ($tipo == 2) $q = "update avisos set concursos='$nombreFoto' where id='1'";
                else if ($tipo == 3) $q = "update avisos set avisos='$nombreFoto' where id='1'";

                move_uploaded_file($imagen['tmp_name'], "../images/avisos/" . $nombreFoto);
                $this->querySimple($q);
            }
            else return 0;

        }
        else return 0;

        return 1;
    }
    public function getAvisos($id = 1)
    {
        return $this->queryResultados("select * from avisos where id='$id'");
    }
    public function visibleContenido($arreglo)
    {
        extract($arreglo);
        if ($id)
        {
            $visible = $visible == 1 ? 0 : 1;
            $this->querySimple("update contenido set visible='$visible' where id='$idContenido'");
            return 1;
        }
        else return 0;
    }
    public function getMonitoreo($id)
    {
        return $this->queryResultados("select * from monitoreo where id='$id'");
    }
    public function editLigas($arreglo)
    {
        extract($arreglo);
        $q = "update monitoreo set liga1='$liga1', liga2='$liga2', liga3='$liga3', liga4='$liga4', liga5='$liga5', liga6='$liga6', liga7='$liga7' where id='$id'";
        $this->querySimple($q);
        return 1;
    }
    public function enviarCorreo($mensaje, $correo, $asunto, $remite, $bcc = "")
    {
        if (!$mensaje || !$correo) return 0;

        $headers = "From: " . strip_tags($remite) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        if ($bcc) $headers .= "bcc:" . strip_tags($bcc);

        if (mail($correo, $asunto, ($mensaje) , $headers)) return 1;
        else return 0;
    }

    public function editUsuario($arreglo)
    {
        extract($arreglo);

        $query = "update usuarios set nombre='$nombre', email='$email' where id='$id'";
        $this->querySimple($query);
        return 1;
    }

    public function importaBD($archivo, $campos_obligatorios)
    {
        $archive = new PclZip($archivo['tmp_name']);
        if ($archive->extract(PCLZIP_OPT_PATH, 'temp', PCLZIP_OPT_REMOVE_PATH, 'temp') == 0)
        {
            return 0;
        }
        $file_info = $archive->listContent();
        $prod = "temp/" . $file_info[0]['stored_filename'];
        $data = new Spreadsheet_Excel_Reader();
        $encabezados = array();
        $correctos = true;
        $log_errores = array();
        $max_cols = 2;
        // Set output Encoding.
        $data->setOutputEncoding('CP1251');
        $data->read($prod);

        for ($j = 1;$j <= $max_cols;$j++)
        {
            $valor = $data->sheets[0]['cells'][1][$j];
            $encabezados[] = trim($valor);
            //	print("<br>" . $valor );
            
        }
        foreach ($campos_obligatorios as $valor)
        {
            if (!in_array($valor, $encabezados))
            {

                $correctos = false;
                $log_errores[] = "El documento no contiene el campo obligatorio: " . $valor . "<br>";

            }
        }
        if ($correctos)
        {

            $this->querySimple("TRUNCATE TABLE usuarios");
            $z = 1;
            for ($i = 2;$i <= $data->sheets[0]['numRows'];$i++)
            {

                $valores = array();

                for ($j = 1;$j <= $max_cols;$j++)
                {
                    $valor = $data->sheets[0]['cells'][$i][$j];
                    $valores[] = (string)$valor;
                }
                $registros = array();
                $registros[] = $valores;

                foreach ($registros as $value)
                {
                    $insert = $z . ",";
                    for ($k = 0;$k < sizeof($value);$k++)
                    {
                        $valAux = addslashes($value[$k]);

                        if ($k == (sizeof($value)) - 1) $insert .= "'$valAux'";
                        else $insert .= "'$valAux',";
                    }
                    $q = "insert into usuarios values ($insert)";
                    $this->queryInsert($q);

                }
                flush($registros);
                $z++;
            }
            return 1;
        }
        else return $log_errores;

    }
    public function guardaLog($correo, $estado)
    {
        //print_r($estado);
        $fecha = date('Y-m-d');
        $this->queryInsert("insert into log (correo, status, fecha) values ('$correo', '$estado', '$fecha')");
    }
    public function getTitularMes($mes, $anio, $tipo = 3)
    {
        //para no modificar bd, el campo dia=anio y mes=mesNum
        $aux = "";
        if ($tipo) $aux = " and tipo='$tipo'";
        $q = "select * from contenido where dia='$anio' and mesNum='$mes'" . $aux;
        $titular = $this->queryResultados($q);
        if ($titular) return $titular[0]['id'];
        else
        {
            $q = "insert into contenido (dia, mesNum, tipo) values ('$anio', '$mes', '$tipo')";
            return $this->queryInsert($q);
        }

    }

    public function editarManana($arreglo)
    {
        extract($arreglo);
        $resultado = $this->queryResultados("select * from mercados where id_boletin='$id'");
        if ($resultado)
        {
            $q = "update mercados set gdpyoy_1='$gdpyoy_1',
		 												gdpyoy_2='$gdpyoy_2',
														gdpyoy_3='$gdpyoy_3',
														gdpyoy_4='$gdpyoy_4',
														pmi_1='$pmi_1',
														pmi_2='$pmi_2',
														pmi_3='$pmi_3',
														pmi_4='$pmi_4',
														confianza_1='$confianza_1',
														confianza_2='$confianza_2',
														confianza_3='$confianza_3',
														confianza_4='$confianza_4',
														gdp_1='$gdp_1',
														gdp_2='$gdp_2',
														gdp_3='$gdp_3',
														gdp_4='$gdp_4' where id_boletin='$id'
				";
        }
        else
        {
            $q = "insert into mercados (id_boletin,
															gdpyoy_1,
															gdpyoy_2,
															gdpyoy_3,
															gdpyoy_4,
															pmi_1,
															pmi_2,
															pmi_3,
															pmi_4,
															confianza_1,
															confianza_2,
															confianza_3,
															confianza_4,
															gdp_1,
															gdp_2,
															gdp_3,
															gdp_4
															)
															values
															('$id',
															'$gdpyoy_1',
															'$gdpyoy_2',
															'$gdpyoy_3',
															'$gdpyoy_4',
															'$pmi_1',
															'$pmi_2',
															'$pmi_3',
															'$pmi_4',
															'$confianza_1',
															'$confianza_2',
															'$confianza_3',
															'$confianza_4',
															'$gdp_1',
															'$gdp_2',
															'$gdp_3',
															'$gdp_4'
															)";
        }
        $this->querySimple($q);
        return 1;
    }

    public function getMercados($id)
    {
        $q = "select * from mercados where id_boletin='$id'";
        return $this->queryResultados($q);
    }

    public function getEconomicos($id)
    {
        $q = "select * from economicos where id_boletin='$id'";
        return $this->queryResultados($q);
    }
    public function ultimoBol()
    {
        $q = "select id from contenido where idPadre='1' and visible='1' order by id DESC limit 0,1";
        $r = $this->queryResultados($q);
        return $r[0]['id'];
    }
    public function getUltimos()
    {
        $q = "select id, medio from contenido where idPadre='1' and visible='1' order by id DESC limit 0,5";
        $r = $this->queryResultados($q);
        return $r;
    }
    //Estadisticas mail
    public function guardaStats($fecha, $ip, $id)
    {
        $q = "insert into stats (ip, fecha, id_boletin) values ('$ip', '$fecha', '$id')";
        $this->queryInsert($q);
    }
    public function guardaEnvio($id, $correos)
    {
        $fecha = date('Y-m-d', $_SERVER['REQUEST_TIME']);
        foreach ($correos as $mail)
        {
            $q = "insert into envios_stats (id_boletin, fecha, email)
					values ('$id', '$fecha', '$mail')";
            $this->queryInsert($q);
        }
    }
    public function guardaEnvioBD($id, $correo)
    {
        $fecha = date('Y-m-d', $_SERVER['REQUEST_TIME']);
        $q = "insert into envios_stats (id_boletin, fecha, email)
			values ('$id', '$fecha', '$correo')";
        $this->queryInsert($q);
    }

    public function rebote($mensaje)
    {
        $this->queryInsert("insert into bounce (mensaje) values ('$mensaje')");
    }

    public function getEnviados($id)
    {
        $q = "select COUNT(id_boletin) as cuantos from envios_stats where id_boletin = '$id'";
        return $this->queryResultados($q);
    }
    public function getAbiertos($id)
    {
        $q = "select COUNT(id_boletin) as cuantos from stats where id_boletin = '$id'";
        return $this->queryResultados($q);
    }
    public function getUnicos($id)
    {
        $q = "select COUNT(DISTINCT ip) as cuantos from stats where id_boletin = '$id'";
        return $this->queryResultados($q);
    }

    public function getRebote($id)
    {
        $q = "select * from bounce";
        return $this->queryResultados($q);
    }

}
?>
