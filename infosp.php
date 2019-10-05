<?php 
  session_start();
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Info Items</title>
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
        <li class="active"> <a href="items.php">Shop</a></li>
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

	<div class="container"> 
		<div class="row">
    		<?php
    			include("connect.php");
    			$id = $_GET['id'];
    			$sql = "SELECT * FROM items WHERE id = '$id' ";
          $result = $conn->query($sql);
        	while($row = $result->fetch_assoc())
        	{
        ?>
        	<div class="col-sm-6">
        		<p style="text-align: center; color: Blue; font-size: 35pt; border: solid 2px black; border-radius: 6px; "><?php echo $row['name']?></p> 
    	    	<hr> 
    	      	<img src="<?php echo $row['pic']?>" style="width:100%; height: 100%;">
      	  </div>
		    	<div class="col-sm-6" style="padding-left: 50px; color: black; font-size: 25pt; border: solid 2px black; margin: 100px 0 0 50px; width: 400px ">
           <form action="" method="POST" enctype="multipart/form-data" > 
                <p style="font-size: 30pt; color: Navy; text-align: center;">Information</p>
                <hr width="70%">
                <p>Colour: <?php echo $row['color']?></p>
                <p style="color: red;">Price: <?php echo $row['price']?></p>
                <p>Material: Leather</p>
                <p>Accessories: Box</p>
                <input type="submit" name="order" id="order" value="Order" style="font-size: 30pt; background: black; color: white; padding:; 10px;">
                <br> <br>
                </div>
            </form>
        	</div> 
        	<?php
          	}
        	?>
          <?php
            if(isset($_POST['order']))
            {
              $soluong = 1;
              $iduser = $_SESSION["id_user"];
              $sql0 = "SELECT * FROM items WHERE id = '$id'";
              $kq0 = mysqli_query($conn,$sql0);
              $data0 = mysqli_fetch_array($kq0);

              $name = $data0['name'];
              $price = $data0['price'];
              $color = $data0['color'];
              $link = $data0['pic'];

              
              $sql = "SELECT * FROM ord WHERE iduser = '$iduser' and id = '$id'";

              $kq = mysqli_query($conn,$sql);

              $data = mysqli_fetch_array($kq);
              $soluongcu = $data['qty'];
             
             if(count($data)>0)
             {
                $soluongcu++;
                $sql1 = "UPDATE ord SET qty = '$soluongcu' WHERE iduser = '$iduser' and id  = '$id'";
                $kq1 = mysqli_query($conn,$sql1);
                if($kq1)
                {
                  header("Location: order.php");
                }
             }

             else
              {

                $sql2 = "INSERT INTO ord(iduser,id,name,price,color,qty,pic) VALUES ('$iduser','$id','$name','$price', '$color', '$soluong', '$link')";
                $kq2 = mysqli_query($conn,$sql2);

                if($kq2)
                {
                  header("Location: order.php");
                }
              }
            }
          ?> 
		</div>
	</div>
</body>
</html>