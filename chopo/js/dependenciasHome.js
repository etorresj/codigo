// JavaScript Document
function cargarRegion()
{
	$.get("admin/controller/cargaRegion.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#region').append(resultado);			
		}
	});	
}

function cargaEspecialidadRegion()
{
	var code = $("#region").val();

	$.get("admin/controller/cargaEspecialidadRegion.php", { id: code },
		function(resultado)
		{
		
			if(resultado == false)
			{
				$("#especialidad").attr("disabled",true);
				document.getElementById("especialidad").options.length=1;
			}
			else
			{
				$("#especialidad").attr("disabled",false);
				document.getElementById("especialidad").options.length=1;
				$('#especialidad').append(resultado);			
			}
		}

	);
}

function cargaEspecialidadPromocion(codigo)
{
	var code = $("#regionPromocion").val();

	$.get("admin/controller/cargarSucursalPromo.php", { codigoPromo: codigo, region: code },
		function(resultado)
		{
			
			if(resultado == false)
			{
				$("#especialidadPromocion").attr("disabled",true);
				document.getElementById("especialidadPromocion").options.length=0;
			}
			else
			{
				$("#especialidadPromocion").attr("disabled",false);
				document.getElementById("especialidadPromocion").options.length=0;
				$('#especialidadPromocion').append(resultado);			
			}
		}

	);
}