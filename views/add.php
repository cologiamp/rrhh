<?php 
session_start();
if(empty($_SESSION)) {
	header("Location: index.php"); 	
}
?>

<?php
	include_once('views/head.php');
	include_once('views/navbar.php');
?>

adding form here

<?php
	include_once('views/footer.php');
?>
