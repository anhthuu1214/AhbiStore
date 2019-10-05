<?php
	include("connect.php");
		$id = $_GET['id'];
		
		$sql = "DELETE FROM items WHERE id = '$id'";
		
		if($conn->query($sql)===TRUE)
		{
			header("Location: admin.php?id=2");
		}
		else
		{
			echo "ERROR: " . $sql . "<br>" . $conn->error;
		}

?>