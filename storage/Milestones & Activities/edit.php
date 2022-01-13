<?php
    include_once('connect.php');

    if(!isset($_SESSION['User']))
    {
    echo "<script>alert('You must login as Registrar first.');window.location='../../landpage.php';</script>";
    }
    isset($_SESSION['User']);
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<title>Add Photo</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  background-color: gray;
  overflow: hidden;
}
::selection{
  background: rgba(26,188,156,0.3);
}
.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 70px auto;
}
.wrapper{
  width: 100%;
  height: 40%;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
  height: 90px;
  background: dodgerblue;
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
  height: 350px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
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

.error {
  width: 100%; 
  margin: 0px auto;
  line-height: 20px;
  padding: 0; 
  border: 1px solid red; 
  color: white; 
  background: red; 
  text-align: left;
  font-family: 'Ubuntu', sans-serif;
  font-size: 12px;
  margin-bottom: 10px;
}
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 15px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
    </style>
    </head>
    <body>
    <div class="container">
      <div class="wrapper">
      <div class="title">
        <span>Add Photo</span>
      </div>
        <form action="edit.php" name="frmContact" method="post" enctype="multipart/form-data" style="overflow-y:scroll;">

          <p><?php include('errors.php'); ?></p>

          <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="file" placeholder="file" name="f1" style="outline: 1px solid black;" accept=".mp4,.png,.jpg" required>
  </div>
          <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Description" value="<?php echo $desc;?>" name="desc" required>
  </div>
          <div class="input-container">
    <i class="icon"></i>
    <input class="input-field" type="text" placeholder="Year" name="Year" value="<?php echo $year;?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $color;?>" maxlength="4" onkeypress="return /[0-9]/i.test(event.key)" required>
  </div>
          <div class="row button">
            <button type="submit" name="gett" style="width: 100%;color: #fff;font-size: 20px;font-weight: 500;padding-left: 0px;background: #16a085;border: 1px solid #16a085;cursor: pointer;">Save</button><br><br>
            <a href="index.php"  type="submit" style="text-decoration: none;width: 100%;color: #fff;font-size: 20px;font-weight: 500;padding: 4px;height: 35px;background: #16a085;border: 1px solid #16a085;cursor: pointer;display: inline-block;text-align: center;"> Cancel </a>

          </div><br><br>
        </form>
      </div>
    </div>

  </body>
</html>


