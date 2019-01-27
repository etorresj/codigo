<?php include('lib/header.php');


$search=isset($_POST['search'])?$_POST['search']:(isset($_GET['search'])?$_GET['search']:"");
//paginador
$registros=20;
$total=sizeof($chopo->getEstudios("",$search, $_SESSION['chopoRegion']));
$paginas=ceil($total/$registros);
$pag=0;
if(isset($_GET['pag']))
$pag=$_GET['pag'];
$pagLimite=$registros*$pag;
$limite=" limit ".$pagLimite.", ".$registros;
//termina paginador
$tag=$_GET['tag']?$_GET['tag']:0;
$estudios=$chopo->getEstudios($limite,$search, $_SESSION['chopoRegion'], $tag);

$tags=$chopo->getTags();

//print_r($estudios);
 ?>  

<div id="contentwrap"> 
	<div id="content">  	
	<div id="content-in">		
	<div class="prods-cnt">
       
        <div id="menupromociones">		
			<div class="select">
			Estudios
			</div>

			
			<div class="paginacion" style="display:none">	
			  	
			</div>
			<div class="busca">
						<form id="formaEstudios" name="formaEstudios" method="post">
						<input type="text"  name="search" class="headersearch" value="<?php echo $search; ?>" >
						<input type="image" src="images/search-lupa.jpg" alt="search-lupa" class="headersearch lupa" value=""  onclick=" document.formaEstudios.submit()">	
					</form>
			</div>
			<div style="clear:both"></div>
		</div>


        
        <div class="clear"></div>


        <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
       <?php 
       
       $i=($pag*20)+1;
       if($estudios)
       foreach($estudios as $estudio) { ?>
        <div class="prod-box-list">
            <p class="num"><?php echo $i; ?>.</p>           
            <span class="titleazulpromo">
            	<a href="estudios-info.php?id=<?php echo $estudio['codigo']; ?>" class='ajax'><?php echo ucfirst(mb_strtolower( utf8_encode($estudio['nombre']),"UTF-8" )); ?></a>
            </span>
            <div class="preciopromo"></div>
            <p class="desc"></p> 
        </div><!-- end product box prod-box -->
        <?php $i++;
    } else
    echo "No se encontró ningún resultado para ".$search;
     ?>
       
        
       
        
		<div style="clear:both"></div>
    </div>
	</div>
     <?php 
         if($paginas>1)
         include "paginador.php"; 
         ?>
	
		
		
		
	</div>
	</div>
	</div>
</div>
<?php include('lib/footer.php') ?>  