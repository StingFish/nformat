<?php
$mysqli = new mysqli('localhost','root','','yearbook') or die(mysqli_error($mysqli));

if(isset($_POST['save2'])){
	$id= $_POST['id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$password = $_POST['pos'];
	$year = $_POST['yr'];

	$mysqli->query("UPDATE tab3 SET fname='$fname', mname='$mname', lname='$lname', position='$password', year='$year' WHERE id='$id'") or die($mysqli->error());
	echo "<script>alert('Edit Successfully!');window.location='index.php';</script>";
}

if (isset($_POST['cancel'])) {
	header("Location: index.php");
}