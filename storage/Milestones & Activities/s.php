<?php

session_start();
if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='../../LC.php';</script>";
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

	$my = "INSERT INTO tbl_eybook (eid, elname, efname, emname, work_status, department, employee_year) VALUES ('$id', '$ln', '$fn', '$mn', '$role', '$dep', '$year')";
	$result = mysqli_query($mysqli, $my);
	echo mysqli_error($mysqli);

	echo "<script>alert('Added to Yearbook Successfully.');window.location='index.php';</script>";

}

if (isset($_POST['cancel'])) {
	header("Location: index.php");
}