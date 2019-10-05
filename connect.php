<?php
$servername ="localhost";
$username="root";  
$password="";
$db_name="ahbi";
$conn=mysqli_connect($servername,$username,$password,$db_name);
if($conn->connect_error)
{
	die("ERROR!".$conn->connect_error);
}

else
{
	mysqli_set_charset($conn,"utf8");
}

?>
