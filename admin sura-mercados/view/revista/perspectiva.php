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
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>

jQuery.fn.extend({
insertAtCaret: function(myValue){
  return this.each(function(i) {
    if (document.selection) {
      //For browsers like Internet Explorer
      this.focus();
      var sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else if (this.selectionStart || this.selectionStart == '0') {
      //For browsers like Firefox and Webkit based
      var startPos = this.selectionStart;
      var endPos = this.selectionEnd;
      var scrollTop = this.scrollTop;
      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
      this.focus();
      this.selectionStart = startPos + myValue.length;
      this.selectionEnd = startPos + myValue.length;
      this.scrollTop = scrollTop;
    } else {
      this.value += myValue;
      this.focus();
    }
  });
}
});
function insertar(img) {
	$.get("controller/cargarImagen.php", { id: img },
		function(resultado)
		{
			
			if(resultado == false)
			{
				console.log("error")

			}
			else
			{
				arreglo=resultado.split("||")
				titulo=arreglo[0];
				fuente=arreglo[1];
				imagen=arreglo[2];
				textoFinal='<!-- INICIA IMAGEN -->';
				textoFinal+="<table>";
				textoFinal+='<td class="full-width-image" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >';
            	textoFinal+='<img src="http://suramexico.co/sura-economico/admin/images/'+imagen+'" alt="" style="border-width:0;width:100%;height:auto;" />';
        		textoFinal+='</td></tr> <tr>';
				textoFinal+='<td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >';
				textoFinal+='		<table width="100%" style="border-spacing:0;font-family:Segoe, \'Segoe UI\', \'DejaVu Sans\', \'Trebuchet MS\', Verdana, sans-serif;color:#666666;" >';
                textoFinal+='<tr><td class="inner contents" style="font-family:\'Trebuchet MS\', Arial, Helvetica, sans-serif;font-size:14px;color:#666;text-align:left;line-height:20px;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;width:100%;" >';
                textoFinal+=titulo+'<br />';
                textoFinal+='           <em style="font-size:12px;" >Fuente: '+fuente+'</em></td>';
				textoFinal+='</tr></table><!-- FIN IMAGEN-->';	
				textoFinal="{{grafico_"+img+"}}"          
							
				$('#element').insertAtCaret(textoFinal);


			}
		}
	);
}

function salto() {							
	$('#element').insertAtCaret("<br>");
}

function validar(e){
	tecla = (document.all) ? event.keyCode : e.which;
	if (tecla==13) 
		$('#element').insertAtCaret("<br>");
} 
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
			if($success) echo '<div class="sukses">Sección atualizada correctamente</div>';
			else if($error) echo '<div class="gagal">Error agregando datos</div>'; 
		?>
		<h3>Editar <?php echo $fondo; ?></h3>
		<form method="post" action="?section=perspectiva" enctype="multipart/form-data" name="forma1" id="forma1">
			<table class="data">
				<tr>
					<td colspan="5">
						<table width="100%">
							<tr>
								<td><a href="index.php">
										<input type="button" class="button" value="<< Regresar">
									</a>
									
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
              
				
				
			
				<tr>
					<td class="data">Descripcion</td>
					<td class="data">
						<textarea onkeyup="validar(event)" name="descripcion" id="element"><?php echo $arreglo[0]['descripcion']; ?></textarea>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
					</td>
				</tr>
               
              
				
              
				<tr>
					<td>
						<input type="submit" class="button" value="Enviar">
					</td>
					<td align="right">
						<input type="button" class="button" onClick="salto();" value="Insertar salto de linea">
					</td>
				</tr>
			</table>
		</form>


		<table class="data">
			<form method="post">
				<tr>
					<td colspan="7">
						<table width="100%">
							<tr>
								<td>
									Insertar gráficos
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
			</form>
			<tr class="data">
				<th class="data" width="30px">Id</th>
				<th class="data">Titulo</th>
				
				<th class="data" width="75px">Insertar</th>
			</tr>
			<?php 
			
			if($imagenes)
			foreach ($imagenes as $value) { ?>
			<tr class="data">
				<td class="data" width="30px"><?php echo $value['id']; ?></td>
				<td class="data">
						<?php echo $value['titulo']; ?>
				</td>
				
				
              

				

				
				<td class="data" width="75px">
				<center>
					
						<img  src="css/img/insert_image_2.png" style="cursor:pointer;" width="16" onClick="insertar('<?php echo $value['id']; ?>');">
					
				</center>
				</td>
			</tr>
			<?php $j++;
				} 
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
<div id="footer"></div>
</div>
</body>
</html>