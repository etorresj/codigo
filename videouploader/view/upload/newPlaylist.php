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
	 			
	<?php if($_GET['success']) { ?>
                    <br>
                        <div class="success">Playlist <?php echo $_GET['success']; ?> has been created</div>
                   <br>
                    <?php } ?>
        
        
	<form action="?section=newPlaylistB" method="post" enctype="multipart/form-data"> 
		<table>		
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><strong>Select Property:</strong></td>
				<td>
					<select name="propertyId">
				<?php foreach($properties as $property) { ?>
                	<option value="<?php echo $property['idProperty'];?>"><?php echo $property['property_name']; ?></option>
                <?php } ?>
			</select>
				</td>
			</tr>
			
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