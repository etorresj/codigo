<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");

header("Location: admin.php?section=adminUsers");


require_once('view/admin/admin.php');
?>