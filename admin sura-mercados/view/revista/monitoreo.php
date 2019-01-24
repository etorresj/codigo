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

<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	//	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	new nicEditor({maxHeight : 300, fullPanel : true}).panelInstance('texto');
});
</script>


</head>

<body>
<div id="header">
	<?php include "view/estructura/header.php"; ?>
</div>

<div id="wrapper">
	<?php include "view/estructura/menu.php"; ?>
	<div id="rightContent">
		
		<?php
			if($success) echo '<div class="sukses">Información actualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos, intente de nuevo</div>'; 
		?>
		<h3>Indicadores Financieros</h3>
		<form method="post"  enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
            <tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									<a href="index.php">
										<input type="button" class="button" value="<< Regresar">
									</a>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td class="data">Del día </td>
					<td class="data">
					<select name="liga2">
						<?php for($i=1; $i<32; $i++){
							$selected='';
							if($i == $arreglo[0]['liga2']) {
								$selected = 'selected';
							}
							$j=$i<10?'0'.(string)$i:(string)$i;
						?>
						<<option value="<?php echo $j; ?>" <?php echo $selected; ?>><?php echo $j; ?></option>
						<?php 
						}
						?>
					</select>
					</td>
				</tr>
				<tr>
					<td class="data">Al día </td>
					<td class="data">
						<select name="liga3">
							<?php for($i=1; $i<32; $i++){
								$selected='';
								if($i == $arreglo[0]['liga3']) {
									$selected = 'selected';
								}
								$j=$i<10?'0'.(string)$i:(string)$i;
							?>
							<<option value="<?php echo $j; ?>" <?php echo $selected; ?>><?php echo $j; ?></option>
							<?php 
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="data">Del mes </td>
					<td class="data">
					<select name="liga4">
					<?php foreach ($meses as $key => $mes) {
						$selected='';
						if($mes == $arreglo[0]['liga4']) {
							$selected = 'selected';
						}
						?>
					<option value="<?php echo $mes; ?>" <?php echo $selected;?> ><?php echo $mes; ?></option>
					<?php } ?>
				</select>
					</td>
				</tr>
				<tr>
				 <td class="data">IPC APERTURA</td>
				 <td class="data">
					 <input type="text" name="ipc" value="<?php echo $arreglo[0]['ipc']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">IPC CIERRE</td>
				<td class="data">
					<input type="text" name="ipcc" value="<?php echo $arreglo[0]['ipcc']; ?>" class="panjang">		
				</td>
				</tr>
				<tr>
				<td class="data">DOW JONES APERTURA</td>
				<td class="data">
				<input type="text" name="dow" value="<?php echo $arreglo[0]['dow']; ?>" class="panjang">		
				</td>
				</tr>
				<tr>
				<td class="data">DOW JONES CIERRE</td>
				<td class="data">
				<input type="text" name="dowc" value="<?php echo $arreglo[0]['dowc']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
				<td class="data">S&P 500 APERTURA</td>
				<td class="data">
				<input type="text" name="syp" value="<?php echo $arreglo[0]['syp']; ?>" class="panjang">		
				</td>
				</tr>
				<tr>
				<td class="data">S&P 500 CIERRE</td>
				<td class="data">
				<input type="text" name="sypc" value="<?php echo $arreglo[0]['sypc']; ?>" class="panjang">		
				</td>
				</tr>
				<tr>
				 <td class="data">NASDAQ APERTURA</td>
				 <td class="data">
					 <input type="text" name="nasdaq" value="<?php echo $arreglo[0]['nasdaq']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">NASDAQ CIERRE</td>
				<td class="data">
					<input type="text" name="nasdaqc" value="<?php echo $arreglo[0]['nasdaqc']; ?>" class="panjang">		
				</td>
				</tr>
				<tr>
				 <td class="data">BOVESPA APERTURA</td>
				 <td class="data">
					 <input type="text" name="bovespa" value="<?php echo $arreglo[0]['bovespa']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">BOVESPA CIERRE</td>
				<td class="data">
					<input type="text" name="bovespac" value="<?php echo $arreglo[0]['bovespac']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
				 <td class="data">EUROSTOXX APERTURA</td>
				 <td class="data">
					 <input type="text" name="eurostoxx" value="<?php echo $arreglo[0]['eurostoxx']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">EUROSTOXX CIERRE</td>
				<td class="data">
					<input type="text" name="eurostoxxc" value="<?php echo $arreglo[0]['eurostoxxc']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
				 <td class="data">FTSE 100 APERTURA</td>
				 <td class="data">
					 <input type="text" name="ftse" value="<?php echo $arreglo[0]['ftse']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">FTSE 100 CIERRE</td>
				<td class="data">
					<input type="text" name="ftsec" value="<?php echo $arreglo[0]['ftsec']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
				 <td class="data">DAX APERTURA</td>
				 <td class="data">
					 <input type="text" name="dax" value="<?php echo $arreglo[0]['dax']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">DAX CIERRE</td>
				<td class="data">
					<input type="text" name="daxc" value="<?php echo $arreglo[0]['daxc']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
				 <td class="data">IBEX APERTURA</td>
				 <td class="data">
					 <input type="text" name="ibex" value="<?php echo $arreglo[0]['ibex']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">IBEX CIERRE</td>
				<td class="data">
					<input type="text" name="ibexc" value="<?php echo $arreglo[0]['ibexc']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
				 <td class="data">CAC 40 APERTURA</td>
				 <td class="data">
					 <input type="text" name="cac" value="<?php echo $arreglo[0]['cac']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">CAC 40 CIERRE</td>
				<td class="data">
					<input type="text" name="cacc" value="<?php echo $arreglo[0]['cacc']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
				 <td class="data">HANG SENG APERTURA</td>
				 <td class="data">
					 <input type="text" name="hang" value="<?php echo $arreglo[0]['hang']; ?>" class="panjang">		
				 </td>
				</tr>
				<tr>
				<td class="data">HANG SENG CIERRE</td>
				<td class="data">
					<input type="text" name="hangc" value="<?php echo $arreglo[0]['hangc']; ?>" class="panjang">		
				</td>
				</tr>
				
				<tr>
	<td class="data">MXN/USD APERTURA</td>
	<td class="data">
		<input type="text" name="dolar" value="<?php echo $arreglo[0]['dolar']; ?>" class="panjang">		
	</td>
</tr>
<tr>
	<td class="data">MXN/USD CIERRE</td>
	<td class="data">
		<input type="text" name="dolarv" value="<?php echo $arreglo[0]['dolarv']; ?>" class="panjang">		
	</td>
</tr>

<tr>
<td class="data">MXN/EUR APERTURA</td>
<td class="data">
<input type="text" name="mxneur" value="<?php echo $arreglo[0]['mxneur']; ?>" class="panjang">		
</td>
</tr>
<tr>
<td class="data">MXN/EUR CIERRE</td>
<td class="data">
<input type="text" name="mxneurc" value="<?php echo $arreglo[0]['mxneurc']; ?>" class="panjang">		
</td>
</tr>

<tr>
 <td class="data">CETE 28 APERTURA</td>
 <td class="data">
	 <input type="text" name="cete" value="<?php echo $arreglo[0]['cete']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">CETE 28 CIERRE</td>
<td class="data">
	<input type="text" name="cetec" value="<?php echo $arreglo[0]['cetec']; ?>" class="panjang">		
</td>
</tr>

<tr>
 <td class="data">TIIE 28 APERTURA</td>
 <td class="data">
	 <input type="text" name="tiie" value="<?php echo $arreglo[0]['tiie']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">TIIE 28 CIERRE</td>
<td class="data">
	<input type="text" name="tiiec" value="<?php echo $arreglo[0]['tiiec']; ?>" class="panjang">		
</td>
</tr>

<tr>
 <td class="data">MBONO 10Y APERTURA</td>
 <td class="data">
	 <input type="text" name="mbono" value="<?php echo $arreglo[0]['mbono']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">MBONO 10Y CIERRE</td>
<td class="data">
	<input type="text" name="mbonoc" value="<?php echo $arreglo[0]['mbonoc']; ?>" class="panjang">		
</td>
</tr>
<!--
<tr>
 <td class="data">UDIBONO 10Y APERTURA</td>
 <td class="data">
	 <input type="text" name="udibono" value="<?php echo $arreglo[0]['udibono']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">UDIBONO 10Y CIERRE</td>
<td class="data">
	<input type="text" name="udibonoc" value="<?php echo $arreglo[0]['udibonoc']; ?>" class="panjang">		
</td>
</tr>
-->
<tr>
 <td class="data">US TREASURY 10Y APERTURA</td>
 <td class="data">
	 <input type="text" name="ust" value="<?php echo $arreglo[0]['ust']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">US TREASURY 10Y CIERRE</td>
<td class="data">
	<input type="text" name="ustc" value="<?php echo $arreglo[0]['ustc']; ?>" class="panjang">		
</td>
</tr>

<tr>
 <td class="data">WTI (USD/BARRIL) APERTURA</td>
 <td class="data">
	 <input type="text" name="wti" value="<?php echo $arreglo[0]['wti']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">WTI (USD/BARRIL) CIERRE</td>
<td class="data">
	<input type="text" name="wtic" value="<?php echo $arreglo[0]['wtic']; ?>" class="panjang">		
</td>
</tr>

<tr>
 <td class="data">ORO (USD/OZ) APERTURA</td>
 <td class="data">
	 <input type="text" name="oro" value="<?php echo $arreglo[0]['oro']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">ORO (USD/OZ) CIERRE</td>
<td class="data">
	<input type="text" name="oroc" value="<?php echo $arreglo[0]['oroc']; ?>" class="panjang">		
</td>
</tr>

<tr>
 <td class="data">BRENT APERTURA</td>
 <td class="data">
	 <input type="text" name="brent" value="<?php echo $arreglo[0]['brent']; ?>" class="panjang">		
 </td>
</tr>
<tr>
<td class="data">BRENT CIERRE</td>
<td class="data">
	<input type="text" name="brentc" value="<?php echo $arreglo[0]['brentc']; ?>" class="panjang">		
</td>
</tr>

                <tr>
					<td class="data">UDI</td>
					<td class="data">
						<input type="text" name="udi" value="<?php echo $arreglo[0]['udi']; ?>" class="panjang">	
                        <input type="hidden" name="id" value="1">	
					</td>
				</tr>
				<tr>
	<td class="data">INFLACIÓN</td>
	<td class="data">
		<input type="text" name="udic" value="<?php echo $arreglo[0]['udic']; ?>" class="panjang">	
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