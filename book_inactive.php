<?php session_start(); if($_SESSION['user_id']) : ?>
<?php 
	include_once('../classes/Database.php');
	$db = new Database();
	$id = $_GET['id'];
	$sql = "UPDATE books SET active='0' WHERE id='$id' ";
	//UPDATE `admin` SET active='1' WHERE id='7'   
	$db->active($sql);
	header("Location: book_list.php");  
?>
<?php else: echo "<script>window.location.href = 'login.php'; </script>";  endif; ?>  