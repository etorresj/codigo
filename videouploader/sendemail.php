<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <title>Untitled</title>
       
    </head>
    
<body>

<div style='width:600px; margin:0px auto;'>
	<?php echo $_SESSION['ooyalaUser']['userL'];?> user has just uploaded a new video to your account: 
	
	<br><br>
	Title:
	<br><?php echo $title;?> 
	
	<br><br>
	About:
	<br><?php echo $description;?>.
	
	<br><br>
	You can publish the video to your site with any of  the following tags:
	<br><br>
	
<?php foreach ($players->items as $value) { 
									foreach($propertycode as $propertyc) {
								       
								    
										$pid=$value->id;
										$p=$value->name;
										if($p == "Default Player"){
									?>				
										<code>
						
											Article
											<br /><br />
											&lt;div id="dfmVideo" data-video-style="Article" data-video-label="Home" data-video-account="<?php echo $propertyc['property_code'];?>" data-video-contentid="<?php echo $embed_code?>" data-video-player="<?php echo $pid;?>"&gt;&lt;/div&gt;
											<br /><br />
											data-video-style=Article&data-video-label=Home&data-video-account=<?php echo $propertyc['property_code'];?>&data-video-contentid=<?php echo $embed_code?>&data-video-player=<?php echo $pid;?>		
											<br /><br />
											
											Custom 
											<br /><br />
											&lt;div id="dfmVideo" data-video-style="Custom-1000x645" data-video-label="Home" data-video-account="<?php echo $propertyc['property_code'];?>" data-video-contentid="<?php echo $embed_code?>" data-video-player="<?php echo $pid;?>"&gt;&lt;/div&gt;	
											<br /><br />
											data-video-style=Custom-1000x645&data-video-label=Home&data-video-account=<?php echo $propertyc['property_code'];?>&data-video-contentid=<?php echo $embed_code?>&data-video-player=<?php echo $pid;?>			
										 <br/>
										</code>
										
										
										
									<?php }}} ?>

</div>


</body>
</html>
