<?php
	include("connect.php");
		$id = $_GET['id'];
		
		$sql = "DELETE FROM ord WHERE id = '$id'";
		
		if($conn->query($sql)===TRUE)
		{
			header("Location: order.php");
		}
		else
		{
			echo "ERROR: " . $sql . "<br>" . $conn->error;
		}

?>