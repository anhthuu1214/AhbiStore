<!DOCTYPE html>
<html lang="en">
<head>
  <title>List items</title>
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

  <script src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){

        $("#search").keyup(function(){
          var timkiem = $("#search").val();
          $.ajax({
          url: 'xuly.php',
          data: {type: "search",timkiem: timkiem},
          type: 'POST',
          dataType: 'html'
          }).done(function(data) {
             $("#noidung").html(data);
        });
        })
          

      })

  </script>
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
        <li style="margin-top: 15px;">
            <input type="text" name="search" id="search" placeholder="search..."/>

        </li>
      </ul>


      <ul class="nav navbar-nav navbar-right">
      	<li class="active"><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a>
        </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- End -->

<!-- UPLOAD -->
<div class="container text-center">
  <p style="background-color: black; font-family: fantasy; font-size: 30pt; color: white;">LIST OF ITEMS IN STOCK</h2>
  <div class="row">
    <div class="col-sm-12" id="noidung">
          <a href="upload.php" style="font-size: 20pt; background: gray; color: white; padding: 10px 40px;">ADD ITEMS</a>
          <p>
          <table width="100%" border="1" style="font-size: 20pt">
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
              include("connect.php");
              $sql = "SELECT * FROM items";
              $result = $conn->query($sql);
              $i=1;
              while($row = $result->fetch_assoc())
              {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['color'];?></td>
              <td><?php echo $row['qty'];?></td>
              <td><?php echo $row['price'];?></td>
              <td><img src="<?php echo $row['pic'];?>" width="100px" /></td>
              <td width="100"><a href="edit.php?id=<?php echo $row['id'];?>" style="font-size: 20pt; background: gray; color: white; padding: 20px;">EDIT</a></td>
              <td width="100"><a href="delsp.php?id=<?php echo $row['id'];?>" style="font-size: 20pt; background: gray; color: white; padding: 20px;">DELETE</a></td>
            </tr>
              <?php
                $i++;
                }
              ?> 
          </table>
          
      </div>
  </div>
</div>
<br>
<!-- END -->
<!-- Create Footer -->

<footer class="container-fluid text-center" style="background: black; color: white; text-align: center;">
  Design by Anhthuu <br>
  ID: 1630010103 - Contact: anhthuu1214@gmail.com
</footer>
<script src="js/bootstrap.min.js"></script>
<!-- End -->
</body>
</html>
