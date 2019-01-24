<?php
if (!$_SESSION['suraAdmin']) header("Location: ?section=login");
$sura = new admin();

if (($_FILES))
{
    $campos = array();
    $resultado = $sura->importaMercados($_FILES['archivo'], $campos, $_POST['id']);
    $mensaje = "";
    if ($resultado == 0) {
			$mensaje = '<div class="gagal">Tipo de archivo no válido</div>';
		} else if ($resultado == 1) {
			$mensaje = '<div class="sukses">Usuarios importados correctamente</div>';
		} else if (is_array($resultado)){
        $mensaje = '<div class="gagal">';
        foreach ($resultado as $values) $mensaje .= $values;
        $mensaje .= '</div>';
    }
}
$sura->redirect("?section=editarSeccion&id=" . $_POST['id'] . "&ms=1&resultado=" . $resultado, 0);
?>
