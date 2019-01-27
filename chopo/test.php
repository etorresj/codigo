<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
	$(document).ready(function() {
		if(localStorage.chopoRegion)
				alert(localStorage.chopoRegion)
			else
				localStorage.chopoRegion=2;
		$.get("buscaRegion.php", { id: localStorage.chopoRegion },
			function(resultado)
			{
			
			alert(resultado);
			}

		);
		
	}); //document ready


</script>

<html>
	<body>
	
	</body>
</html>