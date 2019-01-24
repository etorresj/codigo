<html>
<head>
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
	 			

        
        
	<form action="" method="post" enctype="multipart/form-data"> 
		<table>		
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><strong>Create new Playlist:</strong></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td colspan="2"><strong>Add videos to playlist:</strong>
					<input type="hidden" name="property" value="<?php echo $_POST['propertyId'] ?>"></td>
			</tr>
			<?php 
			if($videos)
			foreach($videos as $video) {?>	
			<tr>
				<td colspan="2"><input type="checkbox" name="option[]" value="<?php echo $video['embed_code']; ?>"> <?php echo $video['title']; ?></td>
			</tr>
			<?php } ?>
			<?php /*foreach ($assets->items as $value) { ?>	
			<tr>
				<td colspan="2"><input type="checkbox" name="option[]" value="<?php echo $value->embed_code; ?>"> <?php echo $value->name; ?></td>
			</tr>
			<?php } */?>
			<tr>
				<td><input type="submit" value="Create"></td>
				<td></td>
			</tr>
			
		</table>
	
	</form>
	</body>
	<?php 
	//	echo "<br><pre>Results:<br>";		
	//	echo "Playlist nuevo";
	//	print_r($results);
	?>
</td></tr>
</table>
</div>
	</div> 
	<div class="logo-dfm"><img src="images/dfm-small-logo.gif" alt="dfm-small-logo" width="101" height="33" /></div>
</html>