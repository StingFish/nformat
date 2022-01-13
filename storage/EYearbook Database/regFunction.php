<?php 
session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='../../landpage.php';</script>";
    }
    else{
    isset($_SESSION['Use']);
    isset($_SESSION['User']);
}
$mysqli = new mysqli('localhost', 'root', '', 'tests') or die(mysqli_error($mysqli));

#delete btn(new)

if(isset($_GET['editan'])){
	$EMAIL = $_GET['editan'];
  $Yrr = $_SESSION['Use'];
	$mysqli->query("DELETE FROM tbl_eybook WHERE eid = '$EMAIL' AND employee_year = '$Yrr'") or die($mysqli->error());
  header("Location: index.php");
}
?>
