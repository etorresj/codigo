<?php
include('admin/model/includes.php');

$chopo= new front();
$promociones = $chopo->getPromociones($_GET['id']);
$chopo->showArray($promociones);


foreach($promociones as $promocion) {
?>

<div class="article">
	<img src="images/promocion/banners/<?php echo $promocion['banner'] ?>" alt="<?php echo $promocion['nombrePromo'] ?>" width="100" height="100">
	<span class="azul"><?php echo $promocion['nombrePromo'] ?></span>
	<p><?php echo $promocion['patologia'] ?></p>
	<a href="" class="azul">Ver Mas</a>
</div>

<?php } ?>

