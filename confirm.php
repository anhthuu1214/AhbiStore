<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 800px) {
      .row.content {height: auto;} 
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
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="About.php">About</a></li>
        <li> <a href="items.php">Shop</a></li>
        <li> <a>
        	<form method="get" action="search.php">
        		<input type="text" name="search" placeholder="search..."/>
            </form> </a>
        </li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <?php 
            if(isset($_SESSION['username']))
            {
              if($_SESSION['username']=="admin")
              {
                echo "<li><a href='admin.php'><span class='glyphicon glyphicon-user'></span>".$_SESSION['username']."</a>        
              </li>";
              }

              else
              {
                echo "<li><a href='order.php'><span class='glyphicon glyphicon-log-in'></span>".$_SESSION['username']."</a>        
              </li>";
              }

              
              echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a>        
              </li>";
            }

          else
            {
              echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>        
              </li>";
              echo "<li><a href='register.php'><span class='glyphicon glyphicon-log-in'></span> Register</a>        
              </li>";
            }

         ?>
      </ul>
    </div>
  </div>
</nav>
<!-- End -->
<!-- Confirm -->
 <?php
    include("connect.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE id = '$id'";
    $result = $conn->query($sql);
    $kq = mysqli_fetch_assoc($result);
  ?>
  <div class="container text-center">
    <h2 style="text-align:center"><b>Confirm Your Order</b></h2>
    <div class="row">
      <div class="col-sm-12" id="noidung">

      <form action="" method="post" enctype="multipart/form-data">
         <table width="100%" border="1">
            <tr bgcolor="black" style="color: white;">
              <td>Code:</td>
              <td>Name:</td>
              <td>Price:</td>
              <td>Colour:</td>
              <td>Qty:</td>
              <td>Pic:</td>
            </tr>
            <?php
              include("connect.php");
              $sql = "SELECT * FROM items WHERE id = '$id'";
              $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $color = $_POST['color'];
            $qty = $_POST['qty'];
            $link = 'order/' . $_FILES['img']['name'];
              $result = $conn->query($sql);
           
              while($row = $result->fetch_assoc())
              {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['price'];?></td>
              <td><?php echo $row['color'];?></td>
              <td><input type="text" name="qty" id="qty" value="<?php echo "1" ;?>"></td>
              <td><img src="<?php echo $row['pic'];?>" width="100px" /></td>
            </tr>
             <?php
                }
              ?>  
        </table>
        <input type = submit id="conf" name="conf" value="Confirm" style=" text-align: center; font-size: 30pt; background: black; color: white; padding:; 10px;">
      </form>

         <?php
         if(isset($_POST['conf']))
          {
            include("connect.php");
            

            $sql = "INSERT INTO ord(id, name, price, color, qty, pic) VALUES ('$id', '$name', '$price', '$color', '$qty', '$link')";
            if($conn->query($sql) === TRUE)
            {
              echo "You have successfully ordered !";
              header("Location:order.php");
            }
            else
            {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
        ?>
    </div>
  </div>
</div>
<br>
<!-- END -->
</body>
</html>