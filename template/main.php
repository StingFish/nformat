<?php
//kemero
    session_start();

    if(!isset($_SESSION['User3']))
    {
      echo "<script>alert('You must login as Student first.');window.location='logout3.php';</script>";
    }
    isset($_SESSION['User3']);
    isset($_SESSION['Users3']);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <title>CodePen - wowjs Slider</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:100'>
  <link rel="stylesheet" type="text/css" href="D1.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.4/jquery.fullPage.min.css'>
<link rel="stylesheet" href="./ms.css">
<style>
.pic{
  width: 200px;
  height: 250px;
}
.picbig{
  position: absolute;
  width:0px;
  -webkit-transform: translate(-84%, -27%);
  transform: translate(-84%, -27%);
  z-index:1;
}
.pic:hover + .picbig{
  width:280px;
  height:350px;
}
</style>
</head>

<body>
<!-- partial:index.partial.html -->
<!-- =============================== Start Slider =============================== -->
        <div class="wowslider section">
            <ul>
                <li class="wow pulse wowactive">
                    <div class="overlay">
                        <div class="text">
                            <h2 class="wow fadeInUp" data-wow-delay=".2s">Eman Abdelqader</h2>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Web Developer</h2>
                        </div>
                    </div>
                </li>
                <li class="wow pulse">
                    <div class="overlay">
                        <div class="text">
                            <h2 class="wow fadeInRight" data-wow-delay=".2s"><span>H</span>TML, <span>C</span>SS, <span>j</span>avascript</h2>
                            <h2 class="wow fadeInLeft" data-wow-delay=".4s"><span>P</span>HP, <span>m</span>ySql</h2>
                            <h2 class="wow fadeInRight" data-wow-delay=".6s"><span>A</span>jax, <span>j</span>son</h2>
                        </div>
                    </div>
                </li>
                
                <li class="wow pulse">
                    <div class="overlay">
                        <div class="text">
                            <h2 class="wow fadeInRight">Let us take </h2>
                            <p class="wow fadeInLeft">your project to success</p>
                        </div>
                    </div>
                </li>
                <li class="wow pulse">
                    <div class="overlay ">
                        <div class="text">
                            <h2 class="wow zoomIn">I'm currently part of</h2>
                            <p class="wow fadeInLeft">a web development team </p>
                        </div>
                    </div>
                </li>
                <li class="wow pulse">
                    <div class="overlay">
                        <div class="text">
                            <h2 class="wow fadeInRight">A special thanks to </h2>
                            <p class="wow fadeInLeft"><a href="#">Elzero Web School</a></p>
                        </div>
                    </div>
                </li>
                <li class="wow pulse">
                    <div class="overlay">
                        <div class="text">
                            <h2 class="wow fadeIn">My passion is to use technology based solutions</h2>
                            <p class="wow fadeInUp" data-wow-delay=".2s">to help solve real world challenges</p>
                        </div>
                    </div>
                </li>

                <li class="wow pulse" style="overflow-y: scroll;overflow-x: hidden;">
  <h2 class="wow fadeInUp board" style="font-family: 'Dancing Script', cursive; font-size: 50px; margin-top: 0;">- Administrative Officers -</h2>
   <div class="wow fadeInUp yb-php2">
  <?php 
  $db=mysqli_connect('localhost','root','','yearbook');
  $goo= $_SESSION['Users3'];
         $user_check_query = "SELECT * FROM shs WHERE year='$goo' ORDER BY lname";
         $result = mysqli_query($db, $user_check_query);

         while ($row = mysqli_fetch_array($result)){
            echo "<div class='container'>";
            echo "<div class='card'>";
            echo "<div class='imgBx'>";
            echo '<img class="pic" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>';
            echo '<img  class="picbig" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>';
            echo "</div>";
            echo "<div class='contentt'>";
            echo "<h2 class='unselectable'>".$row['fname']."&nbsp;".$row['mname']."&nbsp;".$row['lname']."</h2>";
            echo "&#10075;&#10075;".$row['quotes']."."."&#10076;&#10076;";
            echo "</div>";
            echo "</div>";
            echo "</div>";
      }
  ?>
   </div>
                </li>
            </ul>
            <div class="ctrl">
                <div class="ctrl-content">
                    <i class="fa fa-angle-left fa-2x" style="font-size: 80px;"><</i>
                    <div class="image">
                        <h2></h2>
                    </div>
                </div>
                <div class="ctrl-content">
                    <i class="fa fa-angle-right fa-2x" style="font-size: 80px;">></i>
                    <div class="image"></div>
                </div>
            </div>
        </div>
        <!-- =============================== End Slider =============================== -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/3211/jquery.parallax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.4/jquery.fullPage.min.js'></script><script  src="./script.js"></script>

</body>
</html>
