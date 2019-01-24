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
			if($success) echo '<div class="sukses">Boletín atualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>';
		?>
		<?php if($mensaje)
 echo $mensaje;
 ?>
		<h3>Editar <?php echo $arreglo[0]['titulo']; ?></h3>
		<form method="post"  enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td><a href="?section=<?php echo $seccionRegresar; ?>&id=<?php echo $padre; ?>#abajo">
										<input type="button" class="button" value="<< Regresar">
									</a>

								</td>

							</tr>
						</table>
					</td>
				</tr>


				<tr>
					<td class="data">Titulo:</td>
					<td class="data"><input type="text" class="panjang" name="titulo" value="<?php echo $arreglo[0]['titulo']; ?>">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="ms" value ="<?php echo $muestraSubtemas; ?>">
					</td>
				</tr>

				<!--
				<tr>
					<td class="data">Nombre Autor:</td>
					<td class="data"><input type="text" class="panjang" name="nombre" value="<?php echo $arreglo[0]['nombre']; ?>">
					</td>
				</tr>

				<tr>
					<td class="data">Teléfono Autor:</td>
					<td class="data"><input type="text" class="panjang" name="telefono" value="<?php echo $arreglo[0]['telefono']; ?>">
					</td>
				</tr>

				<tr>
					<td class="data">Extensión:</td>
					<td class="data"><input type="text" class="panjang" name="extension" value="<?php echo $arreglo[0]['extension']; ?>">
					</td>
				</tr>

				<tr>
					<td class="data">Email Autor:</td>
					<td class="data"><input type="text" class="panjang" name="email" value="<?php echo $arreglo[0]['email']; ?>">
					</td>
				</tr>
			-->
					<?php if($muestraSubtemas) { ?>


			<?php } else { ?>

				<tr>
					<td class="data">Descripcion</td>
					<td class="data">
						<textarea name="descripcion"><?php echo $arreglo[0]['descripcion']; ?></textarea>

					</td>
				</tr>
      <?php } ?>



				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
			</table>
		</form>


		<?php if($muestraSubtemas && isset($_POST['hola'])) { ?>

			<!-- TERMINA DATOS PARA MAÑANA -->


					<h3>Mercados al cierre</h3>
			<form method="post" action="?section=actualizaMercados" enctype="multipart/form-data" name="forma1" id="forma1">
				<table class="data">


					<tr><td valign="top">

						<table width="277" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner2" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;" >
								 <tbody>
									<!-- Spacing -->
	<tr>
	<td width="100%" height="20" style="border-collapse:collapse;" ></td>
	</tr>
	<!-- end Spacing -->
	<!-- content -->
										<tr>
											<td bgcolor="#7a6855" st-content="leftimage-paragraph" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:22px;font-weight:bold;color:#ffffff;text-align:left;line-height:27px;padding-top:5px;padding-bottom:5px;padding-right:0;padding-left:10px;border-collapse:collapse;" ><a name="seccion5"></a>Mercados al cierre</td>
										</tr>
										<!-- end of content -->
										<!-- Spacing -->
	<tr>
	<td width="100%" height="10" style="border-collapse:collapse;" ></td>
	</tr>
	<!-- end Spacing -->
										<!-- content -->
										<tr>
										<td  st-content="leftimage-paragraph" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:12px;color:#666666;text-align:left;line-height:18px;border-collapse:collapse;" ><table width="277" border="0" align="center" cellpadding="0" cellspacing="0" class="devicewidthinner2" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;" >
											<tbody>
												<tr>
													<td width="118" style="border-collapse:collapse;" >&nbsp;</td>
													<td width="40" align="center" style="color:#005fa9;border-collapse:collapse;" >Actual</td>
													<td width="51" align="center" style="color:#005fa9;border-collapse:collapse;" >Anterior</td>
													<td width="28" align="center" style="color:#005fa9;border-collapse:collapse;" >%</td>
													<td width="40" align="center" style="color:#005fa9;border-collapse:collapse;" >%2016</td>
												</tr>
												<tr bgcolor="#bcb6a6">
													<td height="24" valign="middle" style="border-collapse:collapse;" ><strong style="color:#005FA9;padding-top:4px;padding-bottom:4px;padding-right:4px;padding-left:4px;" >Índices accionarios</strong></td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="border-collapse:collapse;" ><strong style="color:#005FA9;padding-left:4px;" >Norteamérica</strong></td>
													<td align="center" style="border-collapse:collapse;" ></td>
													<td align="center" style="border-collapse:collapse;" ></td>
													<td align="center" style="border-collapse:collapse;" ></td>
													<td align="center" style="border-collapse:collapse;" ></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >IPC</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ipc_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ipc_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ipc_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ipc_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >Dow Jones</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['down_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['down_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['down_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['down_4']; ?></td>
												</tr>
												<tr>
												 <td align="left" style="padding-left:4px;border-collapse:collapse;" >S&amp;P 500</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['syp_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['syp_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['syp_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['syp_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >Nasdaq</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nasdaq_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nasdaq_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nasdaq_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nasdaq_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >Bovespa</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['bovespa_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['bovespa_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['bovespa_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['bovespa_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="border-collapse:collapse;" ><strong style="color:#005FA9;padding-left:4px;" >Asia y Europa</strong></td>
													<td align="center" style="border-collapse:collapse;" ></td>
													<td align="center" style="border-collapse:collapse;" ></td>
													<td align="center" style="border-collapse:collapse;" ></td>
													<td align="center" style="border-collapse:collapse;" ></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >EuroStoxx</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurostoxx_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurostoxx_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurostoxx_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurostoxx_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >FTSE 100</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ftse_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ftse_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ftse_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ftse_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >DAX</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['dax_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['dax_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['dax_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['dax_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >IBEX</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ibex_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ibex_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ibex_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ibex_4']; ?></td>
												</tr>
												<tr >
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >CAC 40</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cac_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cac_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cac_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cac_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >Nikkey</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nikkey_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nikkey_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nikkey_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['nikkey_4']; ?></td>
												</tr>
												<tr >
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >Hang Seng</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['hang_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['hang_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['hang_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['hang_4']; ?></td>
												</tr>
												 <tr bgcolor="#bcb6a6">
													<td height="24" align="left" valign="middle" style="border-collapse:collapse;" ><strong style="color:#005FA9;padding-left:4px;" >Monedas</strong></td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >MXN/USD</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxnusd_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxnusd_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxnusd_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxnusd_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >MXN/EUR</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxneur_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxneur_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxneur_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mxneur_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >EUR/USD</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurusd_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurusd_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurusd_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['eurusd_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >GBP/USD</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['gbpusd_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['gbpusd_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['gbpusd_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['gbpusd_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >JPY/USD</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['jpyusd_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['jpyusd_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['jpyusd_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['jpyusd_4']; ?></td>
												</tr>
												 <tr bgcolor="#bcb6a6">
													<td height="24" colspan="2" align="left" valign="middle" style="border-collapse:collapse;" ><strong style="color:#005FA9;padding-left:4px;" >Renta Fija en %</strong></td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >Cete 28</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cete_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cete_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cete_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['cete_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >TIIE 28</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['tiie_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['tiie_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['tiie_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['tiie_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >MBONO 10Y</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mbono_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mbono_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mbono_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['mbono_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >UDIBONO 10Y</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['udibono_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['udibono_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['udibono_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['udibono_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >US Treasury 10Y</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ust_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ust_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ust_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['ust_4']; ?></td>
												</tr>
												<tr bgcolor="#bcb6a6">
													<td height="24" align="left" valign="middle" style="border-collapse:collapse;" ><strong style="color:#005FA9;padding-left:4px;" >Commodities</strong></td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
													<td align="center" style="border-collapse:collapse;" >&nbsp;</td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >WTI (USD/BARRIL)</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['wti_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['wti_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['wti_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['wti_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >Oro (USD/Oz)</td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['oro_1']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['oro_2']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['oro_3']; ?></td>
													<td align="center" style="border-collapse:collapse;" ><?php echo $mercados['oro_4']; ?></td>
												</tr>
											</tbody>
										</table></td>
									 </tr>
										<!-- end of content -->

								 </tbody>
						 </table>


					</td>

				<td valign="top">

					<table width="277" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner2" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;" >
							 <tbody>
								<!-- Spacing -->
	<tr>
	<td width="100%" height="20" style="border-collapse:collapse;" ></td>
	</tr>
	<!-- end Spacing -->

	<!-- content -->
										<tr>
											<td bgcolor="#7a6855" st-content="leftimage-paragraph" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:20px;font-weight:bold;color:#ffffff;text-align:left;line-height:25px;padding-top:5px;padding-bottom:5px;padding-right:0;padding-left:10px;border-collapse:collapse;" ><a name="seccion6"></a>Fondos de Inversión SURA</td>
										</tr>
										<!-- end of content -->
										<!-- Spacing -->
	<tr>
	<td width="100%" height="10" style="border-collapse:collapse;" ></td>
	</tr>
	<!-- end Spacing -->
										<!-- content -->
										<tr>
										<td  st-content="leftimage-paragraph" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:12px;color:#666666;text-align:left;line-height:18px;border-collapse:collapse;" ><table width="277" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner2" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;" >
											<tbody>
												<tr>
	                           											  <td style="border-collapse:collapse;">&nbsp;</td>
	                           											  <td colspan="3" align="center" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:12px;color:#7a6855;border-collapse:collapse;">Rendimiento en %</td>
	                       											  </tr>
												<tr>
													<td width="104" style="border-collapse:collapse;" >&nbsp;</td>
													<td width="58" align="center" style="color:#7a6855;border-collapse:collapse;" >2016</td>
													<td width="58" align="center" style="color:#7a6855;border-collapse:collapse;" >12 meses</td>
													<td width="57" align="center" style="color:#7a6855;border-collapse:collapse;" >2 años</td>
												</tr>
													<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >SURGOB</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surcete_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surcete_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surcete_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >SURBONO</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surudi_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surudi_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surudi_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >SURREAL</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surcop_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surcop_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surcop_4']; ?></td>
												</tr>
												<tr>
													<td height="26" align="left" style="padding-left:4px;border-collapse:collapse;" >SURUSD</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surreal_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surreal_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surreal_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >SURPAT</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surpat_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surpat_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surpat_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >SURGLOB</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surglob_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surglob_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surglob_4']; ?></td>
												</tr>
												<tr bgcolor="#eceae5">
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >SUREUR</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['sureur_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['sureur_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['sureur_4']; ?></td>
												</tr>
												<tr>
													<td align="left" style="padding-left:4px;border-collapse:collapse;" >SURASIA</td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surasia_2']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surasia_3']; ?></td>
													<td align="center" style="border-collapse:collapse;"> <?php echo $mercados['surasia_4']; ?></td>
												</tr>
											</tbody>
										</table></td>
									 </tr>
										<!-- end of content -->
																	 <!-- Spacing -->



							 </tbody>
					 </table>

				</td>

				</tr>
				<tr>
					<td class="data">Actualizar:</td>
					<td class="data"><input type="file" name="archivo">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="button" value="Enviar">
					</td>
				</tr>
				</table>
			</form>
	    <?php } ?>


				</tbody>
</table>







	</div>
<div class="clear"></div>
<div id="footer"></div>
</div>
</body>
</html>
