�         ����    del/includes.php');
$id=$_GET['id'];
extract($_GET);
$chopo=new admin();

$arreglo=$chopo->getSucursalPromo($id, $localidad);
if($arreglo)
	foreach($arreglo as $value)
		echo '<option value="'.$value['id'].'">'.utf8_encode(ucwords(strtolower($value['nombre']))).'</option>';
?>