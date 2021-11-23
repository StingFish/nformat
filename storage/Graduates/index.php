<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Item</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/base.css">
<link rel="stylesheet" href="sty1.css">
<link rel="shortcut icon" href="CvSU/logo-removebg.png">

<style>
body{
  background-image: url("assets/tmp2.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.logo {
    width: 45px;
    top: 2px;
    left: 2px;
    position: absolute;
}

tfoot{
  position: sticky;
  bottom: 0;
}
@media only screen and (max-width: 760px){
  tfoot tr{
  visibility: hidden;
  display: none;
          }
  }
</style>
</head>
<body>
<?php
        $db = mysqli_connect('localhost', 'root', '', 'yearbook');
        $year = date("Y");

        if (isset($_GET['call'])) {
        $Ys= mysqli_real_escape_string($db, $_GET['call']);

        $sql = "SELECT * FROM shs WHERE year='$Ys' ORDER BY lname";
        $result = mysqli_query($db,$sql);
        $rows = mysqli_num_rows($result);
      }
        ?>
<div class="topnav" id="myTopnav">
  <div>
  <a href="#"><img src="CvSU/logo-removebg.png" alt="logo" class="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;202000001</i></a>
</div>
  <a href="http://localhost/nformat/storage.php">Storage Files</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down fa-lg"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">About History</a>
      <a href="#">About Us</a>
    </div>
  </div>
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<br>
<br>
<br>
<!--- Start here --->
<div class="search-container">
  <div class="topButton">
      <button class="add-btn-reg-grad"><i class="fas fa-user-plus"></i>Add Graduate</button>
      <div class="addMember-reg-grad">
          <form action="formFunction.php" method="post"  enctype="multipart/form-data">
              <h2>Add Member</h2>

              <div class="inputField">
              <p>Select Image</p>
              <input type="file" name="f1" required>

              <p>Firstname</p>
              <input type="text" name="Fname"required><br>

              <p>Middle Initial</p>
              <input type="text" name="Mname" maxlength="4" required><br>

              <p>Lastname</p>
              <input type="text" name="Lname"required><br>

              <p>Year</p>
              <input type="text" name="year" maxlength="4" required><br>

              <button class="button button1" type="submit" name="submit3" >ADD</button>
              <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
              <button class="cancel-btn-reg-grad button">CANCEL</button>
            </div>
          </form>
      </div>
      <div class="input-icons">
        <input class="inp" type="text" placeholder="Search by name" name="search-text" id="search_text_graduates">
        <i class="fas fa-search"></i>
      </div>
  </div>
    <br>
    <div id="result_graduates"></div>
</div>


<script>
$(document).ready(function(){
      let addButtonGrad = document.querySelector('.add-btn-reg-grad');
      let addMemberGrad = document.querySelector('.addMember-reg-grad');
      let cancelButtonGrad = document.querySelector('.cancel-btn-reg-grad');

      addButtonGrad.addEventListener('click', function(){
          addMemberGrad.classList.add('form-active');
      });
      cancelButtonGrad.addEventListener('click', function(){
          addMemberGrad.classList.remove('form-active');
      });

      load_data();
      function load_data(graduates_query)
      {
        $.ajax({
          url:"regGraduateFetch.php",
          method:"post",
          data:{graduates_query:graduates_query},
          success:function(data)
          {
            $('#result_graduates').html(data);
          }
        });
      }

      $('#search_text_graduates').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
          load_data(search);
        }
        else
        {
          load_data();
        }
      });
    });
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>
