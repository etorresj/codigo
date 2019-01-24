<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title>Ooyala Videos</title>
        <script>
        function find(valor){
					document.location.href='index.php?sorted='+valor;}

		</script>


	<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
	 <link href="css/multiple-select.css" rel="stylesheet"/>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/upload/main.js" type="text/javascript"></script>
	<script src="js/jquery.colorbox-min.js" type="text/javascript"></script>

	 <script src="js/jquery.multiple.select.js"></script>
   								
   	<! style >
	<link href="css/style.css" rel="stylesheet" type="text/css">	
    </head>
 
    <body>
    
    <div id="wrapper-uploader">
	<div class="watermark">
		<div class="wrapper-header">
			<div class="gray-bar"></div>
			<div class="menu-bar">
				<?php include("view/upload/menu.php");?>
			</div>
			<div class="fixFloat"></div>
		</div>
		<div class="wrapper-content">
		<!-- Place the content between -->
		<!-- And here -->
	 
 
        <section>		
	            <table class="table" cellpadding="8" width="100%;">
	            	<tr>
	            		<th>Title</th>
	            		<th style="width:100px">Shared by</th>
	            		<th>Select Style</th>
	            		<th>Select Category</th>
	            		
	            		
	            	</tr>
	            	<?php 
		            	if ($videos == NULL){
			        ?>	
			        <tr>
	            		<th class="errorS" colspan="10">Videos not found</th>
	            	</tr>		        
                   <?php
		            	}else{ 
	            		$i=1;
	            		foreach($videos as $video) {									
							$idvideo=$video['idVideo'];
							$title=$video['title'];
							$embed_code=$video['embed_code'];
							//$property=$video['property_name'];
							//$status=$video['status'];							
							//$player=$video['player'];
							//$fk_idProperty=$video['fk_idProperty'];				
	            	 ?>
		            		            	
			            	<tr>
			            		<td><?php echo $title ?></td>
			            		
			            		<td><?php echo $video['sharedByP']?$video['sharedByP']:$video['sharedBy'] ?></td>
			            		<td>
			            			<!-- <select name="playerid" id="playerid<?php echo $i; ?>">
										<?php foreach ($playersArray[$fk_idProperty]->items as $value) { 
											$pid=$value->id;
											$p=$value->name;
										?>				
										<option value="<?php echo $pid;?>"  <?php if($pid==$player){echo 'selected';}?> ><?php echo $p;?>
										</option>			
										<?php } ?>
									</select>-->
									<select name="style" id="style<?php echo $i; ?>">
										<option value="home">home-400x225</option>
										<option value="Article">Article-654x368</option>
										<option value="Custom-480x270">Custom-480x270</option>
										<option value="Custom-300x340">Custom-300x340</option>
										<option value="Custom-620x349">Custom-620x349</option>
										<option value="Custom-645x300">Custom-645x300</option>
										<option value="Custom-645x400">Custom-645x400</option>
										<option value="Custom-654x400">Custom-654x400</option>
										<option value="Custom-654x480">Custom-654x480</option>
										<option value="Custom-1000x563">Custom-1000x563</option>
										<option value="Custom-1000x645">Custom-1000x645</option>
									</select>
								</td>					
								<td>
									<select name="category" id="category<?php echo $i; ?>">
										<option value="Home">Home</option>
										<option value="News">News</option>
										<option value="Sports">Sports</option>
										<option value="Entertainment">Entertainment</option>
										<option value="Lifestyle">Lifestyle</option>
										<option value="Business">Business</option>
									</select>
									<!--<?php if($playListsArray[$fk_idProperty]->items) { ?>
									<select  multiple="multiple" id="playlists<?php echo $i; ?>">
										<?php foreach ($playListsArray[$fk_idProperty]->items as $value) { 
											$pid=$value->id;
											$p=$value->name;
										?>				
										<option value="<?php echo $pid;?>"  <?php if($pid==$player){echo 'selected';}?> ><?php echo $p;?>
										</option>			
										<?php } ?>
									</select>
									<script>						
								        $('#playlists'+<?php echo $i; ?>).multipleSelect();
									</script>
									<?php } 
									else echo "Not available"; 
									?>-->
									<input type="hidden" value="<?php echo $embed_code; ?>" name="embed_code" id="embed_code<?php echo $i; ?>">
									<input type="hidden" value="<?php echo $idProperty; ?>" name="propertyId" id="propertyId<?php echo $i; ?>">
								</td>	
								

    
								<td align="center"><input type="button" value="Get Embed Code" onclick="call_cbox(<?php echo $i; ?>);"></td>
			            		<?php if($_SESSION['ooyalaUser']['admin']||$_SESSION['ooyalaUser']['profile']==1) { ?>
			            		<!-- <td><a href="?section=editOoyala&embed_code=<?php echo $embed_code;?>">
							    <input type="button" value="Edit"></a></td>-->
							   
							    <?php } ?>							    
							    
							  
			            	</tr>
								
	            	<?php $i++;}} ?>
	            	<tr>
	            		<td>
	            			
				
          
        </section>

</div>
	</div>        
	<div class="logo-dfm"><img src="images/dfm-small-logo.gif" alt="dfm-small-logo" width="101" height="33" /></div>
    </body>  
</html>
