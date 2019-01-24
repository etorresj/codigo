
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
                <table align="center" width="99%">
                    <?php if($success==1) { ?>
                    <tr>
                        <th colspan="6" class="success">Property <?php echo $property_name; ?> added</th>
                    </tr>
                    <?php } 
                        if($success==2) { ?>
                    <tr>
                        <th colspan="6" class="errorS">Property <?php echo $property_name; ?> already exists in the middleware</th>
                    </tr>
                    <?php } 
                        if($success==3) { ?>
                    <tr>
                        <th colspan="4" class="success">Property <?php echo $propertyName; ?> deleted</th>
                    </tr>
                    <?php } 
                    ?>
                    <tr>
                        <th colspan="4">Properties list</th>
                    </tr>
                    <tr>
                        <th>Property</th>
                        <th>Api Key</th>
                        <th>Secret</th>
                        <th>Group</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    
                        <?php foreach($properties as $property) { 
                                $class=$class=="tdgray"?"":"tdgray";
                                
                                echo "<tr class='".$class."'>";
                                echo "<td>".$property['property_name']."</td>";
                                echo "<td>".$property['group_name']."</td>";
                                echo "<td>".$property['apikey']."</td>";
                                echo "<td>".$property['apisecret']."</td>";
                                echo '<td align="center" class="pointer" onclick="javascript:window.location.href =\'?section=adminEditProperties&id='.$property['idProperty'].'\'">Edit</td>';
                                echo '<td align="center" class="pointer" onclick="confirmDelete(\''.$property['property_name'].'\', \''.$property['idProperty'].'\', \'properties\');">Delete</td>';
                                echo "</tr>";

                         } ?>

                </table>
 <br>
                <form action="?section=adminProperties" method="post">
                    <table align="center" width="99%">
                       <tr>
                            <th colspan="2">Add Property</th>
                        </tr>
                        <tr class="tdgray">
                            <td >Property:</td>
                            <td>
                                <input type="text" id="property_name" name="property_name" value="<?php echo $username?$username:'';?>">
                                <?php if($errorName) echo "<span class='error'>The property must contain a minimum of 1 character</span>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Api Key:</td>
                            <td>
                                <input type="text" name="apikey">
                            </td>
                        </tr>
                        <tr class="tdgray">
                            <td>Secret:</td>
                            <td>
                                <input type="text" name="apisecret">
                            </td>
                        </tr>
                      
                        <tr>
                            <td>Group:</td>
                            <td>
                                <select id="group" name="group">
                                    <?php foreach($groups as $group) { ?>
                                    <option value="<?php echo $group['idGroup'];?>"><?php echo $group['group_name']; ?></option>
                                    <?php } ?>
                                </select>
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