<?php 
if(isset($_POST['estado'])) {
     $_SESSION['chopoRegion']=$_POST['estado'];
    ?>
    <script>
        localStorage.chopoRegion=<?php echo $_POST['estado']; ?>;
        window.location="promociones.php";
    </script>
    <?php

}
include('lib/header.php');
$chopo=new front();
$arreglo=$chopo->getRegiones();


if(isset($_POST['estado'])) {
    $idRegionPromocion=$_POST['estado'];
    $_SESSION['chopoRegion']=$_POST['estado'];
    echo $_SESSION['chopoRegion'];
}
else
{
    $idRegionPromocion=$_SESSION['chopoRegion'];

}
$tag=$_GET['tag']?$_GET['tag']:0;



$promociones=$chopo->getPromociones($idRegionPromocion, $tag);
$tags=$chopo->getTags();
//$chopo->showArray($promociones);
?>  

<script>
$(function(){
    var default_view = 'grid'; // choose the view to show by default (grid/list)
    
    // check the presence of the cookie, if not create "view" cookie with the default view value
    if($.cookie('view') !== 'undefined'){
        $.cookie('view', default_view, { expires: 7, path: '/' });
    } 
    function get_grid(){
        $('.list').removeClass('list-active');
        $('.grid').addClass('grid-active');
        $('.prod-cnt').animate({opacity:0},function(){
            $('.prod-cnt').removeClass('prod-box-list');
            $('.prod-cnt').addClass('prod-box');
            $('.prod-cnt').stop().animate({opacity:1});
        });
    } // end "get_grid" function
    function get_list(){
        $('.grid').removeClass('grid-active');
        $('.list').addClass('list-active');
        $('.prod-cnt').animate({opacity:0},function(){
            $('.prod-cnt').removeClass('prod-box');
            $('.prod-cnt').addClass('prod-box-list');
            $('.prod-cnt').stop().animate({opacity:1});
        });
    } // end "get_list" function

    if($.cookie('view') == 'list'){ 
        // we dont use the "get_list" function here to avoid the animation
        $('.grid').removeClass('grid-active');
        $('.list').addClass('list-active');
        $('.prod-cnt').animate({opacity:0});
        $('.prod-cnt').removeClass('prod-box');
        $('.prod-cnt').addClass('prod-box-list');
        $('.prod-cnt').stop().animate({opacity:1}); 
    } 

    if($.cookie('view') == 'grid'){ 
        $('.list').removeClass('list-active');
        $('.grid').addClass('grid-active');
        $('.prod-cnt').animate({opacity:0});
            $('.prod-cnt').removeClass('prod-box-list');
            $('.prod-cnt').addClass('prod-box');
            $('.prod-cnt').stop().animate({opacity:1});
    }

    $('#list').click(function(){   
        $.cookie('view', 'list'); 
        get_list()
    });

    $('#grid').click(function(){ 
        $.cookie('view', 'grid'); 
        get_grid();
    });

    /* filter */
    $('.category-menu ul li').click(function(){
        var CategoryID = $(this).attr('category');
        $('.category-menu ul li').removeClass('cat-active');
        $(this).addClass('cat-active');
        
        $('.prod-cnt').each(function(){
            if(($(this).hasClass(CategoryID)) == false){
               $(this).css({'display':'none'});
            };
        });
        $('.'+CategoryID).fadeIn(); 
        
    });
    
    $("#regionPromociones").change(function(){$("#formaPromociones").submit();});


	
});
</script>




