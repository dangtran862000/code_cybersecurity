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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
   <?php include 'style.css'; ?>
   <?php include 'logincss.css'; ?>
   <?php include 'css-circular-prog-bar.css'; ?>
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
  @media screen and (min-width: 1024px) and (max-width: 1385px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1050px;
    }
    .loginbutton {
      margin-top:45%;
    }
  }
  
  @media screen and (min-width: 1835px) {
    
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
    .colresponsive {
        display: none;
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

* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

</head>

<body>
<img class="imgheader_responsive" src="Image\iconCODE-FINAL-RGB-FULL - original.png"></img>
  <div class="header">
      <img class="imgheader" src="Image\iconCODE-FINAL-RGB-FULL - original.png"></img>

  <div class="header-right">
    <a href="phishinggetstarted.php">Truy Tìm Sự Thật</a>
    <a  href="passwordgetstarted.php">Mật Khẩu</a>
    <a  class="active" href="feedback.php">Góp ý</a>
    <a href="logout.php">Log out</a>
  </div>

    </div>
    <div class="colresponsive" style="background-color: rgb(219, 226, 245); padding-top: 0.5%; padding-bottom:10%">
      <div >
        <div style="margin-top: 3%; margin-left: 15%; margin-right:15%">    
        <img src="Image\passwordbanner.png" style="width: 100%; float: center; margin-top:0.5%"></img>
        
       
<div class="container" style="margin-top: 5%">
  <h1 style="text-align: center; float: center; margin-top: 10%; margin-bottom: 10%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica; font-size: 50px;" class = "center">CẢM ƠN BẠN ĐÃ PHẢN HỒI, NHỮNG Ý KIẾN CỦA BẠN RẤT HỮU ÍCH CHO CODE ĐỂ PHÁT TRIỂN NHỮNG BUỔI WORKSHOP TIẾP THEO</h1>
</div>
        <div class="box-root padding-top--44 padding-bottom--0 flex-flex flex-justifyContent--center" style="margin-top: 18%">
              
        </div>
        <div id ="phishingbutton" class="box-root padding-top--48 padding-bottom--0 flex-flex flex-justifyContent--center">
      
              
        </div>
        </div>
        </div>
      </div>
      <div class="col3" >
        <div class = "container">
            <div>
            <h1 style="text-align: center; float: center; margin-left: 15%; margin-right:15%" class = "center"></h1>
                <h1 style="text-align: center; float: center; margin-top: 10%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica; font-size: 20px;" class = "center">MÀN HÌNH ĐANG BỊ THU NHỎ, ẢNH HƯỞNG ĐẾN TRẢI NGHIỆM CỦA BẠN</h1>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">VUI LÒNG SỬ DỤNG TRÌNH DUYỆT WEB TRÊN MÁY TÍNH (PC/LAPTOP)</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">MỞ TOÀN MÀN HÌNH CỦA TRÌNH DUYỆT WEB</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">ĐỂ CÓ TRẢI NGHIỆM TỐT NHẤT KHI CHƠI GAME</h3>
                </div>
                </div>
            </div>
            </div>
        </div>
      </div>

    </div>
    <div class="footer">
    <span><a href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
    <h4 style="display: block">Contact us</h5><a href="mailto:code@rmit.edu.vn"><h4 style="color: darkblue">code@rmit.edu.vn</h4></a><br>

    </div>

</body>
<script>
// var x = document.getElementById("phishingbutton");
// x.style.display = "none";
// function myFunction() {
//   var x = document.getElementById("phishingbutton");
//   var y = document.getElementById("startedbutton");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//     y.style.display = "none";
//   } else {
//     x.style.display = "none";
//     y.style.display = "block";
//   }
// }
</script>

</html>