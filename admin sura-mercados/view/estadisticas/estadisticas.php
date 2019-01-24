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
<script src="js/Chart.bundle.js"></script>
<script src="js/utils.js"></script>


</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">

		<?php
			if($success) echo '<div class="sukses">Revista atualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>';
		?>


        <h3><?php echo $titulo; ?><a name="abajo"></a></h3>
		<table class="data">


			<tr class="data">
				<td colspan="2">
					<canvas id="chart-area"></canvas>
				</td>
			</tr>
			<tr class="data">
				<td colspan="2">
					<canvas id="chart-area2"></canvas>
				</td>
			</tr>
			<tr class="data">
				<td colspan="2">
					<canvas id="chart-area3"></canvas>
				</td>
			</tr>
			<tr class="data">
			<td>Enviados</td>
			<td><?php echo $enviados; ?></td>
		  </tr>
			<tr class="data">
			<td>Leídos</td>
			<td><?php echo $abiertos; ?></td>
			</tr>
			<tr class="data">
			<td>Leídos Unicos</td>
			<td><?php echo $unicos; ?></td>
			</tr>
			<tr class="data">
			<td>No leídos</td>
			<td><?php echo $noAbiertos; ?></td>
			</tr>
			<tr class="data">
			<td>Rebotados</td>
			<td>
				<?php
				if($rebotados)
				foreach($rebotados as $reb){
					echo $reb['mensaje']."<br>";
				}
				else
				echo 0;
					?>

			</td>
			</tr>


		</table>

	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>




<script>
	var randomScalingFactor = function() {
		return Math.round(Math.random() * 100);
	};

	var config = {
		type: 'pie',
		data: {
			datasets: [{
				data: [
					<?php echo $noAbiertos; ?>,
					<?php echo $unicos; ?>,
				],
				backgroundColor: [
					window.chartColors.green,
					window.chartColors.blue,
				],
				label: 'Dataset 1'
			}],
			labels: [
				'No Leídos',
				'Leídos',
			]
		},
		options: {
			responsive: true
		}
	};

	var config2 = {
		type: 'pie',
		data: {
			datasets: [{
				data: [
					<?php echo $abiertos; ?>,
					<?php echo $unicos; ?>,
				],
				backgroundColor: [
					window.chartColors.orange,
					window.chartColors.yellow,

				],
				label: 'Dataset 1'
			}],
			labels: [
				'Leídos',
				'Leídos (únicos)',
			]
		},
		options: {
			responsive: true
		}
	};

	var config3 = {
		type: 'pie',
		data: {
			datasets: [{
				data: [
					<?php echo $enviados - count($rebotados); ?>,
					<?php echo count($rebotados); ?>,
				],
				backgroundColor: [
					window.chartColors.yellow,
					window.chartColors.red,

				],
				label: 'Dataset 1'
			}],
			labels: [
				'Entregados',
				'Rebotados',
			]
		},
		options: {
			responsive: true
		}
	};

	window.onload = function() {
		var ctx = document.getElementById('chart-area').getContext('2d');
		var ctx2 = document.getElementById('chart-area2').getContext('2d');
		var ctx3 = document.getElementById('chart-area3').getContext('2d');
		window.myPie = new Chart(ctx, config);
		window.myPie = new Chart(ctx2, config2);
		window.myPie = new Chart(ctx3, config3);
	};




</script>


</body>
</html>
