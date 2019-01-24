
<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/admin/adminStyle.css"/>
        <link href="css/upload/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/admin/main.js"></script>
        <title>Middleware Admin</title>
        <link rel="stylesheet" type="text/css" media="all" href="css/upload/jsDatePick_ltr.css" />
		<script type="text/javascript" src="js/upload/jsDatePick.min.1.3.js"></script>
		<script type="text/javascript" src="js/upload/main.js"></script>
        <script type="text/javascript">
		window.onload = function(){
			new JsDatePick({
				useMode:2,
				target:"expire",
				dateFormat:"%Y-%m-%d",
			});
			new JsDatePick({
				useMode:2,
				target:"begin",
				dateFormat:"%Y-%m-%d",
			});
		};
		</script>
    </head>
 
    <body>
 
        <header>
            <nav>
                <?php include "view/admin/menu.php"; ?>
            </nav>
        </header>
 
        <section>        
            <article>
             
                 <br>
                  <form action="" method="post" enctype="multipart/form-data">
                 <table align="center" width="70%"> 
                
			        	<tr>
				            <td><input type="text" name="search" id="search" value="<?php  if(isset($_POST['search'])!=NULL){echo $_POST['search'];}?>"></td>
			        	</tr>
			        	<tr>
				            <td>
					            <input type="text" name="begin" id="begin" readonly="readonly" style="width:70px" value="<?php  if(isset($_POST['begin'])!=NULL){echo $_POST['begin'];}?>"> 
					            to 
					            <input type="text" name="expire" id="expire" readonly="readonly" style="width:70px" value="<?php  if(isset($_POST['expire'])!=NULL){echo $_POST['expire'];}?>">
				            </td>
			        	</tr>
			        	<tr>
				            <td><input type="submit" value="search"></td>
			        	</tr>
			     
                 </table>
                 </form>
			     <br>
			    
			    <?php if($_POST) {?>   
                <table align="center" width="70%" class="table">    
                		<tr>
							<th>Title</th>
							<th>Embed Code</th>
							<th>Total views</th>
						</tr>              
			        	
			        	
			        	<?php 
		            	if ($assets->results == NULL){
					        ?>	
					        <tr>
			            		<td class="errorS" colspan="4">Videos not found</td>
			            	</tr>		        
						
						
						<?php 
						} else {
			        	foreach ($assets->results as $value) { ?>	
							<tr>
								<td><?php echo $value->name; ?></td>
								<td><?php echo $value->movie_data->embed_code; ?></td>
								<td><?php echo $value->metrics->video->plays?></td>
							</tr>						
						
						
						
						<?php }}   
						
						if ($assets->next_page != NULL){
					        ?>	
					        <tr>
					        <form method="post" action="">
			            		<td colspan="4">
			            			<input type="submit" name="" value="Next Page">
				            		<input type="hidden" name="next" value="<?php echo $assets->next_page; ?>">
				            		<input type="hidden" name="nexttoken" value="<?php echo $assets->next_page_token; ?>">
				            		<input type="hidden" name="begin" value="<?php echo $_POST['begin']; ?>">
				            		<input type="hidden" name="expire" value="<?php echo $_POST['expire']; ?>">
			            		</td>
					        </form>
			            	</tr>	
			            <?php } ?> 	               
                </table>
                <?php } ?> 
                
            </article>
        </section>
 
        <aside>
        </aside>
 
        <footer>
        </footer>
    </body> 
</html>