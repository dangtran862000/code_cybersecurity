<?php 
   session_start();
   include 'config.php';
   if (!isset($_SESSION["user_login"])) {
     header("location:login.php");
     die();
   }
  $title_page = isset($_GET['choice']) ? $_GET['choice'] : 1;
    if ($title_page == 1) {
        $_SESSION["level_phishing"] = 0;
        $_SESSION["attempt"] = 0;
    }

if ($_SESSION["attempt"] == 10) {
    $level_phishing = $_SESSION["level_phishing"];
    $user_login_name = $_SESSION["user_login"];
    $sql = "UPDATE user
              SET phishing_result=$level_phishing
              WHERE user_name= '$user_login_name'";
    mysqli_query($conn,$sql);
    header("location:resultphishing.php");
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Phishing Game</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style type="text/css">
<?php include 'style.css'; ?>
   <?php include 'logincss.css'; ?>
   <?php include 'css-circular-prog-bar.css'; ?>

  .imgheader_responsive {
    display: none;
  }

  @media screen and (max-width: 1385px) {
    .imgheader_responsive {
      width: 50%;
      display: block;
      margin-left: 25%;
      margin-top: 2%;
      margin-bottom: 1%;
      margin-right: auto;
    }
    .imgheader {
    display: none;
  }
  }

  .mySlides {display:none;}
  
  .logout_header {
    display: block;
  }
  .logout_footer {
    display: none;
  }
  .parent {

  height: 200px;
  width: 200px;
  position: relative;
  }
  .child {

  width: 10%;
  position: absolute;
  top: 20%;
  left: 50%;
  margin: -35px 0 0 -35px;
  }

  .responsive {
    max-width: 100%;
    height: auto;
  }

  .loginbutton {
    font-size: 16px;
    line-height: 28px;
    padding: 8px 16px;
    width: 100%;
    min-height: 44px;
    border: unset;
    border-radius: 4px;
    outline-color: rgb(84 105 212 / 0.5);
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    background-color: rgb(84, 105, 212);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                rgb(84, 105, 212) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
  }

  .loginbuttonchoice {
    margin-top: 1%;
    font-size: 1vw;
    line-height: 28px;
    padding: 8px 16px;
    width: 20%;
    min-height: 44px;
    border: unset;
    border-radius: 4px;
    outline-color: rgb(84 105 212 / 0.5);
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    background-color: rgb(84, 105, 212);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                rgb(84, 105, 212) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
  }

  @media screen and (min-width: 800px) {
    .img-col1 {
    display: none;
    }
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
    .responsive {
        margin-top: 10%;
        max-width: 100%;
        height: auto;
    }
  }

  @media screen and (max-width: 800px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
    .responsive {
        margin-top: 10%;
        max-width: 100%;
        height: auto;
    }
    
  }

  @media screen and (min-width: 860px) and (max-width: 1199px) {
    .col1 {
        height: 1000px;
    }
    .col2 {
        height: 1000px;
    }
    .responsive {
        margin-top: 5%;
        max-width: 60%;
        height: auto;
    }
  }

  @media screen and (min-width: 1200px) and (max-width: 2500px) {
    .col1 {
        height: 1000px;
    }
    .col2 {
        width: 100%;
        height: 1000px;
    }
    .responsive {
        margin-top: 0%;
        width: 60%;
        height: auto;
    }
  }
  @media screen and (min-width: 2501px) {
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
    .responsive {
        margin-top: 0%;
        width: 70%;
        height: auto;
    }
  }
  @media screen and (max-width: 780px) {
    .col-container {
      display: inline; /* Make the container element behave like a table */
      width: 100%; /* Set full-width to expand the whole page */
      
    }
    .logout_header {
      display: none;
    }
    .logout_footer {
      display: block;
    }
    .child {
      display: none;
      margin-top: 250%;
    }
    .col1 {
      display: block;
      width: 100%;
      height: 150px;
    }
    .col2 {
      max-width: 800px;
      height: 500px;
    }
    .responsive {
        margin-top: 20%;
        max-width: 100%;
        height: auto;
    }
    .loginbuttonchoice {
    margin-top: 1%;
    font-size: 2vw;
    width: 50%;
  }
  }

  @media screen and (min-width: 1159px) and (max-width: 1745px) {
    .col1 {
        height: 1500px;
    }
    .col2 {
        height: 1500px;
    } 
  }

  @media screen and (min-width: 860px) and (max-width: 1158px) {
    .col1 {
        height: 1750px;
    }
    .col2 {
        height: 1750px;
    } 
  }
  
  /* ------------------------------------------------------------------------------ */
  /* fullscreen css */
    .overlay {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0);
    }

    .overlay-content {
    position: relative;
    top: 5%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
    }

    .overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
    }

    .overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
    }

    .overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
    }

    @media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
    }
    }
    /* ------------------------------------------------------------------------------------- */


    a.disabled {
      pointer-events: none;
      cursor: default;
    }

    .col3 {
        display: none;
    }
  .logout_header {
    display: block;
  }
  .logout_footer {
    display: none;
  }
  .parent {

  height: 200px;
  width: 200px;
  position: relative;
  }
  .child {

  width: 10%;
  position: absolute;
  top: 20%;
  left: 50%;
  margin: -35px 0 0 -35px;
  }

  .position {
  float: left;
  margin: 100px 20px;
}


