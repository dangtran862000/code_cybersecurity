<?php 
  session_start();
  if (!isset($_SESSION["user_login"])) {
    header("location:login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Password Game</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="logincss.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css-circular-prog-bar.css">
<style type="text/css">
    .progress-circle {
   font-size: 40px;
   margin: 20px;
   position: relative; /* so that children can be absolutely positioned */
   padding: 0;
   width: 5em;
   height: 5em;
   background-color: #F2E9E1; 
   border-radius: 50%;
   line-height: 5em;
}

.progress-circle:after{
    border: none;
    position: absolute;
    top: 0.35em;
    left: 0.35em;
    text-align: center;
    display: block;
    border-radius: 50%;
    width: 4.3em;
    height: 4.3em;
    background-color: white;
    content: " ";
}
/* Text inside the control */
.progress-circle span {
    position: absolute;
    line-height: 10em;
    width: 10em;
    text-align: center;
    display: block;
    color: #53777A;
    z-index: 2;
}
.left-half-clipper { 
   /* a round circle */
   border-radius: 50%;
   width: 5em;
   height: 5em;
   position: absolute; /* needed for clipping */
   clip: rect(0, 5em, 5em, 2.5em); /* clips the whole left half*/ 
}
/* when p>50, don't clip left half*/
.progress-circle.over50 .left-half-clipper {
   clip: rect(auto,auto,auto,auto);
}
.value-bar {
   /*This is an overlayed square, that is made round with the border radius,
   then it is cut to display only the left half, then rotated clockwise
   to escape the outer clipping path.*/ 
   position: absolute; /*needed for clipping*/
   clip: rect(0, 2.5em, 5em, 0);
   width: 5em;
   height: 5em;
   border-radius: 50%;
   border: 0.45em solid #53777A; /*The border is 0.35 but making it larger removes visual artifacts */
   /*background-color: #4D642D;*/ /* for debug */
   box-sizing: border-box;
  
}
/* Progress bar filling the whole right half for values above 50% */
.progress-circle.over50 .first50-bar {
   /*Progress bar for the first 50%, filling the whole right half*/
   position: absolute; /*needed for clipping*/
   clip: rect(0, 5em, 5em, 2.5em);
   background-color: #53777A;
   border-radius: 50%;
   width: 5em;
   height: 5em;
}
.progress-circle:not(.over50) .first50-bar{ display: none; }


/* Progress bar rotation position */
.progress-circle.p0 .value-bar { display: none; }
.progress-circle.p1 .value-bar { transform: rotate(4deg); }
.progress-circle.p2 .value-bar { transform: rotate(7deg); }
.progress-circle.p3 .value-bar { transform: rotate(11deg); }
.progress-circle.p4 .value-bar { transform: rotate(14deg); }
.progress-circle.p5 .value-bar { transform: rotate(18deg); }
.progress-circle.p6 .value-bar { transform: rotate(22deg); }
.progress-circle.p7 .value-bar { transform: rotate(25deg); }
.progress-circle.p8 .value-bar { transform: rotate(29deg); }
.progress-circle.p9 .value-bar { transform: rotate(32deg); }
.progress-circle.p10 .value-bar { transform: rotate(36deg); }
.progress-circle.p11 .value-bar { transform: rotate(40deg); }
.progress-circle.p12 .value-bar { transform: rotate(43deg); }
.progress-circle.p13 .value-bar { transform: rotate(47deg); }
.progress-circle.p14 .value-bar { transform: rotate(50deg); }
.progress-circle.p15 .value-bar { transform: rotate(54deg); }
.progress-circle.p16 .value-bar { transform: rotate(58deg); }
.progress-circle.p17 .value-bar { transform: rotate(61deg); }
.progress-circle.p18 .value-bar { transform: rotate(65deg); }
.progress-circle.p19 .value-bar { transform: rotate(68deg); }
.progress-circle.p20 .value-bar { transform: rotate(72deg); }
.progress-circle.p21 .value-bar { transform: rotate(76deg); }
.progress-circle.p22 .value-bar { transform: rotate(79deg); }
.progress-circle.p23 .value-bar { transform: rotate(83deg); }
.progress-circle.p24 .value-bar { transform: rotate(86deg); }
.progress-circle.p25 .value-bar { transform: rotate(90deg); }
.progress-circle.p26 .value-bar { transform: rotate(94deg); }
.progress-circle.p27 .value-bar { transform: rotate(97deg); }
.progress-circle.p28 .value-bar { transform: rotate(101deg); }
.progress-circle.p29 .value-bar { transform: rotate(104deg); }
.progress-circle.p30 .value-bar { transform: rotate(108deg); }
.progress-circle.p31 .value-bar { transform: rotate(112deg); }
.progress-circle.p32 .value-bar { transform: rotate(115deg); }
.progress-circle.p33 .value-bar { transform: rotate(119deg); }
.progress-circle.p34 .value-bar { transform: rotate(122deg); }
.progress-circle.p35 .value-bar { transform: rotate(126deg); }
.progress-circle.p36 .value-bar { transform: rotate(130deg); }
.progress-circle.p37 .value-bar { transform: rotate(133deg); }
.progress-circle.p38 .value-bar { transform: rotate(137deg); }
.progress-circle.p39 .value-bar { transform: rotate(140deg); }
.progress-circle.p40 .value-bar { transform: rotate(144deg); }
.progress-circle.p41 .value-bar { transform: rotate(148deg); }
.progress-circle.p42 .value-bar { transform: rotate(151deg); }
.progress-circle.p43 .value-bar { transform: rotate(155deg); }
.progress-circle.p44 .value-bar { transform: rotate(158deg); }
.progress-circle.p45 .value-bar { transform: rotate(162deg); }
.progress-circle.p46 .value-bar { transform: rotate(166deg); }
.progress-circle.p47 .value-bar { transform: rotate(169deg); }
.progress-circle.p48 .value-bar { transform: rotate(173deg); }
.progress-circle.p49 .value-bar { transform: rotate(176deg); }
.progress-circle.p50 .value-bar { transform: rotate(180deg); }
.progress-circle.p51 .value-bar { transform: rotate(184deg); }
.progress-circle.p52 .value-bar { transform: rotate(187deg); }
.progress-circle.p53 .value-bar { transform: rotate(191deg); }
.progress-circle.p54 .value-bar { transform: rotate(194deg); }
.progress-circle.p55 .value-bar { transform: rotate(198deg); }
.progress-circle.p56 .value-bar { transform: rotate(202deg); }
.progress-circle.p57 .value-bar { transform: rotate(205deg); }
.progress-circle.p58 .value-bar { transform: rotate(209deg); }
.progress-circle.p59 .value-bar { transform: rotate(212deg); }
.progress-circle.p60 .value-bar { transform: rotate(216deg); }
.progress-circle.p61 .value-bar { transform: rotate(220deg); }
.progress-circle.p62 .value-bar { transform: rotate(223deg); }
.progress-circle.p63 .value-bar { transform: rotate(227deg); }
.progress-circle.p64 .value-bar { transform: rotate(230deg); }
.progress-circle.p65 .value-bar { transform: rotate(234deg); }
.progress-circle.p66 .value-bar { transform: rotate(238deg); }
.progress-circle.p67 .value-bar { transform: rotate(241deg); }
.progress-circle.p68 .value-bar { transform: rotate(245deg); }
.progress-circle.p69 .value-bar { transform: rotate(248deg); }
.progress-circle.p70 .value-bar { transform: rotate(252deg); }
.progress-circle.p71 .value-bar { transform: rotate(256deg); }
.progress-circle.p72 .value-bar { transform: rotate(259deg); }
.progress-circle.p73 .value-bar { transform: rotate(263deg); }
.progress-circle.p74 .value-bar { transform: rotate(266deg); }
.progress-circle.p75 .value-bar { transform: rotate(270deg); }
.progress-circle.p76 .value-bar { transform: rotate(274deg); }
.progress-circle.p77 .value-bar { transform: rotate(277deg); }
.progress-circle.p78 .value-bar { transform: rotate(281deg); }
.progress-circle.p79 .value-bar { transform: rotate(284deg); }
.progress-circle.p80 .value-bar { transform: rotate(288deg); }
.progress-circle.p81 .value-bar { transform: rotate(292deg); }
.progress-circle.p82 .value-bar { transform: rotate(295deg); }
.progress-circle.p83 .value-bar { transform: rotate(299deg); }
.progress-circle.p84 .value-bar { transform: rotate(302deg); }
.progress-circle.p85 .value-bar { transform: rotate(306deg); }
.progress-circle.p86 .value-bar { transform: rotate(310deg); }
.progress-circle.p87 .value-bar { transform: rotate(313deg); }
.progress-circle.p88 .value-bar { transform: rotate(317deg); }
.progress-circle.p89 .value-bar { transform: rotate(320deg); }
.progress-circle.p90 .value-bar { transform: rotate(324deg); }
.progress-circle.p91 .value-bar { transform: rotate(328deg); }
.progress-circle.p92 .value-bar { transform: rotate(331deg); }
.progress-circle.p93 .value-bar { transform: rotate(335deg); }
.progress-circle.p94 .value-bar { transform: rotate(338deg); }
.progress-circle.p95 .value-bar { transform: rotate(342deg); }
.progress-circle.p96 .value-bar { transform: rotate(346deg); }
.progress-circle.p97 .value-bar { transform: rotate(349deg); }
.progress-circle.p98 .value-bar { transform: rotate(353deg); }
.progress-circle.p99 .value-bar { transform: rotate(356deg); }
.progress-circle.p100 .value-bar { transform: rotate(360deg); }
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


@media screen and (min-width: 800px) {
    .img-col1 {
    display: none;
  }
  }
  @media screen and (min-width: 1200px) and (max-width: 2500px) {
    
    .col1 {
        height: 1000px;
    }
    .col2 {
        height: 1000px;
    }
  }
  @media screen and (min-width: 2501px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
  }

  @media screen and (max-width: 800px) {
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
      height: 500px;
    }

    .col3 {
      background-color: rgb(219, 226, 245); /* Make elements inside the container behave like table cells */
      display: block;
      width: 100%;
      height: 500px;
    }
  }

</style>

</head>
<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        include 'config.php';
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $username = $_SESSION["user_login"];
        $sql = "SELECT * FROM user WHERE user_name='$username'";
        $user_level = mysqli_query($conn,$sql);
        $row_quiz = mysqli_fetch_assoc($user_level);
        $answer = $row_quiz['level'];
        ?>
<body>
    <div class="header">
      <h1>PASSWORD GAME <a href="logout.php" title="LogOut" class="btn btn-info btn-lg logout_header" style="float: right; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a></h1>
      
    </div>

    <div class="col-container">
        <div class="col1" style="position: relative;" >
            <img src="./Image/iconCODE-FINAL-RGB-FULL.png" style="width: 20%;" class=" child"></img>
            <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center img-col1">  
                <img src="./Image/iconCODE-FINAL-RGB-FULL - original.png" style="width: 40%;" class="center"></img>
            </div>
        </div>
      <div class="col2">
        <div style="margin-top: 15%; margin-left: 15%; margin-right:15%">
        <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 15%; margin-right:15%" class = "center">YOUR QUIZ RESULT</h1>
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <?php 
                    if ($answer <= 50) {
                        ?>
                        <div class="progress-circle p<?php echo $answer;?>">
                        <span><?php echo $answer;?>%</span>
                        <div class="left-half-clipper">
                            <div class="first50-bar"></div>
                            <div class="value-bar"></div>
                        </div>
                        </div><?php
                    } 
                    ?>
                    <?php 
                    if ($answer > 50) {
                        ?>
                        <div class="progress-circle over50 p<?php echo $answer;?>">
                        <span><?php echo $answer;?>%</span>
                        <div class="left-half-clipper">
                            <div class="first50-bar"></div>
                            <div class="value-bar"></div>
                        </div>
                        </div><?php
                    } 
                    ?>
        </div>
        </div>
        </div>
      </div>
      <div class="col3" >
        <div class = "container">
            <div>
                <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 15%; margin-right:15%" class = "center">YOUR QUIZ RESULT 
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center img-col1">
                <?php 
                    if ($answer <= 50) {
                        ?>
                        <div class="progress-circle over50 p<?php echo $answer;?>">
                        <span><?php echo $answer;?>%</span>
                        <div class="left-half-clipper">
                            <div class="first50-bar"></div>
                            <div class="value-bar"></div>
                        </div>
                        </div><?php
                    } 
                    ?>
                    <?php 
                    if ($answer > 50) {
                        ?>
                        <div class="progress-circle over50 p<?php echo $answer;?>">
                        <span><?php echo $answer;?>%</span>
                        <div class="left-half-clipper">
                            <div class="first50-bar"></div>
                            <div class="value-bar"></div>
                        </div>
                        </div><?php
                    } 
                    ?>
                 </div>
                </h1>
                
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
      </div>

    </div>
    <div class="footer">
      <div class="logout_footer">
    <a href="logout.php" title="LogOut" class="btn btn-info btn-lg" style="float: center; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a>
      </div>
    </div>

</body>


</html>