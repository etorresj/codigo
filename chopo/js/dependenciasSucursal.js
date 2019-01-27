// JavaScript Document
function cargarRegionS()
{
	$.get("admin/controller/cargaRegion.php", function(resultado){
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
	$.get("admin/controller/cargaLocalidadSucursal.php", { id: code },
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
	$.get("admin/controller/cargaSucursalSucursal.php", { id: code },
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
function cargaSucursalDatos() {
	var code = $("#sucursalS").val();
	$.get("admin/controller/cargaSucursalDatos.php", { id: code },
		function(resultado)
		{	
			
			$("#datosSucursal").html(resultado);
		}

	);
}

function cargaSucursalHorarios() {
	var code = $("#sucursalS").val();
	$.get("admin/controller/cargaSucursalHorarios.php", { id: code },
		function(resultado)
		{	
			
			$("#horariosSucursal").html(resultado);
		}

	);
}

function cargaLatitud() {
	var code = $("#sucursalS").val();
	$.get("admin/controller/cargaSucursalLatitud.php", { id: code },
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


function cargaPrecioSucursal(promo) {
	var code = $("#sucursalS").val();
	$.get("admin/controller/cargaSucursalPrecio.php", { promo: promo, sucursal: code },
		function(resultado)
		{	

			$("#desdePrecio").html(resultado);
			
		}

	);
}


function cargaLatitudRegion() {
	var code = $("#regionS").val();
	$.get("admin/controller/cargaRegionLatitud.php", { id: code },
		function(resultado)
		{	

			
			var param = resultado.split(',');
			rtemp=param[0];
			rtemp2=param[1];
			//alert(rtemp+","+rtemp2);

			
			
			initialize(rtemp, rtemp2, 10);
		
		}

	);
}
function cargaLocalidadPromo(code, reg)
{
	$.get("admin/controller/cargaLocalidadPromo.php", { id: code, region: reg },
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
	$.get("admin/controller/cargaSucursalPromo.php", { id: code, localidad: loc },
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

