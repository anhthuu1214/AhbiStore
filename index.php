<?php 

  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index</title>
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
      background-color: black;
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
      color: white;
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
                echo "<li><a href=''><span class='glyphicon glyphicon-log-in'></span>".$_SESSION['username']."</a>        
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

<!-- Create Carousel -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="pic/cross-gray-2.jpg" alt="Image" style="width:50%">
        <div class="carousel-caption">
          <p>BEST SELLER</p>
        </div>      
      </div>

      <div class="item">
        <img src="pic/cross-blackred.jpg" alt="Image" style="width:50%">
        <div class="carousel-caption">
          <p>BEST SELLER</p>
        </div>      
      </div>
      
      <div class="item">
        <img src="pic/box-black-1.jpg" style="width:50%">
        <div class="carousel-caption">
          <p>NEW ITEMS</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
 
<!-- End -->

<!-- Create Text -->
  
<div class="container text-center">    
 
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
