�         ����    'chopoAdmin'])
header("Location: ?section=login");

$chopo=new admin();

if($_POST) {
	$success=$chopo->editPromocion($_POST, $_FILES);
	if($success)
		$chopo->redirect("?section=promocion", 3);
	else
		$error=1;
}
$id=$_POST['promocion_codigo']?$_POST['promocion_codigo']:$_GET['id'];
$servicios=$chopo->getServiciosDinamicos();
$promocion=$chopo->getPromocionId($id);
//$chopo->showArray($promocion);
//archivo VISTA
require_once('view/promocion/editarPromocion.php');
?>