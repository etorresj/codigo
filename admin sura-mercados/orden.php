<?php
include ('model/includes.php');
if (!$_SESSION['suraAdmin'])
{
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];
$order = $_GET['order'];
$tipo = $_GET['tipo'];
$sura = new admin();

//ordenando
$sura->ordena($_GET, "banners");
echo '<script type="text/javascript">window.location = "index.php?section=fondos&tipo=' . $tipo . '"</script>';

