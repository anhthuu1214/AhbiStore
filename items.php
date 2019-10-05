<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
<!-- Content -->
<div class="container text-center">
  <div class="row">
        <?php
          include("connect.php");

          $sotin1trang = 9;

          $sql = "select count(*) from items";

          $kq = mysqli_query($conn,$sql);

          $data = mysqli_fetch_array($kq);

          $tongsobangghi = $data['count(*)'];

          $tongsotrang = ceil($tongsobangghi/$sotin1trang);

          if(isset($_GET['page']))
          {
            $trang = $_GET['page'];
          }

          else
          {
             $trang = 1;
          }


          $limit = ($trang - 1)*$sotin1trang;

          $sql = "SELECT * FROM items limit $limit,$sotin1trang";
          $result = $conn->query($sql);
          $i=1;
          while($row = $result->fetch_assoc())
          {
            ?>
            <div class="col-sm-4" style="font-size: 15pt">
                <a href="infosp.php?id=<?php echo $row['id'] ?>"> <img src="<?php echo $row['pic']?>" style="width:360px; height: 360px;" >
                <p style="color: white; background: black"><?php echo $row['name'] . " (" .$row['color'] . ")" ?>
                <br><?php echo $row['price']?> </p> </a>
            </div> 
            <?php
            $i++;
          }
          ?>

          <div class="col-sm-12" style="text-align: right;">
            <nav aria-label="Page navigation example">
              <ul class="pagination" style="background: black">

                <?php 

                  if($trang==1)
                  {
                    echo "<li class='page-item'><a class='page-link' href='#' style='display: none;'>Previous</a></li>";
                  }

                  else
                  {
                    echo "<li class='page-item'><a class='page-link' href='items.php?page=".($trang-1)."' style='display: inline;'>Prev</a></li>";
                  }


                  for ($i=1; $i <=$tongsotrang ; $i++)
                  { 
                    
                    echo "<li class='page-item'><a class='page-link' href='items.php?page=".$i."'>".$i."</a></li>";
                  }

                  if($trang==$tongsotrang)
                  {
                    echo "<li class='page-item'><a class='page-link' href='#' style='display: none;'>Next</a></li>";
                  }

                  else
                  {
                    echo "<li class='page-item'><a class='page-link' href='items.php?page=".($trang+1)."' style='display: inline;'>Next</a></li>";
                  }

                ?>
              </ul>
            </nav>
          </div>
  </div>
</div>

<!-- End -->
<!-- Create Footer -->
<footer class="container-fluid text-center" style="background: black; color: white; text-align: center;">
  Design by Anhthuu <br>
  ID: 1630010103 -  Contact: 035 664 9059
</footer>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<!-- End -->
</body>
</html>