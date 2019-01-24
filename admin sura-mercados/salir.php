<?php 
session_start();
unset($_SESSION['suraAdmin']);
header("Location: index.php");
?>