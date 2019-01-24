    
 
 
 
            <tr><!-- TEXTO 1 COLUMNA-->
               <td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <table width="100%" style="border-spacing:0;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;color:#666666;" >

                            <tr><!-- Spacing -->
                                  <td width="100%" height="0" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" ></td>
                            </tr><!-- fin Spacing -->
                            
                     <tr>
                        <td class="inner contents" style="line-height:23px;font-size:14px;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;width:100%;text-align:left;" >
                                <p class="h1" style="Margin:0;font-size:26px;font-weight:bold;Margin-bottom:12px;line-height:34px;color:#005FA9;" >Highlights:</p>
                                
                                <ul>
                               <?php 
                               if($encabezados)
                               foreach ($encabezados as $encabezado) { ?>
                        <li><?php echo $encabezado['descripcion']; ?></li>
                        <?php if($encabezado['subtemas']) { 
                              foreach($encabezado['subtemas'] as $subtema) { 
                        ?> 
                           - <?php echo $subtema['descripcion']; ?><br>
                         <?php } } ?>
                         <?php } ?>
                        </ul>

 
                        </td>
                     </tr>
                  </table>
               </td>
            </tr><!-- FIN TEXTO 1 COLUMNA-->
                
                
                
                
   <tr><!-- TEXTO 1 COLUMNA-->
               <td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <table width="100%" style="border-spacing:0;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;color:#666666;" >

                            <tr><!-- Spacing -->
                                  <td width="100%" height="0" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" ></td>
                            </tr><!-- fin Spacing -->
                            
                     <tr>
                        <td class="inner contents" style="line-height:23px;font-size:14px;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;width:100%;text-align:left;" >
                                <p class="h1" style="Margin:0;font-size:26px;font-weight:bold;Margin-bottom:12px;line-height:34px;color:#005FA9;" >1. Perspectiva en tasas</p>
                                
                                <?php echo ($tasas[0]['descripcion']); ?>

 
                        </td>
                     </tr>
                  </table>
               </td>
            </tr><!-- FIN TEXTO 1 COLUMNA-->
                
                
                                                                           
                                                                


   <tr><!-- TEXTO 1 COLUMNA-->
               <td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <table width="100%" style="border-spacing:0;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;color:#666666;" >

                            <tr><!-- Spacing -->
                                  <td width="100%" height="0" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" ></td>
                            </tr><!-- fin Spacing -->
                            
                     <tr>
                        <td class="inner contents" style="line-height:23px;font-size:14px;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;width:100%;text-align:left;" >
                                <p class="h1" style="Margin:0;font-size:26px;font-weight:bold;Margin-bottom:12px;line-height:34px;color:#005FA9;" >2. Perspectiva de mercados</p>
                              
                              <?php echo ($mercados[0]['descripcion']); ?>



 
                        </td>
                     </tr>
                  </table>
               </td>
            </tr><!-- FIN TEXTO 1 COLUMNA-->
                
                         
                                                         
      <!-- Spacing -->
                               <tr>
                                 <td height="20" style="border-bottom-width:1px;border-bottom-style:dotted;border-bottom-color:#ccc;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" ></td>
                              </tr>
                              <!-- Spacing -->
                                                           
 <!-- Spacing -->
                               <tr>
                                 <td height="10" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" ></td>
                              </tr>
                              <!-- Spacing -->
 
 
 <tr><!-- TEXTO 1 COLUMNA-->
               <td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
                  <table width="100%" style="border-spacing:0;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;color:#666666;" >

                            <tr><!-- Spacing -->
                                  <td width="100%" height="0" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" ></td>
                            </tr><!-- fin Spacing -->
                            