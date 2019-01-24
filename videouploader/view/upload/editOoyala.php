<!DOCTYPE HTML>
<html>
<head>
	<! style >
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script>
		<?php if(isset($_GET['up'])==1){ ?>
			alert('The video has been changed, wait a few minutes while it is processed.');
		<?php } ?>
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
	 
	 
	 				<?php if($success==1) { ?>
                    <br>
                        <div class="success">The <?php  echo $asset->name; ?> video has been edited</div>
                   <br>
                    <?php } ?>
	

	
	<form  method="post" enctype="multipart/form-data"> 
		<table  cellpadding="5" cellspacing="0" width="100%">			
			<tr>
				<td colspan="3">Change Video with same embed code</td>
			<tr>
			<tr>
				<td>File</td>
	            <td>
	            	<input type="hidden" value="<?php echo $asset->embed_code ?>" name="embed_code">
	            	<input type="hidden" value="video" name="type">
	            	<input type="file" name="archive" id="archive">
	            </td>
	            <td><input type="submit" value="Change video"></td>
			<tr>
			
			<tr>
				<td><strong>Name<strong></td>
				<td><?php echo $asset->name ?></td>
				<td></td>
			</tr>
			<tr>
				<td><strong>Preview_image<strong></td>
	            <td><img src="<?php echo $asset->preview_image_url?>" width="100"></td>
	            <td></td>
			</tr>
		</table>
	</form>
	</div>
	</div>
	</div>
	<div class="logo-dfm"><img src="images/dfm-small-logo.gif" alt="dfm-small-logo" width="101" height="33" /></div>
	</body>
</html>
