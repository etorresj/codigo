<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Website Title</title>
    </head>
 
    <body>
 
 <div id="wrapper">
	<div class="login-left"></div>
	<div class="login-right">
		<div class="login-box">
			<div class="label"><span>Login</span></div>
			<div class="login-form">
				<div class="dfm-logo"><img src="images/dfm-video-uploader.jpg" width="169" height="75"></div>
				<div class="form">
					<form action="" method="post" autocomplete="on">
						<input type="text" name="user" autofocus>
						<input type="password" name="password">
						<input type="submit" name="button" id="button" value="GO!">
					</form> 
				</div>
				<div class="fixFloat"></div>
				  <?php if ($error==1) 
                            echo "<div class='login-error'> Wrong Username or Password</div>";
                        else if($error==2)
                            echo "<div class='login-error'> Username and Password can't be empty</div> ";
                            ?>
			</div>
		</div>
	</div>
</div>
    </body> 
</html>