.imgheader {
  width: 28%; 
  float: left; 
  margin-top:0.5%;
}

  @media screen and (min-width: 1200px) and (max-width: 2500px) {
    
    .col1 {
        height: 900px;
    }
    .col2 {
        height: 1100px;
    }
  }
  @media screen and (min-width: 1825px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1250px;
    }
  }

  @media screen and (min-width: 2300px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
  }

  @media screen and (min-width: 2900px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
  }
  
  @media screen and (min-width: 1024px) and (min-width: 1835px) {
      .imgerror {
          display: none;
      }
  }

  @media screen and (max-width: 1024px) {
    .colresponsive {
        display: none;
    }

    .imgheader_responsive {
      display: none;
    }
    
    .loginbutton {
      margin-top:120%;
    }

    .header-right{
      display: none;
    }

    .imgheader {
      width: 50%;
      display: block;
      margin-left: 30%;
      margin-right: auto;
    }

    .col-container {
      display: block; /* Make the container element behave like a table */
      width: 100%; /* Set full-width to expand the whole page */
    }
    .logout_header {
      display: none;
    }
    .logout_footer {
      display: block;
    }
    .child {
      display: none;
      margin-top: 250%;
      
    }
    .col1 {
      display: block;
      width: 100%;
      height: 150px;
    }
    .col2 {
        display: none;
    background-color: rgb(219, 226, 245); /* Make elements inside the container behave like table cells */
      width: 100%;
      height: 600px;
    }

    .col3 {
      display: block;
      width: 100%;
      height: 600px;
    }
  }

    /* Create two equal columns that floats next to each other */
