<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" media="all" href="css/upload/jsDatePick_ltr.css" />
	<script type="text/javascript" src="js/upload/jsDatePick.min.1.3.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="js/upload/main.js"></script>
	
	
	<! style >
	<link href="css/style.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript">
		window.onload = function(){
			new JsDatePick({
				useMode:2,
				target:"expire",
				dateFormat:"%Y-%m-%d",
			});
		};
	</script>
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





	 				<?php  if($success==1) { ?>
                    <br>
                                          
                        <div style="float:right; width:500px;">

	                        		<b><?php echo $_SESSION['ooyalaUser']['userL'];?></b> user has just uploaded a new video to your account: 
	
									<br><br>
									<b>Title:</b>
									<br><?php echo $title;?> 
									
									<br><br>
									<b>About:</b>
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
										
										 
										 <b>Article</b>
										 <br/><br/>
										 
										 &ltdiv id="dfmVideo" data-video-style="Article" data-video-label="Home" data-video-account="<?php echo $propertyc['property_code'];?>" data-video-contentid="<?php echo $embed_code?>" data-video-player="<?php echo $pid;?>"&gt&lt/div&gt	
										 <br/><br/>
										 
										 data-video-style=Article&data-video-label=Home&data-video-account=<?php echo $propertyc['property_code'];?>&data-video-contentid=<?php echo $embed_code?>&data-video-player=<?php echo $pid;?>			
										 <br/><br/>

										 <b>Custom 1000x645</b>
										 <br/><br/>	
										 
										 &ltdiv id="dfmVideo" data-video-style="Custom-1000x645" data-video-label="Home" data-video-account="<?php echo $propertyc['property_code'];?>" data-video-contentid="<?php echo $embed_code?>" data-video-player="<?php echo $pid;?>"&gt&lt/div&gt		
										 <br/><br/>	
										 
										 data-video-style=Custom-1000x645&data-video-label=Home&data-video-account=<?php echo $propertyc['property_code'];?>&data-video-contentid=<?php echo $embed_code?>&data-video-player=<?php echo $pid;?>			
										 <br/><br/>
										
									<?php }}} ?>
									                        
	                        
                        </div>
					<br>
                    <?php } ?>

                    <div id="loading_div" style="float:right; width:200px; margin:200px 10% 0px 0px; display:none">
                    <p align="center">	Uploading video<br><img src="images/16.GIF" alt="16" width="160" height="20"><br>Please wait</p>
                    </div>

                    
<form  enctype="multipart/form-data" id="videoForm" method="post"> 
	<table cellspacing="10">		
		<tr>
			<td colspan="2"><h3>Video: Choose file to upload</h3></td>
		</tr>
		<tr>
			<td colspan="2">Video Files: <input type="file" name="archive" id="archive"></td>
		</tr>
		
		<tr>
			<td colspan="2">Enter a title of the video. Viewers will be able to see this.</td>
		</tr>		
		<tr>
			<td><h3>Video Title</h3></td>
			<td><textarea name="titlename" id="titlename"></textarea></td>
		</tr>

			
		<tr>
			<td colspan="2">Enter a description of the video. Viewers will be able to see this.</td>
		</tr>
		<tr>
			<td><h3>Video Description</h3></td>
			<td><textarea name="description" id="description"></textarea></td>
		</tr>
		
		
		
		<tr>
			<td colspan="2">Total hours video should be live for</td>
		</tr>
		<tr>
			<td><h3>Expire this video</h3></td>
			<td><input type="text" name="expire" id="expire" readonly="readonly"></td>
		</tr>
		
		
		
		<tr>
			<td><h3>Select a preview Image</h3></td>
			<td><input type="file" name="prev_img" id="prev_img"></td>
		</tr>

		 		
		<tr>
			<td><h3>Select A Primary Category</h3></td>
			<td><select name="label1">
				<option value="News">News</option>
				<option value="Sports">Sports</option>
				<option value="Entertainment">Entertainment</option>
				<option value="Lifestyle">Lifestyle</option>
				<option value="Business">Business</option>
			</select></td>
		</tr>
		
		<tr>
			<td><h3>Select Additional Categories</h3></td>
			<td><select name="label2">
				<option value="News">News</option>
				<option value="Sports">Sports</option>
				<option value="Entertainment">Entertainment</option>
				<option value="Lifestyle">Lifestyle</option>
				<option value="Business">Business</option>
				<?php 
				if($labels)
				foreach($labels->items as $label) { 
					if($label->name == 'News' || $label->name == 'Sports' || $label->name == 'Entertainment' || $label->name == 'Lifestyle' || $label->name == 'Business' ){}else{
				?>
                	<option value="<?php echo $label->name;?>"><?php echo $label->name; ?></option>
                <?php }} ?>
			</select></td>
		</tr>
		
		<tr>
			<td><h3>Select Additional Categories</h3></td>
			<td><select name="label3">
				<option value="News">News</option>
				<option value="Sports">Sports</option>
				<option value="Entertainment">Entertainment</option>
				<option value="Lifestyle">Lifestyle</option>
				<option value="Business">Business</option>
				<?php 
				if($labels)
				foreach($labels->items as $label) { 
					if($label->name == 'News' || $label->name == 'Sports' || $label->name == 'Entertainment' || $label->name == 'Lifestyle' || $label->name == 'Business' ){}else{
				?>
                	<option value="<?php echo $label->name;?>"><?php echo $label->name; ?></option>
                <?php }} ?>
			</select></td>
		</tr>
		
		
		<tr>
			<td><h3>Select a property</h3></td>
			<td><select name="propertyId">
				<?php foreach($properties as $property) { ?>
                	<option value="<?php echo $property['idProperty'];?>"><?php echo $property['property_name']; ?></option>
                <?php } ?>
			</select></td>
		</tr>
		
		<tr>
			<td colspan="2"><h3>Upload Video To Ooyala</h3></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="hidden" name="type" value="newvideo"><input type="button" id="submit_btn" value="Upload Video" onClick="validateVideo();"></td>
		</tr>		
</table>
</form>	



		</div>
	</div>
</div>
<div class="logo-dfm"><img src="images/dfm-small-logo.gif" alt="dfm-small-logo" width="101" height="33" /></div>
</body>
</html>
