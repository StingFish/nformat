<?php
include ('formFunction.php');

    if(!isset($_SESSION['User2']))
    {
    echo "<script>alert('You must login as Admin first.');window.location='../../LC.php';</script>";
    }
    isset($_SESSION['User2']);
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
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style>
body{
  background-image: url("assets/tmp2.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  overflow-x: hidden;
}
.logo {
    width: 45px;
    top: 2px;
    left: 2px;
    position: absolute;
}

.alert {
  padding: 20px;
  background-color: #green;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
.loc{
    float: right;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  height: 30px;
  background-color: #5cb85c;
  color: white;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}
@media only screen and (max-width: 760px){
  tfoot tr{
  visibility: hidden;
  display: none;
          }
  .me{
    width: 80%;
  }
  
  }
.label-container{
  position:fixed;
  bottom:48px;
  right:105px;
  display:table;
  visibility: hidden;
}

.label-text{
  color:#FFF;
  background:rgba(51,51,51,0.5);
  display:table-cell;
  vertical-align:middle;
  padding:10px;
  border-radius:3px;
}

.label-arrow{
  display:table-cell;
  vertical-align:middle;
  color:#333;
  opacity:0.5;
}

.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#06C;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  font-size:24px;
  margin-top:18px;
}

a.float + div.label-container {
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s ease;
}

a.float:hover + div.label-container{
  visibility: visible;
  opacity: 1;
}
.error {
  width: 95%;
  height: 5%; 
  margin-top: 15px;
  line-height: 20px;
  padding-bottom: 35px;
  padding-top: -35px;
  border: 1px solid red; 
  color: white; 
  background: red; 
  border-radius: 5px; 
  text-align: center;
  font-family: 'Ubuntu', sans-serif;
  font-size: 14px;

}
.contentss{
  color: grey;
  margin-left:-10px;
  margin-top: -60px;
  font-size: 10px;
  margin-bottom: 35px;
  text-align: left;
  z-index:-1;
    }
</style>
</head>
<body>
<?php
        $db = mysqli_connect('localhost', 'root', '', 'yearbook_test');
        $year = date("Y");
        $sql = "SELECT * FROM tbl_accounts ORDER BY email";
        $result = mysqli_query($db,$sql);
        $rows = mysqli_num_rows($result);
        ?>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php
  $goo= $_SESSION['User2.0'];
    $user_check_query = "SELECT * FROM tbl_accounts WHERE email='$goo'";
         $res = mysqli_query($db, $user_check_query);
    while ($rows = mysqli_fetch_array($res)){
    echo '<center><img src="data:image/jpeg;base64,'.base64_encode($rows["profile_image"]).'" style="width:80%;margin-left:0px;border-radius:50%;"></center>';
 
  echo "<center><p style='margin-left:-10px;color:white;'>".$rows['fname']." ".$rows['mname']." ".$rows['lname']."</p></center>";
   }
  ?>
  <form action="../../admin.php"> 
  <center><button type="submit" class="button button2" style="width:90%;height:60px;">Home</button></center>
  </form>
  <form action="../../logout2.php"> 
  <center><button type="submit" class="button button2" style="width:90%;height:60px;">Log Out</button></center>
  </form>
</div>

<div class="topnav" id="myTopnav">
  <div>
  <a href="javascript:void(0);" onclick="openNav()"><img src="CvSU/logo-removebg.png" alt="logo" class="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['User2']; ?></i></a>
</div>
<div>
  <center><input class="inp" type="text" placeholder="Search by name" name="search-text" style="width:50%;background-position: 10px 10px;padding: 10px 20px 10px 35px;margin-bottom: 5px;margin-top: 5px;" id="search_text_affair"></center>
</div>
</div>
<br>
<br>
<br>


<a href="#" class="float add-btn-reg-a">
<i class="my-float" style="font-family: Oswald;font-size: 40px;font-style: normal;font-weight: bold;">+</i>
</a>
<div class="label-container">
<div class="label-text">Add</div>
<i class="fa label-arrow"></i>
</div>

  <!--- Start here --->
  <div class="search-container">

      <div>
      
        <button class="add-btn-reg-a add-btn-r" style="display:none;margin-top: -100px;">Add Member</button>
        <div class="addMember-reg-a">
            
            <form action="index.php" class="form me" method="post" enctype="multipart/form-data" style="overflow-y:scroll;">
                <h2 style="margin:-10px">Add Account</h2>
                <?php include ('errors.php');?>
                
                <div class="inputField">
                <h6 style="margin-bottom: -10px;margin-top: 15px;">Select Image</h6>

                <input type="file" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" name="f1" placeholder="First Name" required>

                <input type="email" name="mail" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" value="<?php echo $email;?>" placeholder="Email Account" required>

                <textarea type="password" id="pw" name="psw" placeholder="Password" style="font-family: 'Arial';font-size: 14px;resize: none;width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;pointer-events: none;" required></textarea>

                <input id="len" value="16" type="number" min="8" max="30" style="display:none;"> 
                <input id="upper" type="checkbox" style="display:none;" checked>  
                <input id="lower" type="checkbox" style="display:none;" checked>  
                <input id="number" type="checkbox" style="display:none;" checked>  
               <input id="symbol" type="checkbox" style="display:none;" > 

                <center>
                <span class="button button2" id="generate" style="width:80%;height:10px;">Generate Password</span>
              </center> 
              <script>
                 var number = document.getElementById('pw');
        number.onkeydown = function(e) {
        if(((e.keyCode > 95 && e.keyCode < 106)
         || (e.keyCode > 47 && e.keyCode < 58)
         || (e.keyCode > 64 && e.keyCode < 91)
         || (e.keyCode > 7 && e.keyCode < 47)
         || (e.keyCode > 105 && e.keyCode < 223)
         || e.keyCode == 8)) {
         return false;
          }
        }
              </script>
              <script src="index.js"></script>

                <input type="text" name="Fname" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="First Name" value="<?php echo $first;?>" required>
               
                <input type="text" name="Mname" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Middle Name" maxlength="4" value="<?php echo $mid;?>" required>
 
                <input type="text" name="Lname" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Last Name" value="<?php echo $last;?>" required>

                <input type="text" name="addr" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Address" value="<?php echo $location;?>" required>

                <input type="number" id="num" name="contact" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Contact No." value="<?php echo $con;?>" maxlength="11" min="09000000000" required>

                <input type="tel" id="lan" name="mobile" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" value="<?php echo $tel;?>" placeholder="Landline No. (XXX-XXXX)" pattern="[0-9]{3}-[0-9]{4}" required>

                <input type="number" name="yrr" id="num" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $yerr;?>" max="<?php echo $year;?>" placeholder="Batch Year" min="2018" maxlength="4" required>
                <script>
                  var number = document.getElementById('num');
        number.onkeydown = function(e) {
        if(!((e.keyCode > 95 && e.keyCode < 106)
         || (e.keyCode > 47 && e.keyCode < 58) 
         || e.keyCode == 8)) {
         return false;
          }
        }
                </script>
                <select name="status" id ="combo" style="width: 100%;height: 40px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;">
                <option value="0">Please choose..</option>
                <option  value="Employee">Employee</option>
                <option  value="Student">Student</option>
                </select>

                <input type="text" id="aa" name="eids" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Employee ID" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $eid;?>" required>

                <input type="text" id="aa" name="acc" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Account Type (A/R)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return /[a&r]/i.test(event.key)" onkeyup="this.value = this.value.toUpperCase();" maxlength="1" value="<?php echo $eid;?>" required>

                <input type="text" id="bb" name="sids" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Student ID" value="<?php echo $sid;?>" maxlength="9" required>

                <input type="text" id="bb" name="course" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="Course (if Student)" value="<?php echo $cour;?>" maxlength="9" required>

                <script>
                  $(document).ready(function () {
    var $input = $('input[id=bb]');
    $input.attr('disabled', 'disabled');
    $('select[name=status]').on('change', function () {
        $input.attr('disabled', $(this).val() != "Student");
    });
});

$(document).ready(function () {
    var $input = $('input[id=aa]');
    $input.attr('disabled', 'disabled');
    $('select[name=status]').on('change', function () {
        $input.attr('disabled', $(this).val() != "Employee");
    });
});
                </script>
                <input type="text" name="dis" style="width: 90%;height: 20px;background: #e0dede;justify-content: center;display: flex;margin: 20px auto;padding: 10px;border: none;outline: none;border-radius: 5px;" placeholder="is Disabled?(Y/N)" value="<?php echo $dist;?>" maxlength="1" onkeypress="return /[n&y]/i.test(event.key)" required>

                <center>
                <button class="button button2" type="submit" name="submit3"  style="width:45%;height:50px;">ADD</button>
                <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
                <a href="index.php"><button class="cancel-btn-reg-a button button2"  style="width:45%;height:50px;">CANCEL</button></a></center><br>
              </div>
            </form>
        </div>
        <div class="input-icons">
          
        </div>
    </div>
      <br>
      
      <div id="result_affair" style="margin-top: -70px;"></div>
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
                url:"AcFetch.php",
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
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</body>
</html>
