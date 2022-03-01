<?php

session_start();
if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='../../landpage.php;</script>";
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
	$role = $_POST['roles'];
	$dep = $_POST['pos'];
	$year = $_POST['yr'];

  $queryfilter = "SELECT * FROM tbl_eybook WHERE eid='$id' AND employee_year = '$year'";
  $query = mysqli_query($mysqli, $queryfilter) or die(mysqli_error($mysqli));
  $fetchRow = mysqli_num_rows($query);

  if($fetchRow >= 1){
    echo "<script>alert('Unable to add meron na sya sa table.');window.location='index.php';</script>";
  }else{
  	$check = "SELECT * FROM folder2 WHERE type = 'A' AND year = '$year'";
  	$get = mysqli_query($mysqli, $check);
  	$fetch = mysqli_fetch_assoc($get);
  	if (!$fetch) {
  		echo "<script>alert('Create a School Year for this batch in Employees Yearbook Database.');window.location='index.php';</script>";
  	}
  	else{
  	$my = "INSERT INTO tbl_eybook (eid, elname, efname, emname, work_status, department, employee_year) VALUES ('$id', '$ln', '$fn', '$mn', '$role', '$dep', '$year')";
  	$result = mysqli_query($mysqli, $my);
  	echo mysqli_error($mysqli);

  	echo "<script>alert('Added to Yearbook Successfully.');window.location='index.php';</script>";
    }
  }
}

if (isset($_POST['cancel'])) {
	header("Location: index.php");
}
