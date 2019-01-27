// JavaScript Document
function eliminarSimilar(id, promocion) {
	var answer = confirm("¿Desea eliminar esta promoción similar?")
	if (answer){
		
		window.location="index.php?section=eliminaSimilar&id="+id+"&promocion="+promocion;
	}
	
	
}

function eliminarPerfil(id, idPerfil) {
	var answer = confirm("¿Desea eliminar este estudio?")
	if (answer){
		
		window.location="index.php?section=eliminaPerfil&id="+id+"&idPerfil="+idPerfil;
	}
	
	
}

function eliminarSucursal(id, idSucursal) {
	var answer = confirm("¿Desea eliminar esta sucursal?")
	if (answer){
		
		window.location="index.php?section=eliminaPromocionSucursal&id="+id+"&idSucursal="+idSucursal;
	}
	
	
}
function eliminarSucursalEstudio(idEstudio, idSucursal) {
	var answer = confirm("¿Desea eliminar esta sucursal?")
	if (answer){
		
		window.location="index.php?section=eliminaEstudioSucursal&idEstudio="+idEstudio+"&idSucursal="+idSucursal;
	}
	
	
}
function eliminarBanner(id) {
	var answer = confirm("¿Desea eliminar este banner?")
	if (answer){
		
		window.location="index.php?section=eliminaBanner&id="+id;
	}
	
	
}
function eliminarServicio(id) {
	var answer = confirm("¿Desea eliminar este estudio?")
	if (answer){
		
		window.location="index.php?section=eliminaServicio&id="+id;
	}	
}
function eliminarTag(id) {
	var answer = confirm("¿Desea eliminar este tag?")
	if (answer){
		
		window.location="index.php?section=eliminaTag&id="+id;
	}	
}
function eliminarNoticia(id) {
	var answer = confirm("¿Desea eliminar esta Noticia?")
	if (answer){
		
		window.location="index.php?section=eliminaNoticia&id="+id;
	}
	
	
}

function eliminarTip(id) {
	var answer = confirm("¿Desea eliminar este Tip de salud?")
	if (answer){
		
		window.location="index.php?section=eliminaTip&id="+id;
	}
	
	
}
function eliminarNewsLetter(id) {
	var answer = confirm("¿Desea eliminar este correo?")
	if (answer){
		
		window.location="index.php?section=eliminaNewsLetter&id="+id;
	}	
}
function SeleccionarCheck(chkbox,FormId) {
	
		 for (var i=0;i < document.forms[FormId].elements.length;i++)
        {
            var Element = document.forms[FormId].elements[i];
            if (Element.type == "checkbox" && Element.name=="region[]")
                Element.checked = chkbox.checked;
        }

	
}