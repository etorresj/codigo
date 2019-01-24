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
	 

	 				<?php if($results->id) { ?>
                    <br>
                        <div class="success">Label <?php echo $titulo; ?> has been created</div>
                   <br>
                    <?php } ?>
	
	<form action="" method="post" enctype="multipart/form-data"> 
		<table>		
			<tr>
				<td><strong>Create new label in Ooyala:</strong></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td><strong>Select Property</strong></td>
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
     </td></tr>
     </table>
     
     
     
     
 </div>
	</div> 
	<div class="logo-dfm"><img src="images/dfm-small-logo.gif" alt="dfm-small-logo" width="101" height="33" /></div> 
	</body>
</html>