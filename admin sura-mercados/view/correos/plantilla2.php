<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--[if !mso]>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
</head>
<body style="width:100%!important;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#f8f8f8;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll">
<div class="container_menu-colap">
<div class="color">
<a class="toggleMenu" href="#"><div id="MENUU">Anteriores &#x25BC;</div></a>
</div>
<ul class="nav subnav" style="text-align:center">
<?php 
foreach ($ultimos as $ultimo) { 
  $clase="";
  if($id_bole==$ultimo['id']){
    $clase='class="current"';
  }
  ?>
<li><a href="javascript:cargaNuevo('<?php echo $ultimo['id']; ?>')" <?php echo $clase; ?>><?php echo $ultimo['medio']; ?></a></li>
<?php } ?>
</ul>
</div>
<br />
<center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%">
<div class="webkit" style="max-width:800px;margin-top:0px">
<div class="block">
<table width="100%" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" id="backgroundtable" st-sortable="fulltext" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100%!important;line-height:100%!important">
<tbody>
<tr>
<td style="border-collapse:collapse">
<table bgcolor="#ffffff" width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;max-width:800px;margin-top:0px">
<tbody>
<tr>
<td bgcolor="#ffffff" style="border-collapse:collapse">
<table width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
<tbody>
<tr>
<td align="right" style="font-size:11px;color:#666666;text-align:right" st-content="leftimage-paragraph"><?php echo $arreglo[0]['medio']; ?></td>
</tr>
<tr>
<td width="100%" height="5" style="border-collapse:collapse"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" style="border-collapse:collapse">
<table width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
<tbody>
<tr>
<td align="left"><h2 style="text-transform:inherit;color:#b8b09b">Contenido:</h2>
</td>
</tr>
<tr>
<td width="100%" height="15" style="border-collapse:collapse"></td>
</tr>
<tr>
<td align="left" class="highlights">
<a href="#indicadores" style="text-decoration:none"><span style="text-decoration:none"><span class="flecha" style="color:#002a4e">&#10140;</span> Indicadores financieros</span></a>
</td>
</tr>
<?php 
                                      $i=0;
                                      if($encabezados)
                                      foreach($encabezados as $encabezado){ 
                                        if($encabezado['visible']){
                                        ?>
<tr>
<td align="left" class="highlights">
<a href="#seccion_<?php echo $i; ?>" style="text-decoration:none"><span style="text-decoration:none"><span class="flecha" style="color:#002a4e">&#10140;</span> <?php echo $encabezado['titulo']; ?></span></a>
</td>
</tr>
<?php 
                                           $i++;
                                         }
                                           } ?>
<tr>
<td width="100%" height="15" style="border-collapse:collapse"></td>
</tr>
<tr>
<td height="10" style="border-top-width:1px;border-top-style:dotted;border-top-color:#ccc;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;border-collapse:collapse"></td>
</tr>
<tr>
<td width="100%" height="25" style="border-collapse:collapse"></td>
</tr>
<tr>
<td align="left" class="highlights-tit" name="indicadores" id="indicadores">
1.- Indicadores financieros
</td>
</tr>
	
