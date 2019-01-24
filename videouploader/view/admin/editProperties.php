
<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/admin/adminStyle.css"/>
        <script type="text/javascript" src="js/admin/main.js"></script>
        <! style >
		<link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Video Uploader Admin</title>
    </head>
 
    <body>
 
 <div id="wrapper-uploader">
	<div class="watermark">
		<div class="wrapper-header">
			<div class="gray-bar"></div>
			<div class="menu-bar">
				<?php include "view/admin/menu.php"; ?>
			</div>
			<div class="fixFloat"></div>
		</div>
		<div class="wrapper-content">
		<!-- Place the content between -->
		<!-- And here -->
 
        <section>        
            <article>
             
                 <br>
                
                <form action="?section=adminEditProperties" method="post">
                    <table align="center" width="99%">
                         <?php if($success==1) { ?>
                    <tr>
                        <th colspan="2" class="success">Property <?php echo $property_name; ?> edited</th>
                    </tr>
                    <?php } 
                        if($success==2) { ?>
                    <tr>
                        <th colspan="2" class="errorS">Property <?php echo $property_name; ?> already exists in the middleware</th>
                    </tr>
                    <?php } 
                    ?>
                       <tr>
                            <th colspan="2">Edit Property</th>
                        </tr>
                        <tr class="tdgray">
                            <td >Property:</td>
                            <td>
                                <input type="text" id="property_name" name="property_name" value="<?php echo $property[0]['property_name'];?>">
                                <?php if($errorName) echo "<span class='error'>The property must contain a minimum of 1 character</span>"; ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td >Api key:</td>
                            <td>
                                <input type="text" id="apikey" name="apikey" value="<?php echo $property[0]['apikey'];?>">
                            </td>
                        </tr>
                      
                      <tr class="tdgray">
                            <td >Secret:</td>
                            <td>
                                <input type="text" id="apisecret" name="apisecret" value="<?php echo $property[0]['apisecret'];?>">
                            </td>
                        </tr>
                      
                        <tr>
                            <td>Group:</td>
                            <td>
                                <select id="group" name="group">
                                    <?php foreach($groups as $group) { 
                                        $selected=$property[0]['fkgroup']==$group['idGroup']?"selected='selected'":""; ?>
                                    <option value="<?php echo $group['idGroup'];?>" <?php echo $selected; ?>><?php echo $group['group_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="id" id="id" value="<?php echo $property[0]['idProperty'];?>">
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit">
                            </td>
                        </tr>
                    </table>
                </form>
                
            </article>
        </section>
 
		</div>
	</div>
 </div>
 <div class="logo-dfm"><img src="images/dfm-small-logo.gif" alt="dfm-small-logo" width="101" height="33" /></div>
    </body> 
</html>