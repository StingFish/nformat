<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Storage Files</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="assets/base.css">
<link rel="stylesheet" href="sty1.css">
<link rel="shortcut icon" href="styles/CvSU/logo-removebg.png">
<script src="styles/js/jquery-3.6.0.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<style>
body{
  background-image: url("assets/tmp4.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(odd){background-color: #f2f2f2}
tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color: yellow;}

th {
  background-color: #04AA6D;
  color: white;
}
.logo {
    width: 45px;
    top: 2px;
    left: 2px;
    position: absolute;
}
</style>
</head>
<body>
<header>
<div class="topnav" id="myTopnav">
  <div>
  <a href="#"><img src="CvSU/logo-removebg.png" alt="logo" class="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;202000001</i></a>
</div>
  <a href="http://localhost/nformat/storage.php" style="background-color: #333;color: white;">Storage Files</a>
  <div class="dropdown">
    <button class="dropbtn">Profile 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Account Info</a>
      <a href="logout.php">Logout</a>
    </div>
  </div> 
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</header>
<section>
<br>
<br>
<div class="yb-php">
  <div style="float:left;">
    <form action="" method="get">
     <?php
  $db=mysqli_connect('localhost','root','','filepaths');
  $goo= 2021;
         $user_check_query = "SELECT * FROM front ORDER BY filename";
         $result = mysqli_query($db, $user_check_query);

         while ($row = mysqli_fetch_array($result)){
            echo "<div class='container' style='float:left;'>";
            echo "<div class='imgBx' style='border:none;'>";
            echo '<a href="storage/'.$row["filename"].'/path.php"><img name="nooo" class="pic" src="CvSU/blue.png" style="width:280px;margin-left:20px;"/></a>';
            
            echo "<div class='contentt' style='margin-top: -30px;color:black;'>";
            echo "<center>".$row["filename"]."</center>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
      }
  ?>
</form>
</div>
   </div>
</section>
</body>
</html>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
