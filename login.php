<?php

  ob_start();
  session_start();
	include("connect.php");

  if(isset($_SESSION['username']))
  {
    header("Location: index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
      <a class="navbar-brand"  href="index.php"><img src="pic/logo.png" style="width:15%"> </a>
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
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>        
        </li>
        <li><a href="register.php"><span class="glyphicon glyphicon-register"></span> Register</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- End -->
<!-- LOGIN -->
	<h1 style="color:red" align="center">LOGIN</h1>
	<form method="POST" action="" >
    	<table align="center" style="color:black;" bgcolor="#CCCCCC">
    		<tr>
            	<td>
                ID <br /> <br />
                Password <br /> <br />
              </td>
              <td>
                <input type="text" name="user" id="user" /> <br /> <br />
                <input type="password" name="pass" id="pass" /> <br /> <br />
              </td>
            </tr>
            <tr align="right">
            	<td colspan="2">
            		<input type="submit" name="login" id="login" value="Login" />
               	</td>
            </tr>
          </table>
    </form>
    <?php
		if(isset($_POST['login']))
		{
			$user = $_POST['user'];
			$pass = $_POST['pass'];

      $sql = "SELECT name FROM admin WHERE user = '$user' and pass = '$pass'";
      $kq = $conn->query($sql);
      $data = mysqli_fetch_assoc($kq);
      $name = $data['name'];
      if($data)
      {
        $_SESSION['username']=$name;
        echo $_SESSION["username"];
        header("Location: admin.php");
      }
      else
      {
  			$sql = "SELECT user,name FROM register WHERE user = '$user' and pass = '$pass'";
  			$kq = $conn->query($sql);
  			$data = mysqli_fetch_assoc($kq);
  			$name = $data['name'];
        $iduser = $data['user'];
  		  if ($data) 
        {
          $_SESSION["id_user"]=$iduser;
          $_SESSION["username"]=$name;
          echo $_SESSION["username"];
          header("Location: items.php");
        }
  			  else
  			  {
  				echo "<h4 style='color: red;'>Sai tài khoản hoặc mật khẩu! Vui lòng nhập lại!</h4>";
  			  }
      }
		}

      ?>      
  
<!-- END -->
</body>
</html>
