<html>
<head>
<title>SURA - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Panel de Administración SURA">
<meta name="keywords" content="Admin">
<meta name="language" content="Span">

<link rel="shortcut icon" href="css/img/devil-icon.png"> 
<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script src="js/main.js"></script>




</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Contenido agregado correctamente</div>';
			else if($error) echo '<div class="gagal">'.$dia.' de '.$mes.' ya existe, intente de nuevo</div>'; 
		?>
		<h3>Agregar <?php echo $titulo; ?></h3>
		<form method="post"  enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
            <tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="?section=contenido&tipo=<?php echo $_GET['tipo']; ?>">
										<input type="button" class="button" value="<< Regresar">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				<?php if($_GET['tipo']<=4) { ?>
                <tr>
					<td class="data">Mes</td>
					<td class="data">
						<select id="mes" name="mes" onChange="cargaDias();">
                        	<?php foreach ($meses as $mes) {  ?>
                        	<option value="<?php echo $mes['idMes']."|".$mes['nombreMes']."|".$mes['dias']; ?>"><?php echo $mes['nombreMes']; ?></option>
                            <?php } ?>
                        </select>
					</td>
				</tr>
				<?php } ?>

				<tr>
					<td class="data">Dia</td>
					<td class="data">
						<select id="dia" name="dia">
                        	<?php for ($i=1; $i<32; $i++) {  ?>
                        	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="tipo" id="tipo" value="<?php echo $_GET['tipo']; ?>">
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>
	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>