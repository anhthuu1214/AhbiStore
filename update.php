<?php
	session_start();
	include 'connect.php';
	if(isset($_GET['cong']))
	{
		$id = $_GET['id'];
		$iduser = $_SESSION["id_user"];
		$sql = "select * from ord where iduser = '$iduser' and id = '$id'";

	    $kq = mysqli_query($conn,$sql);

	    $data = mysqli_fetch_array($kq);
	    $soluongcu = $data['qty'];

	    $soluongcu++;
		$sql1 = "update ord set qty = '$soluongcu' where iduser = '$iduser' and id  = '$id'";
	    $kq1 = mysqli_query($conn,$sql1);
	    if($kq1)
	    {
	      header("Location: order.php");
	    }
	}

	if(isset($_GET['tru']))
	{
		$id = $_GET['id'];
		$iduser = $_SESSION["id_user"];
		$sql = "select * from ord where iduser = '$iduser' and id = '$id'";

	    $kq = mysqli_query($conn,$sql);

	    $data = mysqli_fetch_array($kq);
	    $soluongcu = $data['qty'];

	    $soluongcu--;
		$sql1 = "update ord set qty = '$soluongcu' where iduser = '$iduser' and id  = '$id'";
	    $kq1 = mysqli_query($conn,$sql1);
	    if($kq1)
	    {
	      header("Location: order.php");
	    }
	}
	
	if($_GET['buy'])
	{
		$iduser = $_SESSION["id_user"];

		$sql = "delete from ord where iduser = '$iduser'";

	    $kq = mysqli_query($conn,$sql);

		if($kq)
	    {
	      header("Location: index.php");
	    }
	}

?>