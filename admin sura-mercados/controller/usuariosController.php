<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");

$sura = new admin();
if (($_FILES))
{
    $campos = array(
        'nombre',
        'email'
    );
    $resultado = $sura->importaBD($_FILES['archivo'], $campos);
    $mensaje = "";
    if ($resultado == 0) $mensaje = '<div class="gagal">Tipo de archivo no válido</div>';
    else if ($resultado == 1) $mensaje = '<div class="sukses">Usuarios importados correctamente</div>';
    else if (is_array($resultado))
    {
        $mensaje = '<div class="gagal">';
        foreach ($resultado as $values) $mensaje .= $values;
        $mensaje .= '</div>';
    }
}

//paginador
$registros = 20;
$total = sizeof($sura->getUsuarios("", $search, $_GET['tipo']));
$paginas = ceil($total / $registros);
$pag = 0;
if (isset($_GET['pag'])) $pag = $_GET['pag'];
$pagLimite = $registros * $pag;
$limite = " limit " . $pagLimite . ", " . $registros;
//termina paginador
$arreglo = $sura->getUsuarios($limite, $search, $_GET['tipo']);

require_once ('view/usuarios/usuarios.php');
?>
