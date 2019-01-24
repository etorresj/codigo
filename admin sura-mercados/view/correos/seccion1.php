<?php 
if($contenido1) {
?>
                              
                              
                                  <!-- COLUMNA -->
                                             <tr>
                                                <td>
                                                
                                                
                                        <table width="620" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                              <tbody>
                                 <tr>
                                    <td>
                                       <!-- start of text content table -->
                                       <table width="200" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                          <tbody>
                                             <!-- title -->
                                             <tr >
                                                <td bgcolor="#005fa9" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 30px; color:#ffffff; text-align:left;line-height:37px; padding:0 14px 0 14px; background:#005fa9" width="200" height="175" align="center" class="recuadro">
                                                 SURA México</td>
                                             </tr>
                                              <!-- end of title -->
                                          </tbody>
                                       </table>
                                       
                                       
                                       <!-- mobile spacing -->
                                       <table align="left" border="0" cellpadding="0" cellspacing="0" class="mobilespacing">
                                          <tbody>
                                             <tr>
                                                <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <!-- mobile spacing -->
                                       
                                       
                                       <?php 
									   $i=0;
									   foreach ($contenido1 as $cont1) { 
									   if($i==0) {
									   ?>
                                       
                                       
                                  
                                       
                                       <!-- TABLA TIPO 1 -->
                                       <table width="400" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                          <tbody>
                                             <!-- title -->
                                             <tr>
                                                <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 16px; font-weight:bold; color:#005fa9; text-align:left;line-height: 20px;" st-title="leftimage-title">
                                                   <?php echo $cont1['titulo']; ?></td>
                                             </tr>
                                             <!-- end of title -->
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="3"></td>
                                             </tr>
                                             <!-- Spacing -->
                                             <!-- content -->
                                             <tr>
                                                <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 14px; color:#666666; text-align:left;line-height: 16px;" st-content="leftimage-paragraph">
                                                    <?php echo $cont1['descripcion']; ?></td>
                                             </tr>
                                             <!-- end of content -->
                                             <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="2"></td>
                                 </tr>
                                 <!-- end Spacing -->
                                  <!-- content -->
                                             <tr>
                                                <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 11px; color:#666666; text-align:left;line-height: 16px;" st-content="leftimage-paragraph">( <?php echo $cont1['medio']; ?>)</td>
                                             </tr>
                                             <!-- end of content -->
                                             <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="5"></td>
                                 </tr>
                                 <!-- end Spacing -->
                                             <!-- button -->
                                             <tr>
                                                <td>
                                                   <table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="28" style=" background-color:#00aecb; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:20px; padding-right:20px;">
                                                                        
<span style="color: #ffffff; font-weight: 300;">
<a style="color: #ffffff; text-align:center;text-decoration: none;" href=" <?php echo $cont1['url']; ?>">Leer m&aacute;s</a>
</span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                </td>
                                             </tr>
                                             <!-- /button -->
                                               <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="15"></td>
                                 </tr>
                                 <!-- end Spacing -->
                                          </tbody>
                                       </table>
                                        <!-- END TABLA TIPO 1 -->
                                        
                                     
                                       
                                       
                                    </td>
                                 </tr>
                              </tbody>
                           </table>        
                                                
                                                
                                                </td>
                                             </tr>
                              <!-- end COLUMNA -->
                              
                              <?php } else { ?>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                                <!-- TABLA TIPO 2 -->
                                              <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="30">
                                                
                                                
                                                
                                                <table  align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                          <tbody>
                                             <!-- title -->
                                             <tr>
                                                <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 16px; font-weight:bold; color:#005fa9; text-align:left;line-height: 20px;" st-title="leftimage-title">
                                                   <?php echo $cont1['titulo']; ?></td>
                                             </tr>
                                             <!-- end of title -->
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="3"></td>
                                             </tr>
                                             <!-- Spacing -->
                                             <!-- content -->
                                             <tr>
                                                <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 14px; color:#666666; text-align:left;line-height: 16px;" st-content="leftimage-paragraph">
                                                    <?php echo $cont1['descripcion']; ?></td>
                                             </tr>
                                             <!-- end of content -->
                                             <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="2"></td>
                                 </tr>
                                 <!-- end Spacing -->
                                  <!-- content -->
                                             <tr>
                                                <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 11px; color:#666666; text-align:left;line-height: 16px;" st-content="leftimage-paragraph">( <?php echo $cont1['medio']; ?>)</td>
                                             </tr>
                                             <!-- end of content -->
                                             <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="5"></td>
                                 </tr>
                                 <!-- end Spacing -->
                                             <!-- button -->
                                             <tr>
                                                <td>
                                                   <table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="28" style=" background-color:#00aecb; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:20px; padding-right:20px;">
                                                                        
<span style="color: #ffffff; font-weight: 300;">
<a style="color: #ffffff; text-align:center;text-decoration: none;" href=" <?php echo $cont1['url']; ?>">Leer más</a>
</span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                </td>
                                             </tr>
                                             <!-- /button -->
                                               <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="15"></td>
                                 </tr>
                                 <!-- end Spacing -->
                                          </tbody>
                                       </table>
                                       
                                               </td>
                                             </tr>
                              <!-- end Spacing -->
                                        <!-- END TABLA TIPO 2 -->
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                             
                                          
                                        
                                        
                                        
                                        
      <?php }
	  
	  $i++;
	  } 
	  } ?>                        
                                    
                                    
                                    