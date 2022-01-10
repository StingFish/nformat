<?php

    session_start();

    if(!isset($_SESSION['User']))
    {
    echo "<script>alert('You must login as Registrar first.');window.location='../../LC.php';</script>";
    }
    isset($_SESSION['User']);
?>

<?php

$title = "";
$color =  "";
$year = "";

$errors = array();

$db=mysqli_connect('localhost', 'root', '', 'tests');

if (isset($_POST["gett"])) {
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
$title = $_POST['title'];
$color = $_POST['color'];
$year = $_POST['Year'];


  $user_check_query = "SELECT * FROM tbl_addons LIMIT 1";
  $resulta = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($resulta);
  
    if ($user['addon_year'] === $year) {
      array_push($errors, "Year Exist.");
    }
    
  else{
 $insertion = "INSERT INTO tbl_addons (addon_year, messages, front_title, color_scheme) VALUES ('$year', '$image', '$title', '$color')";
    $res = mysqli_query($db, $insertion);
    echo mysqli_error($db);
    if ($res){
    echo "<script>alert('Added Successfully to Employee.');window.location='index.php';</script>";
    }
 }

}



if (isset($_POST['cancel'])) {
    header("Location : index.php");
    $title = "";
    $color =  "";
    $year = "";
}
?>