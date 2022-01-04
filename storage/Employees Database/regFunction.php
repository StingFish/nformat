<?php 
session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='LC.php';</script>";
    }
    else{
    isset($_SESSION['User']);
}
$mysqli = new mysqli('localhost','root','','yearbook') or die(mysqli_error($mysqli));

#delete btn(new)

if(isset($_GET['email'])){
	$EMAIL = $_GET['email'];
	$mysqli->query("DELETE FROM tab3 WHERE email = '$EMAIL'") or die($mysqli->error());
  header("Location: Reg1.php");
}

#edit btn(new)
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
  $dte = date("Y");
	$result = $mysqli->query("SELECT * FROM tab3 WHERE id = '$id'") or die($mysqli->error());
	while($row = $result->fetch_assoc()){
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>
    <title>Edit Info</title>";
		echo "<style>";
		echo "@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  background-image: url('assets/tmp2.png');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  overflow: hidden;
}
::selection{
  background: rgba(26,188,156,0.3);
}
.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 100px auto;
}
.wrapper{
  width: 100%;
  height: 70%;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
  height: 90px;
  background: #16a085;
  border-radius: 5px 5px 0 0;
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form{
  padding: 30px 25px 25px 25px;
  height: 70%;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  border-color: #16a085;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999;
}
.wrapper form .row i{
  position: absolute;
  width: 47px;
  height: 100%;
  color: #fff;
  font-size: 18px;
  background: #16a085;
  border: 1px solid #16a085;
  border-radius: 5px 0 0 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form .pass{
  margin: -8px 0 20px 0;
}
.wrapper form .pass a{
  color: #16a085;
  font-size: 17px;
  text-decoration: none;
}
.wrapper form .pass a:hover{
  text-decoration: underline;
}
.wrapper form .button input{
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background: #16a085;
  border: 1px solid #16a085;
  cursor: pointer;
}
form .button input:hover{
  background: #12876f;
}
.wrapper form .signup-link{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-link a{
  color: #16a085;
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}";
echo "</style>";
		echo "</head>";
		echo "<body>";
		echo "<div class='container'>
      <div class='wrapper'>
        <div class='title'><span>Edit Info</span></div>
        <form action='s.php' method='POST' enctype='multipart/form-data' style='overflow-y:scroll;'>";
        echo '<center><img class="imahe" style="width:80px; height:100px;" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/></center>';

        echo "<input type='number' name='id' value='".$id."' placeholder='Email or Phone' style='display:none;'>
        
          <div class='row'>
            <label>Last Name</label>
            <i class='fa fa-user'></i>
            <input type='text' name='lname' placeholder='Last Name' value='".$row['lname']."'>
          </div><br>
          <div class='row'>
          <label>First Name</label>
            <i class='fa fa-user'></i>
            <input type='text' name='fname' placeholder='First Name' value='".$row['fname']."' required>
          </div><br>
          <div class='row'>
          <label>Middle Initial</label>
            <i class='fa fa-user'></i>
            <input type='text' name='mname' maxlength='1' value='".$row['mname']."' placeholder='Middle Initial' required>
          </div><br>
          <div class='row'>
          <label>Position</label>
            <i class='fa fa-user'></i>
            <input type='text' name='pos' value='".$row['position']."' placeholder='Position' required>
          </div><br>
          <div class='row'>
          <label>Year</label>
            <i class='fa fa-calendar'></i>
            <input type='number' name='yr' placeholder='Year' max='".$dte."' value='".$row['year']."' required>
          </div><br>
          <div class='row button'>
            <input type='submit' name='save2' value='Save'>
          </div>
          <div class='row button'>
            <input type='submit' name='cancel' value='Cancel'></a>
          </div>
        </form>
      </div>
    </div>";
		echo "</body>";
		echo "</html>";
	}
}
?>
