<?php session_start(); 
    unset($_SESSION['username']); // xóa session login
    header("Location: index.php");
?>
	