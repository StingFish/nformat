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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="meCard1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php
    $db=mysqli_connect('localhost','root','','tests');
    $mee= $_SESSION['User3.0'];
    $user_check_query = "SELECT tbl_accounts.email, tbl_accounts.password, tbl_accounts.profile_image, tbl_accounts.year_created, tbl_accounts.lname, tbl_accounts.fname, tbl_accounts.mname, tbl_sybook.quotes FROM tbl_accounts JOIN tbl_students ON tbl_students.email=tbl_students.email JOIN tbl_sybook ON tbl_sybook.sid=tbl_students.sid where tbl_accounts.email= '$mee' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);


    if (count($_POST) > 0) {
    $result = mysqli_query($db, "SELECT password from tbl_accounts WHERE email='" . $mee . "'");
    $rrow = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $rrow["password"]) {
        mysqli_query($db, "UPDATE tbl_accounts set password='" . md5($_POST["newPassword"]) . "' WHERE email='" . $mee. "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}

    /*if(isset($_POST['form-modal'])){
      $newPassword = mysqli_real_escape_string($db, $_POST['name']);
      $confirmPassword = mysqli_real_escape_string($db, $_POST['email']);

      $selectPassQ = "SELECT password FROM tbl_accounts WHERE email = '$mee'";
      $resultPassQ = mysqli_query($db, $selectPassQ);
      $row = mysqli_fetch_array($resultPassQ);

      if($newPassword === $confirmPassword){

        if (md5($_POST["curr2"]) === $row["password"]) {
            mysqli_query($db, "UPDATE tbl_accounts set password='" . md5($_POST["name"]) . "' WHERE email='" . $mee . "'");
            echo "<script>alert('Password Changed!');</script>";
            //$message = "Password Changed Already Change";
        } else{
          echo "<script>alert('Current Password not correct!');</script>";
            //$message = "Current Password is not correct";
        }

      }else{
        echo "hnd pareho";
      }
  }*/

    while ($row = mysqli_fetch_array($result)){
    $pass= $row['password'];
    ?>
    <script>
  function validatePassword() {
  var currentPassword,newPassword,confirmPassword,output = true;

  currentPassword = document.frmChange.currentPassword;
  newPassword = document.frmChange.newPassword;
  confirmPassword = document.frmChange.confirmPassword;

  if(!currentPassword.value) {
  	currentPassword.focus();
  	document.getElementById("currentPassword").innerHTML = "required";
  	output = false;
  }
  else if(!newPassword.value) {
  	newPassword.focus();
  	document.getElementById("newPassword").innerHTML = "required";
  	output = false;
  }
  else if(!confirmPassword.value) {
  	confirmPassword.focus();
  	document.getElementById("confirmPassword").innerHTML = "required";
  	output = false;
  }
  if(newPassword.value != confirmPassword.value) {
  	newPassword.value="";
  	confirmPassword.value="";
  	newPassword.focus();
  	document.getElementById("confirmPassword").innerHTML = "not same";
  	output = false;
  }
  return output;
  }
  </script>
    <h1>Personal Card User</h1>
    <div class="container">
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="our-team">
          <div class="picture">
            <?php
              echo '<img class="img-fluid" id="trc" src="../DB/'.$row['profile_image'].'" alt="IMAGE"></img>';
            ?><!--<img class="img-fluid" src="https://picsum.photos/130/130?image=1027">-->
          </div>
          <div class="team-content">
            <div class="team">
              <blockquote>
                <?php echo $row['quotes'];
               ?>
              </blockquote>
            </div>
            <h2 class="name"><?php echo $row['lname'].", ". $row['fname']."&nbsp;".$row['mname'];
            ?></h2>
            <h4 class="title">Batch <?php echo $row['year_created']; ?></h4>
            <h5 class="title"><?php echo $row['email']; }?></h5>
          </div>
          <ul class="social">
            <h3 class="course">BSIT</h3>
          </ul>
        </div>
      </div>
      <div>
        <span><a href="menu.php"><button class="button1">EXIT</button></a><button id="submit" class="button2">Change Password</button></span>
        <div class="modal-bg">
          <form class="modal" name="frmChange" method="post" action=""
          onSubmit="return validatePassword()">
          <span class="modal-close">X</span>
          <div style="width: 500px;">
              <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
              <table border="0" cellpadding="10" cellspacing="0"
                   align="center" class="tblSaveForm">
                  <tr class="tableheader">
                      <td colspan="2">Change Password</td>
                  </tr>
                  <tr>
                      <td width="40%"><label>Current Password</label></td>
                      <td width="60%"><input type="password"
                          name="currentPassword" class="txtField" /><span
                          id="currentPassword" class="required"></span></td>
                  </tr>
                  <tr>
                      <td><label>New Password</label></td>
                      <td><input type="password" name="newPassword"
                          class="txtField" /><span id="newPassword"
                          class="required"></span></td>
                  </tr>
                  <td><label>Confirm Password</label></td>
                  <td><input type="password" name="confirmPassword"
                      class="txtField" /><span id="confirmPassword"
                      class="required"></span></td>
                  </tr>
                  <tr>
                      <td colspan="2"><input type="submit" name="submit"
                          value="Submit" class="btnSubmit"></td>
                  </tr>
              </table>
          </div>
      </form>
        </div>

      </div>
    </div>
  </body>
  <script>
    let modalBtn = document.querySelector('.button2');
    let modalBg = document.querySelector('.modal-bg');
    let modalClose = document.querySelector('.modal-close');

    modalBtn.addEventListener('click', function(){
      modalBg.classList.add('bg-active');
    });
    modalClose.addEventListener('click', function(){
      modalBg.classList.remove('bg-active');
    });
  </script>
  <script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
}
return output;
}
</script>
  <?php

  ?>
</html>
