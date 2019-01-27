<!DOCTYPE html><html lang="es">
 <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

	    <script src="js/jquery-1.9.1.min.js"></script> 


<script type="text/javascript">
$(document).ready(function(){
    $('ul.listado li a').click(function() {
    var textoFiltro = $(this).text().toLowerCase().replace(/\s/g,"-");
    if(textoFiltro == 'todos')
    {
        $('div.filtros div.hidden').fadeIn('slow').removeClass('hidden');
    }
    else
    {
        $('.filtros div').each(function()
        {
            if(!$(this).hasClass(filterVal))
            {
                $(this).fadeOut('normal').addClass('hidden');
            }
            else
            {
                $(this).fadeIn('slow').removeClass('hidden');
            }
        });
    }
    return false;
    });
});

</script>
</head>
<body>
<section>
<ul class="listado">
    <li><a href="#">Todos</a></li>
    <li><a href="#">Rojos</a></li>
    <li><a href="#">Azules</a></li>
    <li><a href="#">Amarillos</a></li>
    </ul>
    <div class="filtros">
        <div class="rojos"><div style="background-color:red; width:100px; height:100px;"></div></div>
        <div class="azules"><div style="background-color:blue; width:100px; height:100px;"></div></div>
        <div class="azules"><div style="background-color:blue; width:100px; height:100px;"></div></div>
        <div class="amarillos"><div style="background-color:yellow; width:100px; height:100px;"></div></div>
        <div class="rojos"><div style="background-color:red; width:100px; height:100px;"></div></div>
        <div class="amarillos"><div style="background-color:yellow; width:100px; height:100px;"></div></div>
        <div class="amarillos"><div style="background-color:yellow; width:100px; height:100px;"></div></div>
        <div class="azules"><div style="background-color:blue; width:100px; height:100px;"></div></div>
        <div class="rojos"><div style="background-color:red; width:100px; height:100px;"></div></div>
    </div>
</section>
</body>
</html>