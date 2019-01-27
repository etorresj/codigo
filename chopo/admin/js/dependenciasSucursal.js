// JavaScript Document
function cargarRegionS()
{
	$.get("controller/cargaRegion.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#regionS').append(resultado);			
		}
	});	
}
function cargaLocalidadS()
{
	var code = $("#regionS").val();
	$.get("controller/cargaLocalidadSucursal.php", { id: code },
		function(resultado)
		{
			
			if(resultado == false)
			{
				$("#localidadS").attr("disabled",true);
				document.getElementById("localidadS").options.length=1;

				$("#sucursal").attr("disabled",true);
				document.getElementById("sucursalS").options.length=1;

			}
			else
			{
				$("#localidadS").attr("disabled",false);
				document.getElementById("localidadS").options.length=1;
				$('#localidadS').append(resultado);

				$("#sucursalS").attr("disabled",true);
				document.getElementById("sucursalS").options.length=1;


			}
		}

	);
}

function cargaSucursalS()
{
	var code = $("#localidadS").val();
	var tipoSucursal = $("#tipo").val();
	$.get("controller/cargaSucursalSucursal.php", { id: code, tipo: tipoSucursal },
		function(resultado)
		{	
			
			if(resultado == false)
			{
				$("#sucursalS").attr("disabled",true);
				document.getElementById("sucursalS").options.length=1;
				$("#especialidad").attr("disabled",true);
			
			}
			else
			{
				$("#sucursalS").attr("disabled",false);
				document.getElementById("sucursalS").options.length=1;
				$('#sucursalS').append(resultado);
					
			}
		}

	);
}
function cargaTipo()
{
	
	$.get("controller/cargaTipo.php", { id: 1 },
		function(resultado)
		{	
			
			if(resultado == false)
			{
				

				$("#sucursalS").attr("disabled",true);
				document.getElementById("sucursalS").options.length=1;

				document.getElementById("tipo").options.length=1;
			
			}
			else
			{
				$("#tipo").attr("disabled",false);
				$("#sucursalS").attr("disabled",true);
				document.getElementById("sucursalS").options.length=1;

				document.getElementById("tipo").options.length=1;
				$('#tipo').append(resultado);
					
			}
		}

	);
}
function cargaSucursalDatos() {
	var code = $("#sucursalS").val();
	$.get("controller/cargaSucursalDatos.php", { id: code },
		function(resultado)
		{	
			
			$("#datosSucursal").html(resultado);
		}

	);
}

function cargaSucursalHorarios() {
	var code = $("#sucursalS").val();
	$.get("controller/cargaSucursalHorarios.php", { id: code },
		function(resultado)
		{	
			
			$("#horariosSucursal").html(resultado);
		}

	);
}

function cargaLatitud() {
	var code = $("#sucursalS").val();
	$.get("controller/cargaSucursalLatitud.php", { id: code },
		function(resultado)
		{	

			
			var param = resultado.split(',');
			rtemp=param[0];
			rtemp2=param[1];
			//alert(rtemp+","+rtemp2);

			
			
			initialize(rtemp, rtemp2);
		
		}

	);
}
function cargaLatitudRegion() {
	var code = $("#regionS").val();
	$.get("controller/cargaRegionLatitud.php", { id: code },
		function(resultado)
		{	

			
			var param = resultado.split(',');
			rtemp=param[0];
			rtemp2=param[1];
			//alert(rtemp+","+rtemp2);

			
			
			initialize(rtemp, rtemp2, 10000);
		
		}

	);
}
function cargaLocalidadPromo(code, reg)
{
	$.get("controller/cargaLocalidadPromo.php", { id: code, region: reg },
		function(resultado)
		{
			if(resultado == false)
			{
				$("#localidadPromo").attr("disabled",true);
				document.getElementById("localidadPromo").options.length=1;

				$("#sucursal").attr("disabled",true);
				document.getElementById("localidadPromo").options.length=1;

			}
			else
			{
				$("#localidadPromo").attr("disabled",false);
				document.getElementById("localidadPromo").options.length=1;
				$('#localidadPromo').append(resultado);

				$("#sucursalPromo").attr("disabled",true);
				document.getElementById("sucursalPromo").options.length=1;


			}
		}

	);
}

function cargaSucursalPromo(code)
{
	var loc = $("#localidadPromo").val();
	$.get("controller/cargaSucursalPromo.php", { id: code, localidad: loc },
		function(resultado)
		{	
			if(resultado == false)
			{
				$("#sucursalS").attr("disabled",true);
				document.getElementById("sucursalS").options.length=1;
			
			}
			else
			{
				$("#sucursalS").attr("disabled",false);
				document.getElementById("sucursalS").options.length=1;
				$('#sucursalS').append(resultado);
					
			}
		}

	);
}

