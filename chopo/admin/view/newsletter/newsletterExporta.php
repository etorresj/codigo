<html>
<head>
<title>Chopo - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Panel de Administraciónm Chopo">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">



</head>

<body>

<div id="wrapper">
	<div id="rightContent">
		
		
		
		<table class="data">
			
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Correo</th>
				<th class="data">Regi&oacute;n</th>
				<th class="data">Especialidad</th>
			</tr>
			<?php 
			if($servicios)
			foreach ($servicios as $servicio) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $servicio['id']; ?></td>
				<td class="data"><?php echo ($servicio['correo']); ?></td>
				<td class="data"><?php echo $servicio['nombreRegion']; ?></td>
				<td class="data">
				<?php echo $servicio['nombreEsp']; ?>
				</td>
				

				
			</tr>
			<?php } 
			else {
				?>
				<tr>
					<td colspan="5" align="center">
						No se encontró ningún registro
					</td>
				</tr>
			<?php } ?>
		</table>
		
		
		

	</div>
<div class="clear"></div>
</div>
</body>
</html>