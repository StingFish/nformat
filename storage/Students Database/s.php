<?php

session_start();
if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='LC.php';</script>";
    }
    else{
    isset($_SESSION['User']);
}

$mysqli = mysqli_connect('localhost', 'root', '', 'tests');

if(isset($_POST['save2'])){
	$id= $_POST['id'];
	$ln= $_POST['lname'];
	$fn= $_POST['fname'];
	$mn= $_POST['mname'];
	$role = $_POST['quo'];
	$year = $_POST['yr'];

	$check = "SELECT * from folder2 WHERE type = 'B' and year = '$year'";
	$get = mysqli_query($mysqli, $check);
	$fetch = mysqli_fetch_assoc($get);
	if (empty($fetch)) {
		echo "<script>alert('Create a School Year for this batch in Alumni Yearbook Database.');window.location='index.php';</script>";
	}
	else{
	$my = "INSERT INTO tbl_sybook (sid, slname, sfname, smname, quotes, school_year) VALUES ('$id', '$ln', '$fn', '$mn', '$role', '$year')";
	$result = mysqli_query($mysqli, $my);
	echo mysqli_error($mysqli);

	echo "<script>alert('Added to Yearbook Successfully.');window.location='index.php';</script>";
	}
}

if (isset($_POST['cancel'])) {
	header("Location: index.php");
}