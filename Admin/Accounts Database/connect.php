<?php

    session_start();

    if(!isset($_SESSION['User2']))
    {
    echo "<script>alert('You must login as Admin first.');window.location='../../LC.php';</script>";
    }
    isset($_SESSION['User2']);
?>

<?php

$email = "";
$pass =  "";
$last = "";
$first = "";
$mid = "";
$location = "";
$con = "";
$tel = "";
$yerr = "";
$acct = "";
$cour = "";
$sid = "";
$eid = "";
$dist = "";

$errors = array();

$db=mysqli_connect('localhost', 'root', '', 'tests');

if (isset($_POST["gett"])) {
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
$em = $_POST['mail'];
$email = $em . "@domain.edu.ph";
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
$eid = $_POST['eids'];
$dist = $_POST['dis'];

if ($acct=="A" OR $acct=="a" OR $acct=="R" OR $acct=="r") {
  $user_check_query = "SELECT tbl_accounts.email, tbl_employees.eid FROM tbl_employees INNER JOIN tbl_accounts ON tbl_accounts.email = tbl_employees.email";
  $resulta = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($resulta);
  
    if ($user['email'] === $email && $user['eid'] === $eid) {
      array_push($errors, "Account Exist.");
    }
    else if ($user['email'] === $email && $user['eid'] !== $eid) {
      array_push($errors, "Account Email Exist.");
    }
    else if ($user['email'] !== $email && $user['eid'] === $eid) {
      array_push($errors, "Account SID Exist.");
    }
    
  else{
    $pass = md5($pass);
 $insertion = "INSERT INTO tbl_accounts (email, password, lname, fname, mname, address, mobile, landline, profile_image, atype, year_created, is_disabled) VALUES ('$email', '$pass', '$last', '$first', '$mid', '$location', '$con', '$tel', '$image', '$acct', '$yerr', '$dist')";
    $result = mysqli_query($db, $insertion);
    echo mysqli_error($db);

 
     $ins = "INSERT INTO tbl_employees (eid, email) VALUES ('$eid', '$email')";
    $res = mysqli_query($db, $ins);
    if ($res){
    echo "<script>alert('Added Successfully to Employee.');window.location='index.php';</script>";
    }
 }
}
 else if($acct=="S" OR $acct=="s"){
    $user_check_query = "SELECT tbl_accounts.email, tbl_students.sid FROM tbl_students INNER JOIN tbl_accounts ON tbl_accounts.email = tbl_students.email";
  $resulta = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($resulta);
  
    if ($user['email'] === $email && $user['sid'] === $sid) {
      array_push($errors, "Account Exist.");
    }
    else if ($user['email'] === $email && $user['sid'] !== $sid) {
      array_push($errors, "Account Email Exist.");
    }
    else if ($user['email'] !== $email && $user['sid'] === $sid) {
      array_push($errors, "Account SID Exist.");
    }
    
  else{
 $insertion = "INSERT INTO tbl_accounts (email, password, lname, fname, mname, address, mobile, landline, profile_image, atype, year_created, is_disabled) VALUES ('$email', '$pass', '$last', '$first', '$mid', '$location', '$con', '$tel', '$image', 's', '$yerr', '$dist')";
    $result = mysqli_query($db, $insertion);
    echo mysqli_error($db);

    $ins = "INSERT INTO tbl_students (sid, email, course) VALUES ('$sid', '$email', '$cour')";
    $res = mysqli_query($db, $ins);
    if ($res){

    echo "<script>alert('Added Successfully on Student.');window.location='index.php';</script>";
    }
 }
}
}



if (isset($_POST['cancel'])) {
    header("Location : index.php");
    $email = "";
    $pass =  "";
$last = "";
$first = "";
$mid = "";
$location = "";
$con = "";
$tel = "";
$yerr = "";
$acct = "";
$cour = "";
$sid = "";
$eid = "";
$dist = "";
}
?>