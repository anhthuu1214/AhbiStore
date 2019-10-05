<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
      <li> <a>
        	<form method="get" action="search.php">
        		<input type="text" name="search" placeholder="search..."/>
            </form> </a>
        </li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li class="active"><a href="register.php"><span class="glyphicon glyphicon-register"></span> Register</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- End -->

<!-- REGISTER -->
	<form action="" method="POST">
    <h1 style="color:red" align="center"> Form REGISTER</h1>
		<table align="center" style="color:black">
      <tr>
          <td>
          	Username <br /><br />
          </td>
          <td>
          	<input type="text" name="user" id="user" /> <br /><br />
          </td>
      </tr>
      <tr>
      	<td>
              D.O.B <br /><br />
          </td>
          <td>
          	 <input type="date" name="dob" id="dob" /> <br /><br />
          </td>
      </tr>
      <tr>
      	<td>
          	 Password <br /><br />
          </td>
          <td>
          	<input type="password" name="pass" id="pass" /><br /><br />
          </td>
      </tr>
      <tr>
      	<td>
          	Confirm Password <br /><br />
          </td>
          <td>
          	 <input type="password" name="pass2" id="pass2" /><br /><br />
          </td>
      </tr>
      <tr>
      	<td>
          	Sex <br /><br />
          </td>
          <td>
          	 <input type="radio" name="male" id="sex" />Male
              <input type="radio" name="male" id="sex" />Female<br /><br />
          </td>
      </tr>
      <tr>
      	<td>
          	Email <br /><br />
          </td>
          <td>
          	 <input type="email" name="email" id="email" /><br /><br />
          </td>
      </tr>
      <tr>
      	<td>
          	Phone <br /><br />
          </td>
          <td>
          	<input type="text" name="phone" id="phone" /><br /><br />
          </td>
      </tr>
      <tr>
          <td colspan="2" align="right">
          	<input type="submit" name="send" id="send" value="Send" /><br />
          </td>
      </tr> 
    </table>
  </form>
    <br>
    <?php
      include("connect.php");
      if(isset($_POST['send']))
      {
        $user = $_POST['user'];
        $dob = $_POST['dob'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sql = "INSERT INTO register (user, pass, dob, phone, email) VALUES ('$user', '$pass', '$dob', '$phone', '$email')";
        if($conn->query($sql) === TRUE)
        {
          echo "Đăng ký thành công !";
          header("Location: login.php");
        }
        else
       {
           echo "Tài khoản đã tồn tại " . $sql . "<br>" . $conn->error;
       }
      }
      ?>
<!-- END -->
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