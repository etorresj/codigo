function checaPrivilegios()
{
	var code = $("#folio").val();
	$.get("admin/controller/checaPrivilegios.php", { id: code },
		function(resultado)
		{
			
			if(resultado)
				$("#formaPriv").submit();
			else {
				alert("El folio no es válido");
				varCheca=0;
			}
			
		}

	);
}



