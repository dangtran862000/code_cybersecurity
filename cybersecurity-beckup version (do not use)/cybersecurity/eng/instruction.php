<?php 
  session_start();
  if (!isset($_SESSION["user_login"])) {
    header("location:login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Cyber-Security Workshop</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="logincss.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css-circular-prog-bar.css">
<style type="text/css">
   <?php include 'style.css'; ?>
   <?php include 'logincss.css'; ?>
   <?php include 'css-circular-prog-bar.css'; ?>
   
    .imgheader_responsive {
    display: none;
  }

  @media screen and (max-width: 1385px) {
    .imgheader_responsive {
      width: 25%;
      display: block;
      margin-left: 38%;
      margin-top: 2%;
      margin-bottom: 1%;
      margin-right: auto;
    }
    .imgheader {
    display: none;
  }
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
  width: 15%; 
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
        height: 2000px;
    }
  }


  @media screen and (max-width: 1024px) {
    
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
      width: 40%;
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
      background-color: rgb(219, 226, 245); /* Make elements inside the container behave like table cells */
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
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.subrow:after {
  content: "";
  display: table;
  clear: both;
}

</style>

</head>

<body>
    <img class="imgheader_responsive" src="Image\iconCODE-FINAL-RGB-FULL - original.png"></img>
    <div class="header">
      <img class="imgheader" src="Image\iconCODE-FINAL-RGB-FULL - original.png"></img>

  <div class="header-right">
  <a  href="phishinggetstarted.php">Truy Tìm Sự Thật</a>
    <a  href="passwordgetstarted.php">Mật Khẩu</a>
    <a class="active" href="">Hướng dẫn</a>
    <a href="logout.php">Log out</a>
  </div>

    </div>

    <div class="col-container">
      <div class="col2">
        <div style="margin-top: 3%; margin-left: 15%; margin-right:15%">
        <img src="Image\instructionbanner.png" style="width: 100%; float: center; margin-top:0.5%"></img>
        <h2 style="margin-top: 5%; margin-right:10%; font-family:arial; color:  #222160;"> HƯỚNG DẪN CHƠI TRUY TÌM SỰ THẬT </h2>
        <div class="subrow">
          <div class="subcolumn">
          <h4 style="margin-top: 2%; margin-right:10%; font-family:arial; color:  #222160;">Bước 1: </h4>
          <img src="Image\phishinginstruction.png" style="width: 100%; float: center; margin-top:0.5%"></img>
          </div>
          <div class="subcolumn">
          <h4 style="margin-top: 2%; margin-right:10%; font-family:arial; color:  #222160;">Bước 2: </h4>
          <img src="Image\instructionphishing2.png" style="width: 100%; float: center; margin-top:0.5%"></img>
            
          </div>
        </div>
        
        </div>
        </div>
      </div>
      
            </div>
        </div>
      </div>
      <div class="col3" >
        <div class = "container">
            <div>
                <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 15%; margin-right:15%" class = "center"></h1>
                <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica; font-size: 20px;" class = "center">MÀN HÌNH ĐANG BỊ THU NHỎ, ẢNH HƯỞNG ĐẾN TRẢI NGHIỆM CỦA BẠN</h1>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">VUI LÒNG SỬ DỤNG TRÌNH DUYỆT WEB TRÊN MÁY TÍNH (PC/LAPTOP)</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">MỞ TOÀN MÀN HÌNH CỦA TRÌNH DUYỆT WEB</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">ĐỂ CÓ TRẢI NGHIỆM TỐT NHẤT KHI CHƠI GAME</h3>

                </div>
                </div>
                <div class="box-root padding-top--48 padding-bottom--0 flex-flex flex-justifyContent--center">
              
        </div>
            </div>
            </div>
        </div>
      </div>
    </div>
    <div class="footer">
    <span><a href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
    <h4 style="display: block">Contact us</h5><a href="mailto:code@rmit.edu.vn"><h4 style="color: darkblue">code@rmit.edu.vn</h4></a><br>
      <div class="logout_footer">
    <a href="logout.php" title="LogOut" class="btn btn-info btn-lg" style="float: center; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a>
      </div>
    </div>

</body>


</html>