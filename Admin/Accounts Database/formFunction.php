<?php

    session_start();

    if(!isset($_SESSION['User2']))
    {
    echo "<script>alert('You must login as Admin first.');window.location='../../LC.php';</script>";
    }
    isset($_SESSION['User2']);
?>

<?php
    $db=mysqli_connect('localhost','root','','yearbook_test');
$email = "";
$pass = "";
$last = "";
$first = "";
$mid = "";
$location = "";
$con = "";
$tel = "";
$year = "";
$acct = "";
$eid = "";
$sid = "";
$cour = "";
$dist = "";

$errors=array();

if (isset($_POST["submit3"])) {
$type = $_POST['status']; 

if ($type == "Employee") {
    $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
$email = $_POST['mail'];
$pass = $_POST['psw'];
$last = $_POST['Lname'];
$first = $_POST['Fname'];
$mid = $_POST['Mname'];
$location = $_POST['addr'];
$con = $_POST['contact'];
$tel = $_POST['mobile'];
$yerr = $_POST['yrr'];
$acct = $_POST['acc'];
$eid = $_POST['eids'];
$dist = $_POST['dis'];

  $user_check_query = "SELECT * FROM tbl_accounts, tbl_employees LIMIT 1";
  $resulta = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($resulta);

  if ($user) { // if user exists
    if ($user['email'] === $email OR $user['eid'] === $eid){
    array_push($errors, "The account is already exists.");

    }
  }
  else{
 $insertion = "INSERT INTO tbl_accounts (email, password, lname, fname, mname, address, mobile, landline, profile_image, atype, year, is_disabled) VALUES ('$email', '$pass', '$last', '$first', '$mid', '$location','$con', '$tel', '$image', '$acct', '$yerr', '$dist')";
    $result = mysqli_query($db, $insertion);

 if ($acct=="A" OR $acct=="a" OR $acct=="R" OR $acct=="r") {
     $ins = "INSERT INTO tbl_employee (eid, email) VALUES ('$eid', '$email')";
    $res = mysqli_query($db, $ins);
 }
}
}
if ($type == "Student") {
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
$email = $_POST['mail'];
$pass = $_POST['psw'];
$last = $_POST['Lname'];
$first = $_POST['Fname'];
$mid = $_POST['Mname'];
$location = $_POST['addr'];
$con = $_POST['contact'];
$tel = $_POST['mobile'];
$yerr = $_POST['yrr'];
$acct = $_POST['acc'];
$cour = $_POST['course'];
$sid = $_POST['sids'];
$dist = $_POST['dis'];

  $user_check_query = "SELECT * FROM tbl_accounts, tbl_students LIMIT 1";
  $resulta = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($resulta);

  if ($user) { // if user exists
    if ($user['email'] === $email  OR $user['sid'] === $sid){
    array_push($errors, "The account is already exists.");

    }
  }
  else{
 $insertion = "INSERT INTO tbl_accounts (email, password, lname, fname, mname, address, mobile, landline, profile_image, atype, year, is_disabled) VALUES ('$email', '$pass', '$last', '$first', '$mid', '$location','$con', '$tel', '$image', '$acct', '$yerr', '$dist')";
    $result = mysqli_query($db, $insertion);

 
 if($acct=="S" OR $acct=="s"){
    $ins = "INSERT INTO tbl_students (sid, email, course) VALUES ('$sid', '$email', '$cour')";
    $res = mysqli_query($db, $ins);
 }
}
}
}
?>