.subcolumn {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.subrow:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</head>

<?php 
    
    
    $title_page = isset($_GET['choice']) ? $_GET['choice'] : 1;
    if ($title_page == 1) {
        $_SESSION["level_phishing"] = 0;
        $_SESSION["attempt"] = 0;
    }
        $sql = "SELECT * FROM phishingimg WHERE title='$title_page'";
        $user = mysqli_query($conn,$sql);
        $result = $conn->query($sql);

        if(mysqli_num_rows($user)>0) {
            while($row = $result->fetch_assoc()) {
                $answer = $row['answer'];
                $hint = $row['hint'];

                if($row['answer'] == 1) {
                    $answer = TRUE;
                } else {
                    $answer = FALSE;
                }

              }
        }
        
?>


<body>
<img class="imgheader_responsive" src="Image\iconCODE.png" ></img>
    <div class="header">
      <img class="imgheader" src="Image\iconCODE.png" ></img>

  <div class="header-right">
  <a style="padding: 30px 50px" class="active" href="phishinggetstarted.php">TRUY TÌM SỰ THẬT</a>
  
    <a  style="padding: 30px 50px" href="passwordgetstarted.php">TRÒ CHƠI MẬT KHẨU</a>
    <a  style="padding: 30px 50px" href="cyberiskgetstarted.php">TẤN CÔNG MẠNG</a>
    <a style="padding: 30px 50px" href="logout.php">ĐĂNG XUẤT</a>
  </div>

    </div>
  
    <div style="padding-top: 0.5%; padding-bottom:0%; min-height:100%;">
      
    
      <div  class="colresponsive"  style="margin-top: 3%; margin-left: 5%; margin-right:5%; min-height:100%;">
        <div style="margin-top: 2%; margin-left: 15%; margin-right:15%">
                  
            <!-- -------------------------------------------------------------- -->
            <!-- Thông báo khi người dùng hết thời gian -->
            <?php if ($answer == TRUE) { ?>
              <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
                <audio id="myVideo" controls autoplay style="display:none;">
                <source src="Music/winingmusic.mp3" type="audio/mp3">
                </audio>
              <script>
                var vid = document.getElementById("myVideo");
                let soundstatus = sessionStorage.getItem("sound");
                
                function enableMute() {
                  vid.muted = true;
                  sessionStorage.setItem("sound", "mute");
                  document.getElementById("mutebutton").style.display = "none";
                  document.getElementById("unmuntebutton").style.display = "inline-block";
                }
                
                function disableMute() { 
                vid.muted = false;
                sessionStorage.setItem("sound", "on");
                  document.getElementById("mutebutton").style.display = "inline-block";
                  document.getElementById("unmuntebutton").style.display = "none";
                } 
                
                if (soundstatus == "mute") {
                    enableMute();
                } else if (soundstatus == "on") {
                    disableMute();
                }
            </script>
              <div class="subrow">
                <div class="subcolumn"><form action="phishingtest.php">
                    <button class="loginbutton" style = "cursor: default; padding: 15px 60px; background-color: #FAC800; COLOR:BLACK; font-size: 20px" type="submit" value="ROUND <?php echo $_SESSION["attempt"]; ?>" disabled>VÒNG <?php echo $_SESSION["attempt"]; ?></button>
                    <input type="text" style="display: none" id="choice" name="choice" value=<?php echo $title_page; ?>><br><br>
                </form></div>
                <div class="subcolumn"><form action="phishingtest.php">
                    <input class="loginbutton" style = "padding: 15px 80px; background-color: #e61e2A" type="submit" value="VÒNG TIẾP THEO >>>"></input>
                    <input type="text" style="display: none" id="choice" name="choice" value=<?php echo $title_page; ?>><br><br>
                </form></div>
                </div>
                <h1  style="margin-bottom: 0%; text-align: center; float: center;color: green;"></h1>
                <h4  style="margin-top: 5%; text-align: center; float: center;color: green;"><image src="Image\Authentic content.png" width="600" frameBorder="0" allowFullScreen></image></h4>
                <h3  style="margin-bottom: 5%; text-align: center; float: center;"><p  style="margin-bottom: 0%; text-align: center; float: center;">Hãy tiếp tục phát huy!</p></h3>
                
            <?php } ?>
        <!-- ----------------------------------------------------------------------------------------- -->
        <!-- lựa chọn xem hình và phóng to hình -->
            <?php if ($answer == FALSE) { ?>
                <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
                <audio id="myVideo" controls autoplay style="display:none;">
                <source src="Music/alarm.mp3" type="audio/mp3">
                </audio>
              <script>
                var vid = document.getElementById("myVideo");
                let soundstatus = sessionStorage.getItem("sound");
                
                function enableMute() {
                  vid.muted = true;
                  sessionStorage.setItem("sound", "mute");
                  document.getElementById("mutebutton").style.display = "none";
                  document.getElementById("unmuntebutton").style.display = "inline-block";
                }
                
                function disableMute() { 
                vid.muted = false;
                sessionStorage.setItem("sound", "on");
                  document.getElementById("mutebutton").style.display = "inline-block";
                  document.getElementById("unmuntebutton").style.display = "none";
                } 
                
                if (soundstatus == "mute") {
                    enableMute();
                } else if (soundstatus == "on") {
                    disableMute();
                }
            </script>
                <div class="subrow">
                <div class="subcolumn"><form action="phishingtest.php">
                    <button class="loginbutton" style = "cursor: default; padding: 15px 60px; background-color: #FAC800; COLOR:BLACK; font-size: 20px" type="submit" value="ROUND <?php echo $_SESSION["attempt"]; ?>" disabled>VÒNG <?php echo $_SESSION["attempt"]; ?></button>
                    <input type="text" style="display: none" id="choice" name="choice" value=<?php echo $title_page; ?>><br><br>
                </form></div>
                <div class="subcolumn"><form action="phishingtest.php">
                    <input class="loginbutton" style = "padding: 15px 80px; background-color: #e61e2A" type="submit" value="VÒNG TIẾP THEO >>>"></input>
                    <input type="text" style="display: none" id="choice" name="choice" value=<?php echo $title_page; ?>><br><br>
                </form></div>
                </div>
                <h1  style="margin-bottom: 0%; text-align: center; float: center;color: #E61E2A;"></h1>
                <h4 style="margin-bottom: 0%; text-align: center; float: center;color: #E61E2A;"><image  src="Image\Phishing content.png" width="600"frameBorder="0" allowFullScreen></image></h4>
                <!--<iframe src="https://giphy.com/embed/Qakz6SeDXmIMjovvC0" width="480" height="472" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>-->
                <h2  style="margin-bottom: 3%; text-align: center; float: center;color: #E61E2A;">Đừng lo lắng! Hãy cẩn thận hơn trong vòng tiếp theo.</h2>
                <!-- <h3  style=" margin-bottom: 3%;text-align: center; float: center;color: #E61E2A;"><strong style="color: #E61E2A;">GỢI Ý: <?php echo $hint; ?></strong></h3>
                 -->
                <div id="countTime" style="margin-top: 1%; margin-left: 15%; margin-right:15%">
           <span style="font-size:30px; cursor:pointer; " onclick="openNav('myNav1')">
                    <button class="loginbutton" style="margin-top: 2%; margin-bottom:10%; color: black; background-color: #FAC800; padding: 15px 50px" >BẤM VÀO ĐÂY ĐỂ XEM LẠI CÂU TRẢ LỜI SAI CỦA BẠN</button>
                    <!-- <img style="width: 300px; height: 300px; object-fit: contain; display: inline-block; magin-top: 5%; margin-left: 5%; margin-bottom: 5%" src="./phishingsrc/catphishing/<?php echo $a[$x]; ?>.png"  alt="phishing"> -->
                    </img>
                </span> 
            
                <div id="countTime" style="display:flex;">
                    <div id="myNav1" class="overlay" >
                        <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav('myNav1')">&times;</a>-->
                        <button class="closebtn" style="float: right; margin-top:30%: margin-right:30%; font-size: 30px; background-color: #FAC800;" onclick="closeNav('myNav1')">&nbsp; <strong>X<strong> &nbsp;</button>
                            <div class="overlay-content">
                            
                                <img class="responsive" src="./phishingsrc/answer/<?php echo $title_page; ?>.png" alt="phishing">
    
                            </div>
                    </div>
                </div> 
           
        <!-- ------------------------------------------------------------------------------------------------------ -->
          </div> 
            <?php } ?>
            
        </div>
      </div>

      <div class="col3" >
        <div class = "container">
            <div>
            <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 15%; margin-right:15%" class = "center"></h1>
                <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica; font-size: 20px;" class = "center">THE SCREEN IS DECREASING RESOLUTION, AFFECTING YOUR EXPERIENCE</h1>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">PLEASE USE WEB BROWSER ON PC OR LAPTOP</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">PLEASE OPEN FULLSCREEN OF WEB BROWSER</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">FOR THE BEST PLAYING GAME EXPERIENCE</h3>

                </div>
                </div>
                <div class="box-root padding-top--48 padding-bottom--0 flex-flex flex-justifyContent--center">
              
        </div>
            </div>
            </div>
        </div>
      </div>

    </div>
  </body>
    
  <footer style="padding-top:24px; padding-bottom: 24px; background-color: #222160; margin-top:auto; font-size: 14px; width: 100%; height: 130px">
            <div class="subrow">
            <div class="subcolumn" style="text-align: right">
              <span><a style="color: white; text-align: right; font-size: 14px; margin-right: 5%; font-family: font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif; font-weight: lighter;" href="https://code-rmit.edu.vn/">code-rmit.edu.vn</a></span>
              <span><a style="color: white; text-align: right; font-size: 14px; margin-right: 5%;  font-weight: lighter; " href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">cyber-security-research-innovation</a></span>
              </div>
              <div class="subcolumn">
              <span><a style="color: white; text-align: left; font-size: 14px; margin-left: 5%;  font-weight: lighter;" href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
              <span><a style="color: white; text-align: left; font-size: 14px; margin-left: 5%;  font-weight: lighter;" href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">RMIT Centre for Cyber Security Research and Innovation</a></span>
              </div>
              
            </div>
</footer>
    

</html>


<!-- ---------------------------------------------------------------------- -->
<!-- Script cho click on button to full screen img -->

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
    showDivs(slideIndex += n);
    }

    function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
    }
</script>
<!-- ---------------------------------------------------------------------- -->
<!-- Script cho click on button to full screen img -->
<script>
    function openNav(id) {
        document.getElementById(id).style.display = "block";
    }

    function closeNav(id) {
        document.getElementById(id).style.display = "none";
    }          
</script>
<!-- ---------------------------------------------------------------------- -->
<!-- Script cho dong ho dem ngươc  -->
<script type='text/javascript'>

    //<![CDATA[
    function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
    }

    function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    var choiceAnswer = document.getElementById("countTime");
    var notification_timeout = document.getElementById("notification_timeout");
    var daysSpan = clock.querySelector('.days');
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
        var t = getTimeRemaining(endtime);

        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
        clearInterval(timeinterval);
        choiceAnswer.style.display = "none";
        notification_timeout.style.display = "block";
        } else {
        notification_timeout.style.display = "none";
        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) +  1 * 60 * 1000);
    initializeClock('clockdiv', deadline);
    //]]>
</script>