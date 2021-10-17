<?php
 include ('server.php');
if(isset($_SESSION['User'])) {
     header("Location: storage.php"); // redirects them to homepage
     exit; // for good measure
}
if(isset($_SESSION['User2'])) {
     header("Location: test.php"); // redirects them to homepage
     exit; // for good measure
}
if(isset($_SESSION['User3'])) {
     header("Location: StudentDashboard.php"); // redirects them to homepage
     exit; // for good measure
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="styles/style1.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="styles/CvSU/logo.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
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
  <div class="header">
    <h2>Login</h2>
  </div>

  <form method="post" action="LC.php">
    <?php include('errors.php') ?>
    <div class="input-container">
    <i class="fa fa-address-card icon"></i>
    <input class="input-field" type="number" placeholder="School ID" name="username" value="<?php echo $username; ?>">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password" id="myInput">
  </div>
    <div style="font-size: 15px;">
      <input type="checkbox" onclick="myFunc()" style="width:20px;">Show Password
    </div><br>
    <div class="input-group">
      <button class="button button1" name="lc">Login</button>
      <p style="font-size: 15px;">
        Not yet a member? Register <a href="register.php">here.</a>
      </p>
    </div>
  </form>
</body>
</html>

<script>
function myFunc() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>