<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>
<!-- Create Menu -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand"  href="#"><img src="pic/logo.png" style="width:15%"> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="About.php">About</a></li>
        <li> <a href="admin.php">Shop</a></li>
      <li>
          <a href="#"><input type="text" name="search" placeholder="search..."/></a>
        </li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a>
        </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- End -->
<?php
  include("connect.php");
  $id = $_GET['id'];
  $sql = "SELECT * FROM items WHERE id = '$id'";
  $result = $conn->query($sql);
  $kq = mysqli_fetch_assoc($result);
?>
		<form action="" method="post" enctype="multipart/form-data">
        <table align="center">
    				<h2 style="text-align:center"><b>Information Items</b></h2>
            <tr>
              <td>Code:</td>
              <td><input type="text" name="id" id="id" value="<?php echo "$id"; ?>"></td>
            </tr>
            <tr>
              <td>Name:</td>
              <td><input type="text" name="name" id="name" value="<?php echo $kq['name']; ?>"></td>
            </tr>
            <tr>
              <td>Price:</td>
              <td><input type="text" name="price" id="price" value="<?php echo $kq['price']; ?>"></td>
            </tr>
            <tr>
              <td>Colour:</td>
              <td><input type="text" name="color" id="color" value="<?php echo $kq['color']; ?>"></td>
            </tr>
            <tr>
              <td>Qty:</td>
              <td><input type="text" name="qty" id="qty" value="<?php echo $kq['qty']; ?>"></td>
            </tr>
            <tr>
              <td>Pic: <img src="<?php echo $row['pic'];?>" width="100px" /></td>
              <td><input type="file" name="fileUpload" id="fileUpload" value="<?php echo $kq['pic']; ?>"></td>
            </tr>
            <tr>
            	<td></td>
              <td><input type = submit id="edit" name="edit" value="Cập nhật"></td>
            </tr>
          </table>
        </form>
  <?php
    if(isset($_POST['edit']))
    {
		  include("connect.php");
		  $id = $_POST['id'];
      $name = $_POST['name'];
      $qty = $_POST['qty'];
      $price = $_POST['price'];
      $price = (double)$price;
      $color = $_POST['color'];
      $link = 'upload/' . $_FILES['fileUpload']['name'];
        
      $sql= " UPDATE items SET name = '$name', color = '$color', qty = '$qty', price = '$price', pic = '$link' WHERE id = '$id'";
        
        if($conn->query($sql) === TRUE)
        {
        	move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upload/'. $_FILES['fileUpload']['name']);
          echo "Sửa dữ liệu thành công";
			    header("Location:admin.php?id=2");
        }
        else
        {
        	echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  ?>
</body>
</html>