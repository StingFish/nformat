<?php

session_start();
if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='../../landpage.php';</script>";
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
	$sec = $_POST['sec'];
	$role = $_POST['quo'];
	$year = $_POST['yr'];

  $queryfilter = "SELECT * FROM tbl_sybook WHERE sid='$id'";
  $query = mysqli_query($mysqli, $queryfilter) or die(mysqli_error($mysqli));
  $fetchRow = mysqli_num_rows($query);

  if($fetchRow >= 1){
      echo "<script>alert('Unable to add meron na sya sa table.');window.location='index.php';</script>";
  }else{
	$check = "SELECT * FROM folder2 WHERE type = 'B' AND year = '$year'";
	$get = mysqli_query($mysqli, $check);
	$fetch = mysqli_fetch_assoc($get);
	if (!$fetch) {
		echo "<script>alert('Create a School Year for this batch in Alumni Yearbook Database.');window.location='index.php';</script>";
	}
	else{
	$my = "INSERT INTO tbl_sybook (sid, slname, sfname, smname, quotes, YrSec, school_year) VALUES ('$id', '$ln', '$fn', '$mn', '$role', '$sec', '$year')";
	$result = mysqli_query($mysqli, $my);
	echo mysqli_error($mysqli);

	echo "<script>alert('Added to Yearbook Successfully.');window.location='index.php';</script>";
	}
}
}

if (isset($_POST['cancel'])) {
	header("Location: index.php");
}
