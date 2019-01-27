// JavaScript Document
function cargarRegion()
{
	$.get("controller/cargaRegion.php", function(resultado){
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
function cargaLocalidad()
{
	var code = $("#region").val();
	$.get("controller/cargaLocalidad.php", { id: code },
		function(resultado)
		{
			
			if(resultado == false)
			{
				$("#localidad").attr("disabled",true);
				document.getElementById("localidad").options.length=1;

				$("#sucursal").attr("disabled",true);
				document.getElementById("sucursal").options.length=1;

				$("#especialidad").attr("disabled",true);
				document.getElementById("especialidad").options.length=1;

				$("#departamento_id").attr("disabled",true);
				document.getElementById("departamento_id").options.length=1;
			}
			else
			{
				$("#localidad").attr("disabled",false);
				document.getElementById("localidad").options.length=1;
				$('#localidad').append(resultado);

				$("#sucursal").attr("disabled",true);
				document.getElementById("sucursal").options.length=1;

				$("#especialidad").attr("disabled",true);
				document.getElementById("especialidad").options.length=1;

				$("#departamento_id").attr("disabled",true);
				document.getElementById("departamento_id").options.length=1;

			}
		}

	);
}

function cargaSucursal()
{
	var code = $("#localidad").val();
	$.get("controller/cargaSucursal.php", { id: code },
		function(resultado)
		{	
			
			if(resultado == false)
			{
				$("#sucursal").attr("disabled",true);
				document.getElementById("sucursal").options.length=1;
				$("#especialidad").attr("disabled",true);
				document.getElementById("especialidad").options.length=1;
				$("#departamento_id").attr("disabled",true);
				document.getElementById("departamento_id").options.length=1;
			}
			else
			{
				$("#sucursal").attr("disabled",false);
				document.getElementById("sucursal").options.length=1;
				$('#sucursal').append(resultado);
				$("#especialidad").attr("disabled",true);
				document.getElementById("especialidad").options.length=1;	
				$("#departamento_id").attr("disabled",true);
				document.getElementById("departamento_id").options.length=1;		
			}
		}

	);
}

function cargaEspecialidad()
{
	var code = $("#sucursal").val();
	$.get("controller/cargaEspecialidad.php", { id: code },
		function(resultado)
		{
			
			if(resultado == false)
			{
				$("#especialidad").attr("disabled",true);
				document.getElementById("especialidad").options.length=1;

				$("#departamento_id").attr("disabled",true);
				document.getElementById("departamento_id").options.length=1;
			}
			else
			{
				$("#especialidad").attr("disabled",false);
				document.getElementById("especialidad").options.length=1;
				$('#especialidad').append(resultado);

				$("#departamento_id").attr("disabled",true);
				document.getElementById("departamento_id").options.length=1;			
			}
		}

	);
}

function cargaDepartamento()
{
	var code = $("#especialidad").val();
	$.get("controller/cargaDepartamento.php", { id: code },
		function(resultado)
		{
			
			if(resultado == false)
			{
				$("#departamento_id").attr("disabled",true);
				document.getElementById("departamento_id").options.length=1;
			}
			else
			{
				$("#departamento_id").attr("disabled",false);
				document.getElementById("departamento_id").options.length=1;
				$('#departamento_id').append(resultado);			
			}
		}

	);
}