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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="assets/base.css">
<link rel="stylesheet" href="sty1.css">

<link rel="shortcut icon" href="CvSU/logo-removebg.png">
<script src="jquery-3.6.0.js"></script>
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

        $sql = "SELECT * FROM tab2 WHERE year='$Ys' ORDER BY lname";
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
        <button class="add-btn-reg-a add-btn-r"><i class="fas fa-user-plus"></i>Add Member</button>
        <div class="addMember-reg-a">
            <form action="formFunction.php" class="form" method="post"  enctype="multipart/form-data">
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

                <p>Position</p>
                <input type="text" name="position"required><br>

                <p>Year</p>
                <input type="text" name="year" maxlength="4" required><br>

                <button class="button button1" type="submit" name="submit3" >ADD</button>
                <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
                <button class="cancel-btn-reg-a button">CANCEL</button>
              </div>
            </form>
        </div>
        <div class="input-icons">
          <input class="inp" type="text" placeholder="Search by name" name="search-text" id="search_text_affair">
          <i class="fas fa-search"></i>
        </div>
    </div>
      <br>
      <div id="result_affair"></div>
  </div>
<!-- end here -->
<script>
$(document).ready(function(){
      let addButtonRegA = document.querySelector('.add-btn-reg-a');
      let addMemberRegA = document.querySelector('.addMember-reg-a');
      let cancelButtonRegA = document.querySelector('.cancel-btn-reg-a');

      addButtonRegA.addEventListener('click', function(){
          addMemberRegA.classList.add('form-active');
      });
      cancelButtonRegA.addEventListener('click', function(){
          addMemberRegA.classList.remove('form-active');
      });

      load_data();
            function load_data(affair_query)
            {
              $.ajax({
                url:"regAffairFetch.php",
                method:"post",
                data:{affair_query:affair_query},
                success:function(data)
                {
                  $('#result_affair').html(data);
                }
              });
            }

            $('#search_text_affair').keyup(function(){
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
