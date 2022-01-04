<?php
//kemero
    session_start();

    if(!isset($_SESSION['User3']))
    {
      echo "<script>alert('You must login as Student first.');window.location='../logout3.php';</script>";
    }
    isset($_SESSION['User3']);
    isset($_SESSION['Users3']);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.6" /> 
  <title>My Yearbook</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:100'>
  <link rel="stylesheet" type="text/css" href="D1.css">
<link rel='stylesheet' href='styles/animate.min.css'>
<link rel='stylesheet' href='styles/jquery.fullPage.min.css'>
<link rel="stylesheet" href="ms.css">
<link rel="stylesheet" href="css/image-zoom.css">
    <link rel="stylesheet" href="css/zoom.css">
<style>
/* [IMAGE] */
.zoomD {
  width: 600px;
  height: auto;
  cursor: pointer;
}

/* [LIGHTBOX BACKGROUND] */
#lb-back {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
  visibility: hidden;
  opacity: 0;
  transition: all ease 0.4s;
}
#lb-back.show {
  visibility: visible;
  opacity: 1;
}

/* [LIGHTBOX IMAGE] */
#lb-img {
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  text-align: center;
}
#lb-img img {
  /* You might want to play around with 
     width, height, max-width, max-height
     to fit portrait / landscape pictures properly. */
  width: 95%;
  height: 100%;
 
  /* ALTERNATE EXAMPLE
  width: 100%;
  max-width: 1200px;
  height: auto;
  margin: 0 auto; */
}

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
@media screen and (max-width: 959px) and (min-width: 768px) {
 #text2{
    width: 100%;
    margin-top:60px;
 }
}
.button-59 {
  align-items: center;
  background-color: #fff;
  border: 2px solid #000;
  box-sizing: border-box;
  color: #000;
  cursor: pointer;
  display: inline-flex;
  fill: #000;
  font-family: Inter,sans-serif;
  font-size: 16px;
  font-weight: 600;
  height: 48px;
  justify-content: center;
  letter-spacing: -.8px;
  line-height: 24px;
  min-width: 140px;
  outline: 0;
  padding: 0 17px;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-59:focus {
  color: #171e29;
}

.button-59:hover {
  border-color: #06f;
  color: #06f;
  fill: #06f;
}

.button-59:active {
  border-color: #06f;
  color: #06f;
  fill: #06f;
}

@media (min-width: 768px) {
  .button-59 {
    min-width: 170px;
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
</style>
</head>

<body>
<!-- partial:index.partial.html -->
<!-- =============================== Start Slider =============================== -->
        <div class="wowslider section">
            <ul> 
                <li class="wow pulse wowactive" style="overflow-y: scroll;overflow-x: hidden;"> <!--- Milestones --->
                <h2 class="wow fadeInDown board"style="font-family: 'Dancing Script', cursive; font-size: 50px; margin-top: 0;">- Milestones & Activities -</h2>
                    <div class="wow fadeIn yb-php2" style="background:none">
                <?php 
                    $db=mysqli_connect('localhost','root','','yearbook');
                $goo= $_SESSION['Users3'];
                $user_check_query = "SELECT * FROM tab11 WHERE year = '$goo'";
                $result = mysqli_query($db, $user_check_query);

                while ($row = mysqli_fetch_array($result)){
                echo '<div id="lb-back">
                        <div id="lb-img"></div>
                    </div>

                    <!-- [THE IMAGES] -->
                    <img src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" class="zoomD"/><br>
                    <script>
                    var zoomImg = function () {
  // (A) CREATE EVIL IMAGE CLONE
  var clone = this.cloneNode();
  clone.classList.remove("zoomD");

  // (B) PUT EVIL CLONE INTO LIGHTBOX
  var lb = document.getElementById("lb-img");
  lb.innerHTML = "";
  lb.appendChild(clone);

  // (C) SHOW LIGHTBOX
  lb = document.getElementById("lb-back");
  lb.classList.add("show");
};

window.addEventListener("load", function(){
  // (D) ATTACH ON CLICK EVENTS TO ALL .ZOOMD IMAGES
  var images = document.getElementsByClassName("zoomD");
  if (images.length>0) {
    for (var img of images) {
      img.addEventListener("click", zoomImg);
    }
  }

  // (E) CLICK EVENT TO HIDE THE LIGHTBOX
  document.getElementById("lb-back").addEventListener("click", function(){
    this.classList.remove("show");
  })
});
</script>'; 
                 } 
                 ?>
                 <script> $(document).ready(function(){ var zoomImages = $('.zoom-images'); zoomImages.each(function() { $(this).imageZoom(); }); }); </script>
                </div>
                </li>
                <li class="wow pulse" style="overflow-y: scroll;overflow-x: hidden;"> <!--- Administrative --->
                    <h2 class="wow fadeInUp board" style="font-family: 'Dancing Script', cursive; font-size: 50px; margin-top: 0;">- The Graduates -</h2>
   <div class="wow fadeInLeft yb-php2" style="background:none">
  <?php 
  $db=mysqli_connect('localhost','root','','yearbook');
  $goo= $_SESSION['Users3'];
         $user_check_query = "SELECT * FROM shs WHERE year='$goo' ORDER BY lname";
         $result = mysqli_query($db, $user_check_query);

         while ($row = mysqli_fetch_array($result)){
           echo "<div class='container'>";
            echo "<div class='card' style='height:350px;'>";
            echo "<div class='imgBx'>";
            echo '<img class="pic" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>';
            echo '<img  class="picbig" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>';
            echo "</div>";
            echo "<div class='contentt'>";
            echo "<h2 class='unselectable' style='font-family: Oswald;'>".$row['fname']."&nbsp;".$row['mname']."&nbsp;".$row['lname']."</h2>";
            echo "<p style='font-family: Oswald;'>&#10075;&#10075;".$row['quotes']."."."&#10076;&#10076;</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
      }
  ?>
   </div>
                </li>
                 <li class="wow pulse" style="overflow-y: scroll;overflow-x: hidden;"> <!--- Administrative --->
                    <h2 class="wow fadeInUp board" style="font-family: 'Dancing Script', cursive; font-size: 50px; margin-top: 0;">- Academic Affairs -</h2>
   <div class="wow fadeInUp yb-php2" style="background:none">
  <?php 
  $db=mysqli_connect('localhost','root','','yearbook');
  $goo= $_SESSION['Users3'];
         $user_check_query = "SELECT * FROM tab3 WHERE year='$goo' ORDER BY lname";
         $result = mysqli_query($db, $user_check_query);

         while ($row = mysqli_fetch_array($result)){
            echo "<div class='container'>";
            echo "<div class='card' style='height:350px;'>";
            echo "<div class='imgBx'>";
            echo '<img class="pic" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>';
            echo '<img class="picbig" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>';
            echo "</div>";
            echo "<div class='contentt'>";
            echo "<h2 style='margin-top:0;'>".$row['fname']."&nbsp;".$row['mname']."&nbsp;".$row['lname']."</h2>";
            echo $row['position'];
            echo "</div>";
            echo "</div>";
            echo "</div>";
      }
  ?>
   </div>
                </li>
                <li class="wow pulse" style="overflow-y: scroll;overflow-x: hidden;"> <!--- Administrative --->
                    <h2 class="wow fadeInUp board" style="font-family: 'Dancing Script', cursive; font-size: 50px; margin-top: 0;">- Administrative Officers -</h2>
   <div class="wow zoomIn yb-php2" style="background:none">
  <?php 
  $db=mysqli_connect('localhost','root','','yearbook');
  $goo= $_SESSION['Users3'];
         $user_check_query = "SELECT * FROM tab2 WHERE year='$goo' ORDER BY lname";
         $result = mysqli_query($db, $user_check_query);

         while ($row = mysqli_fetch_array($result)){
            echo "<div class='container'>";
            echo "<div class='card' style='height:350px;'>";
            echo "<div class='imgBx'>";
            echo '<img class="pic" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>';
            echo '<img class="picbig" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>';
            echo "</div>";
            echo "<div class='contentt'>";
            echo "<h2 style='margin-top:0;'>".$row['fname']."&nbsp;".$row['mname']."&nbsp;".$row['lname']."</h2>";
            echo $row['position'];
            echo "</div>";
            echo "</div>";
            echo "</div>";
      }
  ?>
   </div>
                </li>
                    <li class="wow pulse"> <!--- Message --->
                    
                            <div class="yb-php" style="background:none;overflow-y: scroll;overflow-x: hidden;" id="text2">
                            <center><img class="wow fadeInDown imahe" src="CvSU/message.jpg" style="width:80%;height: 100%;"></center>
                        
                    </div>
                </li>
                <li class="wow pulse" style="overflow-y: scroll;overflow-x: hidden;"> <!--- Vision --->
                    <div class="overlay">
                        <div class="text">
                            <div class="yb-php" style="background:none;" id="text2">
                            <center><h2 class="wow zoomIn"><b>VISION</b></h2>
                            <p class="wow fadeInLeft" style="justify-content: center;width:80%;font-family: Oswald;">The Dr. Filemon C. Aguilar Memorial College of Las Piñas (DFCAMCLP), as a public institution of higher learning, commits itself to educate and serve the less priviledge but deserving students of Las Piñas City.<br><br>
                            &nbsp;Through quality tertiary education by emphasizing the importance of knowledge and skills honed through strong values fashioned from the best in human and Filipino tradition. It shall strive to achieve responsible service that will contribute to the common efforts towards community building, national development and global solidarity.
                            </p></center>
                        </div>
                    </div>
                </div>
                </li>
                <li class="wow pulse"> <!--- Mission --->
                    <div class="overlay">
                        <div class="text">
                            <center><h2 class="wow fadeInRight"><b>MISSION</b></h2>
                            <p class="wow fadeInLeft" style="justify-content: center;width:100%;font-size: 40px;font-family: Oswald;">Guided by its vision, the DFCAMCLP committed to: Motivate and develop competent, productive and ethical professionals, leaders and citizens of Las Piñas.</p></center>
                        </div>
                    </div>
                </li>
               
                <li class="wow pulse"> <!--- Title --->
                    <div class="overlay">
                        <div class="text">
                            <center><strong><h2 class="wow zoomIn" data-wow-delay=".2s" style="font-family:Oswald;">KABATAAN:<br>ANG PAG-ASA NG BAYAN</h2></strong></center>
                        </div>
                    </div>
                </li>
            </ul>
                <!--- Float Exit --->
                <a href="menu.php" class="float">
                <i class="my-float" style="font-family: Oswald;font-size: 40px;font-style: normal;">&#215;</i>
                </a>
                <div class="label-container">
                <div class="label-text">Exit</div>
                <i class="label-arrow"></i>
                </div>

            <div class="ctrl">
                <div class="ctrl-content">
                    <i class="fa fa-2x" style="font-size: 80px;"><</i>
                    <div class="image">
                        <h2></h2>
                    </div>
                </div>
                <div class="ctrl-content">
                    <i class="fa fa-2x" style="font-size: 80px;">></i>
                    <div class="image"></div>
                </div>
            </div>
        </div>
        <!-- =============================== End Slider =============================== -->
<!-- partial -->


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/3211/jquery.parallax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.4/jquery.fullPage.min.js'></script>
<script  src="./script.js"></script>

</body>
</html>
