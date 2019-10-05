<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order</title>
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
        <li><a href="index.php">Home</a></li>
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
                echo "<li class='active'><a href='order.php'><span class='glyphicon glyphicon-log-in'></span>".$_SESSION['username']."</a>        
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
<!-- UPLOAD -->
<div class="container text-center">
  <h2>Your Online Shopping Basket</h2>
  <div class="row">
    <div class="col-sm-12" id="noidung">
      <form action="" method="POST" enctype="multipart/form-data" > 
       <table width="100%" border="1">
            <tr bgcolor="black" style="color: white;">
              <td>CODE</td>
              <td>NAME</td>
              <td>COLOUR</td>
              <td>QTY</td>
              <td>PRICE</td>
              <td>PIC</td>
              <td colspan="2">ACT</td>
            </tr>
            <?php
              $iduser = $_SESSION["id_user"];
              $tong = 0;
              include("connect.php");
              $sql = "SELECT * FROM ord where iduser = '$iduser'";
              $result = $conn->query($sql);
              $i=1;
              while($row = $result->fetch_assoc())
              {
                $id = $row['id'];
                $qty = $row['qty'];
                $sql = "SELECT * FROM items WHERE id = '$id'";
                $kq = mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($kq);
                $price = $data['price']*$qty;
                $tong += $price;
              ?>
              <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['color'];?></td>
                <td>
                  <?php 

                    if($qty==1)
                    {
                      echo "<a href='update.php?tru=1&id=<?php echo $id; ?>' style='border: solid 1px black; display: none; width: 30px; height: 30px;'>
                    <p style='font-size: 15pt; text-align: center;'>-</p>
                  </a>";
                    }

                    else
                    {
                       echo "<a href='update.php?tru=1&id=".$id."' style='border: solid 1px black; display: inline-block; width: 30px; height: 30px;'>
                    <p style='font-size: 15pt; text-align: center;'>-</p>
                  </a>";
                    }

                   ?>
                   


                   <a href="" style="border: solid 1px black; display: inline-block; width: 30px; height: 30px">
                    <p style="font-size: 15pt; text-align: center;"><?php echo $qty; ?></p>
                  </a>
                
                  <a href="update.php?cong=1&id=<?php echo $id; ?>" style="border: solid 1px black; display: inline-block; width: 30px; height: 30px">
                    <p style="font-size: 15pt; text-align: center;">+</p>
                  </a>
                </td>
                <td><?php echo $price;?></td>
                <td><img src="<?php echo $row['pic']?>" style="width:150px" height="150px"></td>
                <td width="100"><a href="delord.php?id=<?php echo $row['id'];?>" style="font-size: 10pt; background: black; color: white; padding:; 10px;">DELETE</a></td>
              </tr>
              <?php
                $i++;

                }
              ?>
              <tr>
                  <td colspan="7" style="font-size: 20pt; text-align: right; color: navy;"><b>Total : <?php echo $tong;?></b></td>  
              </tr>
        </table> 
        <a href="update.php?datmua=1">
          <input type="submit" name="buy" id="buy" value="Buy" style="font-size: 30pt; background: black; color: white; padding:; 10px;"></a>
      </form>
       <?php
            if(isset($_POST['buy']))
            {

              echo  "<script> alert('You have successfully ordered !'); </script>";
            }
       ?>
    </div>
  </div>
</div>
<br>
<!-- END -->
<!-- Create Footer -->

<footer class="container-fluid text-center" style="background: black; color: white; text-align: center;">
  Design by Anhthuu <br>
  ID: 1630010103 -  Contact: 035 664 9059
</footer>
<script src="js/bootstrap.min.js"></script>
<!-- End -->
</body>
</html>