<div id="contentwrap"> 
	<div id="content">  
	
	
	<div id="content-in">
	
	
	<div class="prods-cnt">
        
        <div id="menupromociones">		
			<div class="select">
			<form action="#" method="post" id="formaPromociones" accept-charset="utf-8" >
	            <select name="estado" id="regionPromociones" class="default" tabindex="2">
	             <?php
	             foreach($arreglo as $value) {
					$selected='';
					if(isset($_POST['estado'])) {
						if($_POST['estado']==$value['id'])
							$selected='selected="selected"';
					}
					else {
						if($_SESSION['chopoRegion']==$value['id'])
							$selected='selected="selected"';
					}
					echo '<option value="'.$value['id'].'"'.$selected.'>'.ucfirst( utf8_encode($value['nombre'])).'</option>';

				}
				?>
	            </select>
	          </form>
			  
			</div>
	
			<div class="select">
			 <form action="#" method="post" accept-charset="utf-8" >
	            <input type="button" value="Filtrar Promociones" class="Esconder_Mostrar">
	          </form>
	      	
			</div>
	
			
			  
			<div id="modover">
	            <div id="list" class="list "><img src="images/lista.jpg" alt="lista" /></div>
	            <div id="grid" class="grid"><img src="images/cuadricula.jpg" alt="cuadricula" /></div>
			</div> 
			
			<div class="paginacion" style="display:none;">		  	
			</div>
			
			<div style="clear:both"></div>
		</div>

        
        <div class="category-menu">
        	
            <ul>
            	<li class="" category="prod-cnt"><a href="promociones.php">Todas</a></li>
                <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
                <?php foreach ($tags as $tag) { ?>
                <li class="" category="<?php echo $tag['id']; ?>" style="padding-top:5px;"><a href="promociones.php?tag=<?php echo $tag['id']; ?>"><?php echo utf8_encode($tag['tag']); ?></a></li>
                <?php } ?>
            </ul>
        	<div style="clear:both;"></div>
        </div>
        
        
        <script>
        $(document).ready(function(){
			    $(".category-menu").hide();
			    $(".Esconder_Mostrar").show();
				$('.Esconder_Mostrar').click(function(){
				$(".category-menu").slideToggle();
			});
		});
        </script>
        
        <div class="clear"></div>


		<div class="prod-cnt prod-box shadow title" >
        	<div class="serv">Servicio</div>
        	<div class="reg">Precio Regular</div>
        	<div class="reg">Promoción</div>
        </div>

        <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
        <?php 
        $i=1;
        if($promociones)
        	foreach($promociones as $promocion) { ?>
        <div class="prod-cnt prod-box shadow cat-1" >
            <a href="<?php echo $promocion['codigo']; ?>/<?php echo $idRegionPromocion; ?>/<?php echo $promocion['keyword'].'.html'; ?>">
            	<div class="imgpromo">
            	
					<?php if(($promocion['imagen'])&&(file_exists("images/promocion/".$promocion['imagen']))) { ?>
            		<img src="images/promocion/<?php echo $promocion['imagen'] ?>"  />
            		<?php } else { ?>
					<img src="images/imgn_promocion.jpg"  />
            		<?php } ?>
            	</div></a>
            <p class="num"><?php echo $i; $i=$i+1;?>.</p>           
            <span class="titleazulpromo"><a href="<?php echo $promocion['codigo']; ?>/<?php echo $idRegionPromocion; ?>/<?php echo $promocion['keyword'].'.html'; ?>"><?php echo utf8_encode($promocion['nombre']) ?></a></span>
            
            
            
            
            <div class="preciopromo">Desde: <?php echo "$".number_format($promocion['precio'], 2, '.', ','); ?><br/><span style="font-size: 12px">*Precio puede variar de acuerdo a sucursal.</span>
					</div>
            
            
            
            
            <p class="desc"><?php 
            if(is_numeric($promocion['precio']))
            	echo "Desde: $".number_format($promocion['precio'], 2, '.', ',').'<br/><span style="font-size: 12px">*Precio puede variar de acuerdo a sucursal.</span>';
        	else
        		echo utf8_encode($promocion['precio']);

            ?></p> 
        </div>
		<?php } ?>
        <!-- end product box prod-box -->

        
        
		<div style="clear:both"></div>
    </div>
	</div>
		
		
	</div>
	</div>
	</div>
</div>
<?php include('lib/footer.php') ?>  