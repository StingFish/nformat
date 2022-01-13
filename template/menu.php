<?php
//kemero
    session_start();

    if(!isset($_SESSION['User3']))
    {
      echo "<script>alert('You must login as Student first.');window.location='../landpage.php';</script>";
    }
    isset($_SESSION['User3']);
    isset($_SESSION['Users3']);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Menu</title>
  <link rel="stylesheet" href="styles/reset.min.css">
<link rel='stylesheet' href='https://fonts.gstatic.com'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&amp;display=swap'><link rel="stylesheet" href="styles/s1.css">
<style>
  body{
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  background-image: url("CvSU/quad2.jpg");
  }
</style>
</head>
<body>
<main>
	<a href="main.php" style="text-decoration: none;"><button><span>My Yearbook</span></button></a>
  <a href="me.php" style="text-decoration: none;"><button><span>&nbsp;&nbsp;&nbsp;About Me&nbsp;&nbsp;&nbsp;</span></button></a>
	<a href="index.php" style="text-decoration: none;"><button>Job Hirings&nbsp;&nbsp;</button></a>
	<a href="../logout3.php" style="text-decoration: none;"><button>&nbsp;&nbsp;&nbsp;Sign Out&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
</main>
  
</body>
</html>
