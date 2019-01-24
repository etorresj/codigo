
<?php 

$phpself=explode("/", $_SERVER['PHP_SELF']);
print_r($phpself);
echo sizeof($phpself);


?>
<html>
	<body>
		<form method="post" action="?section=agregarSucursal" enctype="multipart/form-data">
			<input type="file" name="archivo">
		</form>
	</body>
</html>