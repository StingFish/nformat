<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login as Registrar first.');window.location='LC.php';</script>";
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
<style>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap');
body{
  transition: background-color .5s;
  background-image: url("assets/tmp2.png");
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

th {
  background-color: #04AA6D;
  color: white;
}
hov:hover{
 background-color: white;
}
.logo {
    width: 45px;
    top: 2px;
    left: 2px;
    position: absolute;
}

.alert {
  padding: 20px;
  background-color: #green;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
.loc{
    float: right;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  height: 30px;
  background-color: #5cb85c;
  color: white;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
@media screen and (max-width: 490px) {
  td{text-align: center;}
  td img{margin-left: 50px;margin-top:0px;}
  td p{margin-left: 20px;width: 100%;}
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}
</style>
</head>
<body style="overflow-y: auto;">
<header>
  <?php
  $db=mysqli_connect('localhost','root','','tests');
  $goo= $_SESSION['User'];
         $user_check_query = "SELECT * FROM tbl_accounts WHERE lname='$goo'";
         $result = mysqli_query($db, $user_check_query);
  ?>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php
    while ($row = mysqli_fetch_array($result)){
    echo '<center><img src="CvSU/logo-removebg.png" style="width:80%;margin-left:0px;border-radius:50%;"></center>';
 
  echo "<center><p style='margin-left:-10px;color:white;'>".$row['fname']." ".$row['mname']." ".$row['lname']."</p><p>".$row['email']."</p></center>";
   }
  ?>
  <form action="logout.php"> 
  <center><button type="submit" class="button button2" style="width:90%;">Log Out</button></center>
  </form>
</div>

<div class="topnav" id="myTopnav">
  <div>
  <a href="javascript:void(0);" onclick="openNav()"><img src="CvSU/logo-removebg.png" alt="logo" class="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['User']; ?></i></a>
</div>
</div>
</header>
<section>
<br>
<br>
<br>

<div class="yb-php" style="margin: 10px">
  <div class="container">
  <center><p style="  -webkit-backface-visibility: hidden;color: darkblue;font-weight: bolder;font-size: 45px;margin: 0;font-family: 'Oswald', sans-serif;">What's inside of it?</p></center>
  <br>
</div>
  <form>
    <table id="wrapper">
    <thead>
    <tr>
      <th style="display: none;">Head 1</th>
      <th style="display: none;">Head 2</th>
    </tr>
   </thead>
   <tbody>
    <tr onclick="window.location='storage/Employees Database/index.php';">
      <td  style="width:20%; padding: -10 -10px ;">
          <center>
          <div class='imgBx' style='border:none;'>
          <img src="CvSU/blue.png" style="width:200px;"></center></td>
      <td style="width:80%;"><b>Employee's Database</b><br><p>This is the place where you can input employee's profile and information. This is where the data of Academic Affairs and Administrative Officers. It contains critical information, such as each employee's personal information, It holds a variety of employee personnel fields such as name, age, job position, and year for the presentation of digital yearbook and the information are easily added by the registrars.</p></td>
    </tr> 
</div>
    <tr onclick="window.location='storage/Students Database/index.php';">
      <td  style="width:20%">
          <center>
          <div class='imgBx' style='border:none;'>
          <img src="CvSU/blue.png" style="width:200px;"></center></td>
      <td style="width:80%;"><b>Students Database</b><br><p>This is the place where you can input students profile and information. It contains basic information including student ID, full name, quotations, year, and contact information. This database is linked to all of the student's school preferences and the information are easily added by the registrars.</p></td>
    </tr>
    <tr onclick="window.location='storage/Milestones & Activities/path.php';">
      <td  style="width:20%">
          <center>
          <div class='imgBx' style='border:none;'>
          <img src="CvSU/blue.png" style="width:200px;"></center></td>
      <td style="width:80%;"><b>Milestones Database</b><br><p>This is the place where you can input pictures of every batch. This is where you can add desciptions to post memorable things in digital yearbook.</p></td>
    </tr>
    <tr onclick="window.location='storage/Extras Database/index.php';">
      <td  style="width:20%">
          <center>
          <div class='imgBx' style='border:none;'>
          <img src="CvSU/blue.png" style="width:200px;"></center></td>
      <td style="width:80%;"><b>Extra Database</b><br><p>This is the place where you can input title, color scheme, and message of every batch. This is where you can add desciptions to add it in digital yearbook.</p></td>
    </tr>
    <tr onclick="window.location='storage/EYearbook Database/path.php';">
      <td  style="width:20%">
          <center>
          <div class='imgBx' style='border:none;'>
          <img src="CvSU/blue.png" style="width:200px;"></center></td>
      <td style="width:80%;"><b>Employee's Yearbook Database</b><br><p>This is the place where you can see the employee's overall inputs from the databases. It contains data added from Administrative Officers & Academic Affairs.</p></td>
    </tr>
    <tr onclick="window.location='storage/SYearbook Database/path.php';">
      <td  style="width:20%">
          <center>
          <div class='imgBx' style='border:none;'>
          <img src="CvSU/blue.png" style="width:200px;"></center></td>
      <td style="width:80%;"><b>Alumni Yearbook Database</b><br><p>This is the place where you can see the alumni's overall inputs from the databases. It contains data added from Alumni Graduates.</p></td>
    </tr>
  </tbody>
  </table>
</form>
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
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>