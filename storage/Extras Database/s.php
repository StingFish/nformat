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
	$file =addslashes(file_get_contents($_FILES['f1']['tmp_name']));
	$title = $_POST['title'];
	$color = $_POST['color'];

	$my = "UPDATE tbl_addons SET messages='$file', front_title ='$title', color_scheme='$color' WHERE addon_year='$id'";
	$result = mysqli_query($mysqli, $my);
	echo mysqli_error($mysqli);

	echo "<script>alert('Added to Yearbook Successfully.');window.location='index.php';</script>";

}

if (isset($_POST['cancel'])) {
	header("Location: index.php");
}