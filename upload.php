<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Items</title>
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
        <li> <a href="items.php">Shop</a></li>
        <li><a href="#">Contact</a></li>
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
?>
<!-- UPLOAD -->
   <h1 align="center" style="color:navy">Form UPLOAD </h1>
   <form action="" method="POST" enctype="multipart/form-data">
     <table align="center">
       	<tr>
            <td>Mã sản phẩm:<br> <br></td>
            <td><input type="text" name="id" id="id"><br> <br></td>
      	</tr>
        <tr>
            <td>Tên sản phẩm:<br> <br></td>
            <td><input type="text" name="name" id="name"><br> <br></td>
      	</tr>
      	<tr>
            <td>Giá:<br> <br></td>
            <td><input type="text" name="price" id="price"><br> <br></td>
        </tr>
        <tr>
            <td>Màu:<br> <br></td>
            <td><input type="text" name="color" id="color"><br> <br></td>
      	</tr>
        <tr>
            <td>Số lượng:<br> <br></td>
            <td><input type="text" name="qty" id="qty"><br> <br></td>
        </tr>
        <tr>
            <td>Hình<br> <br></td>
            <td><input type="file" name="img"/></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input type="submit" name="up" id="up" value="Upload" /></td>
        </tr>
       </table>
    </form>
			<?php
    if(isset($_POST['up']))
    {
      include("connect.php");
      $id = $_POST['id'];
      $name = $_POST['name'];
      $qty = $_POST['qty'];
      $price = $_POST['price'];
      $price = (double)$price;
      $color = $_POST['color'];

      $link = 'upload/' . $_FILES['img']['name'];
      echo $link; 
      $sql = "INSERT INTO items(id, name, price, color, qty, pic) VALUES ('$id', '$name', '$price', '$color', '$qty', '$link')";
        
        if($conn->query($sql) === TRUE)
        {
          move_uploaded_file($_FILES['img']['tmp_name'], 'upload/'. $_FILES['img']['name']);
          echo "Thêm dữ liệu thành công";
          //header("Location:admin.php");
        }
        else
        {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  ?>
  
<!-- END -->

</body>
</html>
