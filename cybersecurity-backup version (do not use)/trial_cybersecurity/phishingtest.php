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

if ($_SESSION["attempt"] == 2) {
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet"  href="phishinggame.css">
<link rel="stylesheet" href="style.css">

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

  @media screen and (max-width: 1200px) {
    .responsive {
        max-width: 60%;
    }
  }
  
  @media screen and (min-width: 1200px) and (max-width: 2000px) {
    .responsive {
        max-width: 60%;
    }
    .col1 {
        height: 900px;
    }
  }
  @media screen and (min-width: 2000px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 2000px;
    }
    .loginbutton {
      margin-top:100%;
    }
  }

  @media screen and (max-width: 1024px) {
    .header-right{
      display: none;
    }
    
    .imgheader_responsive {
      display: none;
    }

    .imgheader {
      width: 50%;
      display: block;
      margin-left: 25%;
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
    .colnone {
        display: none;

    }

    .col3 {
      background-color: rgb(219, 226, 245); /* Make elements inside the container behave like table cells */
      display: block;
      width: 100%;
      height: 100%;
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
    #clockdiv h2{color:black;text-align:left;font-size:40px;margin:0 0 16px}
    #clockdiv{color:white;background:white;display:inline-block;text-align:right;font-size:50px;margin:20px auto;padding:20px;width:100%}
    #clockdiv > div{padding:10px 70px;border-radius:3px;background:#fac800;display:inline-block}
    #clockdiv div > span{padding:0;border-radius:10px;font-size:58px;display:inline-block}
    #clockdiv .smalltext{padding-top:5px;font-size:15px}

    a.disabled {
      pointer-events: none;
      cursor: default;
    }


        /* Create two equal columns that floats next to each other */
        .subcolumn1 {
          float: right;
          width: 80%;
        }
        .subcolumn2 {
          margin-left: 5%;
          float: left;
          width: 20%;
        }
        .subcolumn5 {
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

        .subcolumn {
          float: right;
          width: 50%;
        }

        .subcolumn3 {
          float: left;
          width: 35%;
          padding: 10px;
        }
        .subcolumn4 {
          float: left;
          width: 65%;
          padding: 10px;
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

                if($row['answer'] == 1) {
                    $_SESSION["level_phishing"] += 10;
                    $_SESSION["attempt"] += 1;
                    //echo '<p>true</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
                } else {
                    $_SESSION["attempt"] += 1;
                    //echo '<p>false</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
                }

              }
        } else if ($title_page == "null") {
            $_SESSION["attempt"] += 1;
            //echo '<p>'.$title_page.'</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
        } else {
            $_SESSION["attempt"] = 1;
            //echo '<p>'.$title_page.'</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
        }
        
        $sql_question = "SELECT * FROM phishingimg WHERE answer = 1
        ORDER BY RAND()
        LIMIT 1";

        $array_questions = [];
        $user_question = mysqli_query($conn,$sql_question);
        $rand_quesiton = $conn->query($sql_question);
        
        if(mysqli_num_rows($user_question)>0) {
            while($origin_question = $rand_quesiton->fetch_assoc()) {
                //echo $origin_question ['title'];
                array_push($array_questions, $origin_question ['title']) ;
              }
        }
        $sql_question = "SELECT * FROM phishingimg WHERE answer = 0
        ORDER BY RAND()
        LIMIT 4";

        $user_question = mysqli_query($conn,$sql_question);
        $rand_quesiton = $conn->query($sql_question);
        
        if(mysqli_num_rows($user_question)>0) {
            while($origin_question = $rand_quesiton->fetch_assoc()) {
                array_push($array_questions, $origin_question ['title']) ;
              }
        }
        shuffle($array_questions);
        //print_r($array_questions);;
        
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
   

    <h1 id="demo" style="display: none;"></h1>
    <div class="colresponsive" style=" padding-top: 0.5%; padding-bottom:10%; min-height:80%;">
      
      <div class="colnone" style="width: 100%">
        <div style="margin-top: 2%; margin-left: 10%; margin-right:10%">
        
          <div style = "text-align: center; float: center;" >
            
            <!-- ------------------------------------------------ -->
            <!-- Đồng hồ đếm ngược -->
            <div id="clockdiv" style="display:flex" class="subrow">
            <div class="subcolumn1">
            <div class="subrow">
            <div class="subcolumn3">
            <p  style="margin-bottom: 1%; font-size: 30px; text-align:left">VÒNG <?php echo $_SESSION["attempt"]; ?></h2>
            </div>
            <div class="subcolumn4">
            <h5 style="margin-bottom: 1%; text-align: left">&nbsp;<i class="fa fa-check-square" style="font-size:30px;color:red">&nbsp;&nbsp;&nbsp;</i>CHỈ NHẤP VÀO HÌNH ẢNH CỦA NỘI DUNG AN TOÀN</h5>
            <h5 style="margin-bottom: 1%; text-align: left">    <?php 
    if ($_SESSION["attempt"] == 1) {
      ?>
      
      <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
    
       <?php
    } else if ($_SESSION["attempt"] == 2) {
      ?>
        <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music2.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
       <?php
    } else if ($_SESSION["attempt"] == 3) { 
      ?>
      <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music3.mp3" type="audio/mp3">
        </audio>
       <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
     <?php
    } else if ($_SESSION["attempt"] == 4) {
      ?>
        <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music4.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
       <?php
    } else if ($_SESSION["attempt"] == 5) { 
      ?>
      <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music5.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
     <?php
    } else if ($_SESSION["attempt"] == 6) {
      ?>
        <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music6.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
       <?php
    } else if ($_SESSION["attempt"] == 7) { 
      ?>
      <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music7.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
     <?php
    } else if ($_SESSION["attempt"] == 8) {
      ?>
        <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music8.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
       <?php
    } else if ($_SESSION["attempt"] == 9) { 
      ?>
      <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music9.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
     <?php
    } else if ($_SESSION["attempt"] == 10) {
      ?>
        <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display:none"></iframe>
        <audio id="myVideo" controls autoplay style="display:none;">
        <source src="Music/music10.mp3" type="audio/mp3">
        </audio>
        <button id="mutebutton" onclick="enableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img src="Image\blackspeaker.png" style="width:95%"></img></button>
        <button id="unmuntebutton" onclick="disableMute()" type="button" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer; display: none"><img src="Image\blackmuted.png" style="width:95%"></img></button>
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
       <?php
    }
    
    ?>NHẤP VÀO BIỂU TƯỢNG LOA ĐỂ BẬT / TẮT ÂM THANH</h5>
            </div>
            </div>
            </div> 
           
                <div style="display:none">
                    <span class="minutes" >&nbsp;</span>
                    <div class="smalltext">&nbsp;PHÚT&nbsp;</div>
                </div>
                <div style="margin-left:5%">
                    <span class="seconds" ></span>
                    <div class="smalltext" style="text-align: center;">GIÂY</div>
                </div>
              </div>
          <div id="countTime" class="w3-content w3-display-container w3-center">
          <?php 
          for ($x = 0; $x < 5 ; $x++) {
            ?> <span style="font-size:30px; cursor:pointer; " onclick="openNav('myNav<?php echo $x; ?>')">
                    <!-- <button class="loginbutton" style="margin-top: 2%;">Hình ảnh <?php echo $x + 1; ?></button> -->
                    <img class="mySlides" src="./phishingsrc/<?php echo $array_questions[$x]; ?>.jpg" style="width:100%; border: 5px solid #222160;" onContextMenu="return false;">
                    </img>
                </span> 
            <?php } ?>

            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
            </div>

            
          
            <!-- -------------------------------------------------------------- -->
            <!-- Thông báo khi người dùng hết thời gian -->
            <div id="notification_timeout" style="margin-top: 2%; margin-left: 15%; margin-right:15%">
            <div class="subrow">
                <div class="subcolumn5"><form action="phishingtest.php">
                    <button class="loginbutton" style = "cursor: default; margin-top: 0%; padding: 15px 60px; background-color: #FAC800; COLOR:BLACK; font-size: 20px" type="submit" value="ROUND <?php echo $_SESSION["attempt"]; ?>" disabled>VÒNG <?php echo $_SESSION["attempt"]; ?></button>
                    <input type="text" style="display: none" id="choice" name="choice" value=<?php echo $title_page; ?>><br><br>
                </form></div>
                <div class="subcolumn5"><form action="phishingtest.php">
                    <input class="loginbutton" style = "margin-top: 0%; padding: 15px 80px; background-color: #e61e2A" type="submit" value="VÒNG TIẾP THEO >>>"></input>
                    <input type="text" style="display: none" id="choice" name="choice" value=null><br><br>
                </form></div>
                </div>
                <h1  style="margin-bottom: 0%; text-align: center; float: center;color: red;"></h1>
                <h4  style="margin-bottom: 0%; text-align: center; float: center;color: red;"></h4>
                <h4  style=" margin-top: 5%; margin-bottom: 0%; text-align: center; float: center;color: red;"><image style="margin-bottom: 0%; text-align: center; float: center;" src="Image\Out of time.png" width="600" frameBorder="0" allowFullScreen onContextMenu="return false;"></image></h4>
                <h4  style=" margin-top: 10%; margin-bottom: 0%; text-align: center; float: center;color: red;"><i  style="margin-top: 10%; text-align: center; float: center;color: black;">Hãy chú ý đến thời gian đếm ngược góc ở trên bên phải!</i></h4>
                
                <!-- <form>
                    <input class="loginbutton" type="submit" value="VÒNG TIẾP THEO"></input>
                    <input type="text" style="display: none" id="choice" name="choice" value=null><br><br>
                </form> -->
            </div>
        <!-- ----------------------------------------------------------------------------------------- -->
        <!-- lựa chọn xem hình và phóng to hình -->
        
          <div id="countTime" style="text-align: center;">
          <?php 
          for ($x = 0; $x < 5 ; $x++) {
            ?> <div id="countTime" style="display:flex;">
                    <div id="myNav<?php echo $x; ?>" class="overlay" >
                        <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav('myNav<?php echo $x; ?>')">&times;</a>-->
                        <button class="closebtn" style="float: right; margin-top:30%: margin-right:30%; font-size: 30px; background-color: #fac800;" onclick="closeNav('myNav<?php echo $x; ?>')">&nbsp; X &nbsp;</button>
                            <div class="overlay-content">
                            
                                <img class="responsive" src="./phishingsrc/<?php echo $array_questions[$x]; ?>.jpg" alt="phishing" onContextMenu="return false;">
                                <form action="answerphishing.php">
                                <input class="loginbuttonchoice" type="submit" style="background-color: #e61e23; width:50%; padding: 20px 80px;" value="XÁC NHẬN ĐÂY LÀ ĐÁP ÁN AN TOÀN"></input>
                                <input type="text" style="display: none" id="choice" name="choice" value=<?php echo $array_questions[$x]; ?>><br><br>
                                </form>
                            </div>
                    </div>
                </div> 
            <?php
          }
          ?> 
        <!-- ------------------------------------------------------------------------------------------------------ -->
          </div>
        </div>

        </div>
      </div>
      <div class="col3" style="background-color: white;">
        <div class = "container" style="min-height: 100%">
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
    <footer style="padding-top:24px; padding-bottom: 24px; background-color: #222160; margin-top:auto; font-size: 14px; width: 100%; height: 130px">
            <div class="subrow">
            <div class="subcolumn" style="text-align: left">
            <span><a style="color: white; text-align: right; font-size: 14px; margin-left: 5%" href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
              <span><a style="color: white; text-align: right; font-size: 14px; margin-left: 5%" href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">RMIT Centre for Cyber Security Research and Innovation</a></span>
            
              </div>
              <div class="subcolumn" style="text-align: right">
              <span><a style="color: white; text-align: left; font-size: 14px; margin-right: 5%" href="https://code-rmit.edu.vn/">code-rmit.edu.vn</a></span>
              <span><a style="color: white; text-align: left; font-size: 14px; margin-right: 5%" href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">cyber-security-research-innovation</a></span>
              </div>
              
            </div>
</footer>
  </body>
    
    
    

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
        clockdiv.style.display = "none";
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

</script>
<script>
    

</script>