<tr>
<td width="100%" height="25" style="border-collapse:collapse"></td>
</tr>
<tr>
<td align="left" class="highlights-tit" name="indicadores" id="indicadores" style="background:#003057;padding:6px">
<span style="color:#fff">Mercados al cierre</span>
</td>
</tr>
<tr>
<td width="100%" height="10" style="border-collapse:collapse"></td>
</tr>
<tr>
<td>
<div class="section group">
<div class="col span_1_of_2">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px;background:#ffffff">&nbsp;</td>
<td width="29" align="center"><span style="color:#666666">Actual</span></td>
<td width="12" align="center"><span style="color:#7a6855">Anterior</span></td>
<td width="30" align="center" style="color:#7a6855"><span style="color:#666666">%</span></td>
<td width="14" align="center"><span style="color:#7a6855">%2018</span></td>
</tr>
<tr id="celda1-bol">
<td style="background:#b7b09c;padding:6px" width="92" colspan="5" align="left"><strong style="color:#ffffff">Índices accionarios</strong></td>
</tr>
<tr id="celda1-bol">
<td style="background:#eceae5;padding:6px" width="92" colspan="5" align="left"><strong style="color:#7a6855">Norteamérica</strong></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">IPC</td>
<td width="29" align="center"><?php echo $mercados['ipc_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['ipc_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['ipc_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['ipc_4']; ?></span></td>
</tr>
<tr id="celda2-bol">
<td align="left" style="padding:6px">Dow Jones</td>
<td width="29" align="center"><?php echo $mercados['down_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['down_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['down_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['down_4']; ?></span></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">S&P 500</td>
<td width="29" align="center"><?php echo $mercados['syp_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['syp_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['syp_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['syp_4']; ?></span></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">Nasdaq</td>
<td width="29" align="center"><?php echo $mercados['nasdaq_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['nasdaq_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['nasdaq_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['nasdaq_4']; ?></span></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">Bovespa</td>
<td width="29" align="center"><?php echo $mercados['bovespa_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['bovespa_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['bovespa_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['bovespa_4']; ?></span></td>
</tr>
<tr id="celda1-bol">
<td style="background:#eceae5;padding:6px" width="92" colspan="5" align="left"><strong style="color:#7a6855">Asia y Europa</strong></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">EuroStoxx</td>
<td width="29" align="center"><?php echo $mercados['eurostoxx_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['eurostoxx_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['eurostoxx_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['eurostoxx_4']; ?></span></td>
</tr>
<tr id="celda2-bol">
<td align="left" style="padding:6px">FTSE 100</td>
<td width="29" align="center"><?php echo $mercados['ftse_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['ftse_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['ftse_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['ftse_4']; ?></span></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">DAX</td>
<td width="29" align="center"><?php echo $mercados['dax_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['dax_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['dax_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['dax_4']; ?></span></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">IBEX</td>
<td width="29" align="center"><?php echo $mercados['ibex_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['ibex_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['ibex_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['ibex_4']; ?></span></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">CAC 40</td>
<td width="29" align="center"><?php echo $mercados['cac_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['cac_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['cac_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['cac_4']; ?></span></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">Hang Seng</td>
<td width="29" align="center"><?php echo $mercados['hang_1']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['hang_2']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['hang_3']; ?></td>
<td width="14" align="center"><span style="color:#7a6855"><?php echo $mercados['hang_4']; ?></span></td>
</tr>
</tbody>
</table>
</div>
<div class="col span_1_of_2">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px;background:#ffffff">&nbsp;</td>
<td width="29" align="center"><span style="color:#666666">Actual</span></td>
<td width="12" align="center"><span style="color:#7a6855">Anterior</span></td>
<td width="30" align="center" style="color:#7a6855"><span style="color:#666666">%</span></td>
<td width="14" align="center"><span style="color:#7a6855">%2018</span></td>
</tr>
<tr id="celda1-bol">
<td style="background:#b7b09c;padding:6px" width="92" colspan="5" align="left"><strong style="color:#ffffff">Monedas</strong></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">MXN/USD</td>
<td width="29" align="center"><?php echo $mercados['mxnusd_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['mxnusd_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['mxnusd_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['mxnusd_4']; ?></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">MXN/EUR</td>
<td width="29" align="center"><?php echo $mercados['mxneur_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['mxneur_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['mxneur_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['mxneur_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">EUR/USD</td>
<td width="29" align="center"><?php echo $mercados['eurusd_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['eurusd_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['eurusd_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['eurusd_4']; ?></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">GBP/USD</td>
<td width="29" align="center"><?php echo $mercados['gbpusd_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['gbpusd_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['gbpusd_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['gbpusd_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">JPY/USD</td>
<td width="29" align="center"><?php echo $mercados['jpyusd_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['jpyusd_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['jpyusd_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['jpyusd_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td style="background:#b7b09c;padding:6px" width="92" colspan="5" align="left"><strong style="color:#ffffff">Renta Fija en %</strong></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">Cete 28</td>
<td width="29" align="center"><?php echo $mercados['cete_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['cete_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['cete_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['cete_4']; ?></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">TIIE 28</td>
<td width="29" align="center"><?php echo $mercados['tiie_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['tiie_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['tiie_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['tiie_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">MBONO 10Y</td>
<td width="29" align="center"><?php echo $mercados['mbono_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['mbono_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['mbono_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['mbono_4']; ?></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">UDIBONO 10Y</td>
<td width="29" align="center"><?php echo $mercados['udibono_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['udibono_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['udibono_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['udibono_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">US Treasury 10Y</td>
<td width="29" align="center"><?php echo $mercados['ust_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['ust_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['ust_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['ust_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td style="background:#b7b09c;padding:6px" width="92" colspan="5" align="left"><strong style="color:#ffffff">Commodities</strong></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">WTI <span style="font-size:11px">(USD/BARRIL)</span></td>
<td width="29" align="center"><?php echo $mercados['wti_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['wti_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['wti_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['wti_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">Oro <span style="font-size:11px">(USD/Oz)</span></td>
<td width="29" align="center"><?php echo $mercados['oro_1']; ?></td>
<td width="12" align="center"><?php echo $mercados['oro_2']; ?></td>
<td width="30" align="center"><?php echo $mercados['oro_3']; ?></td>
<td width="14" align="center"><?php echo $mercados['oro_4']; ?></td>
</tr>
</tbody>
</table>
</div>
</div>
</td>
</tr>
<tr>
<td width="100%" height="10" style="border-collapse:collapse"></td>
</tr>
<tr>
<td style="background:#003057;padding:6px" class="highlights-tit">
<span style="color:#fff"> Fondos de Inversión SURA</span>
</td>
</tr>
<tr>
<td width="100%" height="15" style="border-collapse:collapse"></td>
</tr>
<tr>
<td align="center" style="text-align:center">
Rendimiento en %
</td>
</tr>
<tr>
<td width="100%" height="15" style="border-collapse:collapse"></td>
</tr>
<tr>
<td>
<div class="section group">
<div class="col span_1_of_2">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px;background:#ffffff">&nbsp;</td>
<td width="29" align="center"><span style="color:#666666">2018</span></td>
<td width="12" align="center"><span style="color:#7a6855">6 meses</span></td>
<td width="30" align="center" style="color:#7a6855"><span style="color:#666666">1 año</span></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">SURGOB</td>
<td width="29" align="center"><?php echo $mercados['surcete_2']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['surcete_3']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['surcete_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td align="left" style="padding:6px">SURBONO</td>
<td width="29" align="center"><?php echo $mercados['surudi_2']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['surudi_3']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['surudi_4']; ?></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">SURREAL</td>
<td width="29" align="center"><?php echo $mercados['surcop_2']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['surcop_3']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['surcop_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">SURUSD</td>
<td width="29" align="center"><?php echo $mercados['surreal_2']; ?></td>
<td width="12" align="center"><span style="color:#7a6855"><?php echo $mercados['surreal_3']; ?></span></td>
<td width="30" align="center"><?php echo $mercados['surreal_4']; ?></td>
</tr>
</tbody>
</table>
</div>
<div class="col span_1_of_2">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px;background:#ffffff">&nbsp;</td>
<td width="29" align="center"><span style="color:#666666">2018</span></td>
<td width="12" align="center"><span style="color:#7a6855">6 meses</span></td>
<td width="30" align="center" style="color:#7a6855"><span style="color:#666666">1 año</span></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">SURPAT</td>
<td width="29" align="center"><?php echo $mercados['surpat_2']; ?></td>
<td width="12" align="center"><?php echo $mercados['surpat_3']; ?></td>
<td width="30" align="center"><?php echo $mercados['surpat_4']; ?></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">SURGLOB</td>
<td width="29" align="center"><?php echo $mercados['surglob_2']; ?></td>
<td width="12" align="center"><?php echo $mercados['surglob_3']; ?></td>
<td width="30" align="center"><?php echo $mercados['surglob_4']; ?></td>
</tr>
<tr id="celda1-bol">
<td width="92" align="left" style="padding:6px">SUREUR</td>
<td width="29" align="center"><?php echo $mercados['sureur_2']; ?></td>
<td width="12" align="center"><?php echo $mercados['sureur_3']; ?></td>
<td width="30" align="center"><?php echo $mercados['sureur_4']; ?></td>
</tr>
<tr id="celda2-bol">
<td width="92" align="left" style="padding:6px">SURASIA</td>
<td width="29" align="center"><?php echo $mercados['surasia_2']; ?></td>
<td width="12" align="center"><?php echo $mercados['surasia_3']; ?></td>
<td width="30" align="center"><?php echo $mercados['surasia_4']; ?></td>
</tr>
</tbody>
</table>
</div>
</div>
</td>
</tr>

<tr>
<td width="100%" height="25" style="border-collapse:collapse"></td>
</tr>
<?php $i=0;
                                             if($encabezados)
                                             foreach($encabezados as $encabezado) {
                                               if($encabezado['visible']){
                                                 ?>
<tr>
<td align="left" class="highlights-tit">
<a name="seccion_<?php echo $i; ?>" id="seccion_<?php echo $i; ?>"></a>
<?php $i++; echo $i+1; ?>.- <?php echo $encabezado['titulo']; ?>
</td>
</tr>
<tr>
<td width="100%" height="10" style="border-collapse:collapse"></td>
</tr>
<?php if($encabezado['descripcion']) { ?>
<tr>
<td align="left" style="line-height:1.5">
<?php echo $encabezado['descripcion']; ?>
</td>
</tr>
<tr>
<td width="100%" height="15" style="border-collapse:collapse"></td>
</tr>
<?php } ?>
<?php 
                                              $temas=$sura->getSecciones($encabezado['id']);
                                              //$sura->showArray($temas);
                                              if($temas)
                                              foreach($temas as $tema){
                                                
                                             ?>
<?php if($tema['titulo']) { ?>
<tr>
<td align="left" style="text-transform:inherit;color:#ffffff;background:#b8b09b;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px"><?php echo $tema['titulo']; ?>
</td>
</tr>
<tr>
<td width="100%" height="5" style="border-collapse:collapse"></td>
</tr>
<?php } ?>
<tr>
<td align="left" style="line-height:1.5">
<?php echo $tema['descripcion']; ?>
</td>
</tr>
<tr>
<td width="100%" height="20" style="border-collapse:collapse"></td>
</tr>
<?php } ?>
<tr>
<td width="100%" height="10" style="border-collapse:collapse"></td>
</tr>
<?php 
                                  $fotos=$sura->getImagenes("", $encabezado['id']);
                                  if($fotos){
                                    
                                 ?>
<tr>
<td align="center" style="background-color:transparent;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-collapse:collapse">
<?php foreach($fotos as $foto) { ?>
<img width="100%" border="0" src="http://www.suramexico.co/boletin-semanal/images/secciones/<?php echo $foto['img']; ?>" style="display:block;border-style:none;outline-style:none;text-decoration:none;-ms-interpolation-mode:bicubic" class="graficas-bs" /><br />
<?php } ?>
</td>
</tr>
<tr>
<td width="100%" height="10" style="border-collapse:collapse"></td>
</tr>
<?php } ?>
<?php 
                                           }
                                           } ?>
<tr>
<td height="10" style="border-top-width:1px;border-top-style:dotted;border-top-color:#ccc;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;border-collapse:collapse"></td>
</tr>
<tr>
<td width="100%" height="20" style="border-collapse:collapse"></td>
</tr>
<tr>
<td align="left" style="line-height:1.6">
<span class="sub-tit">Productos, Servicios e Inversiones</span><br />
Elaborado por: <strong><?php echo $arreglo[0]['nombre']; ?></strong><br />
Teléfono: <strong><?php echo $arreglo[0]['telefono']; ?></strong>
<?php echo $arreglo[0]['extension']?'Ext. '.$arreglo[0]['extension']:'' ?><br />
<a href="<?php echo $arreglo[0]['email']; ?>" style="color:#7c6755;text-decoration:none"><span style="color:#7c6755;text-decoration:none"><?php echo $arreglo[0]['email']; ?></span></a>
</td>
</tr>
<tr>
<td width="100%" height="20" style="border-collapse:collapse"></td>
</tr>
<tr>
<td align="left">
<span class="mini">El contenido del presente documento proviene de fuentes consideradas como fidedignas; sin embargo, no se ofrece garantía alguna, ni representa una sugerencia para para la toma de decisiones en materia de inversión. SURA Investment Management México, S.A. de C.V., Sociedad Operadora de Fondos de Inversión (*SIMM) no asume ninguna responsabilidad en caso de que el presente documento sea interpretado como recomendación de compra o venta de cualquier inversión que en el mismo se mencionan. El inversionista interesado en invertir en los fondos de inversión administradas por SIMM, deberá consultar el prospecto de información correspondiente para conocer todas las características de operación, administración y liquidación de cada fondo. Este documento no podrá ser reproducido parcial o totalmente por ningún medio, ni ser distribuido, citado o divulgado sin el permiso previo por escrito otorgado por SIMM. Las opiniones publicadas en este documento son de exclusiva responsabilidad del autor. SIMM no asume responsabilidad alguna respecto de la inexactitud, errores o imprecisiones de la información contenida en el mismo. Fondos de Inversión SURA es la línea de negocio para personas físicas de SURA Investment Management México, S.A. de C.V., Sociedad Operadora de Fondos de Inversión.
</span>
</td>
</tr>
</tbody>
</table>
<br /><br />
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</center>
<script type="text/javascript" src="https://www.suramexico.co/boletin-semanal/admin/js/menu-colap.js"></script>
</body></html>