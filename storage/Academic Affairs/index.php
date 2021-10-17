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
<title>Item</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="assets/base.css">
<link rel="stylesheet" href="sty1.css">

<link rel="shortcut icon" href="CvSU/logo-removebg.png">

<style>
body{
  background-image: url("assets/tmp2.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.logo {
    width: 45px;
    top: 2px;
    left: 2px;
    position: absolute;
}
@media only screen and (max-width: 760px){
  tfoot tr{
  visibility: hidden;
  display: none;
          }
  }
</style>
</head>
<body>
<?php 
        $db = mysqli_connect('localhost', 'root', '', 'yearbook');
        $year = date("Y");

        if (isset($_GET['call'])) {
        $Ys= mysqli_real_escape_string($db, $_GET['call']);  

        $sql = "SELECT * FROM tab2 WHERE year='$Ys' ORDER BY lname";
        $result = mysqli_query($db,$sql);
        $rows = mysqli_num_rows($result);
      }
        ?>
<div class="topnav" id="myTopnav">
  <div>
  <a href="#"><img src="CvSU/logo-removebg.png" alt="logo" class="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;202000001</i></a>
</div>
  <a href="http://localhost/nformat/storage.php">Storage Files</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">About History</a>
      <a href="#">About Us</a>
    </div>
  </div> 
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<br>
<br>
<br>
<form style="float:left">
  <input type="text" name="f1">
</form>
<br>
<center>
  <table id="wrapper">
    <thead>
    <tr>
      <th>Image</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Middle Initial</th>
      <th>Position</th>
      <th>Year</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Image</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Middle Initial</th>
      <th>Position</th>
      <th>Year</th>
    </tr>
  </tfoot>
  <tbody>
    <?php
                  if (empty($rows)) {
          echo "<tr>";
          echo "<td colspan='6'><center>No results found.</center></td>";
          echo "</tr>";
          }
          else{
          while($row = mysqli_fetch_array($result)){
          echo "<tr>";
          echo "<td data-label='Image'><center>".'<img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" style="height:80px;"/>'."</center></td>";
          echo "<td data-label='Last Name'>" . $row['lname'] . "</td>";
          echo "<td data-label='First Name'>" . $row['fname'] . "</td>";
          echo "<td data-label='Middle\tInitial'>" . $row['mname'] . "</td>";
          echo "<td data-label='Position'>" . $row['position'] . "</td>";
          echo "<td data-label='Year'>" . $row['year'] . "</td>";
          echo "</tr>";
        }
      }
          echo "</tbody>";
          echo "</table>";
          echo "<br>";
        mysqli_close($db);
        ?>
  </tbody>
  </table>
</div>
</center>
<br>
<br>

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
