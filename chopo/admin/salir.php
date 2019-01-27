<?php 
session_start();
unset($_SESSION['chopoAdmin']);
header("Location: index.php");
?>