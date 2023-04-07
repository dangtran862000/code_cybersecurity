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
   .containerwordwall {
    display: block;
    margin-left: auto;
    margin-right: auto;
  position: relative;
  width: 100%;
  height: 30%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
}

.responsive-iframewordwall {
  display: block;
    margin-left: auto;
    margin-right: auto;
  text-align:center;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
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
  @media screen and (min-width: 1024px) and (max-width: 1385px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1050px;
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
    .colresponsive {
        display: none;
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

<body>
<img class="imgheader_responsive" src="Image\iconCODE.png" ></img>
    <div class="header">
      <img class="imgheader" src="Image\iconCODE.png" ></img>

  <div class="header-right">
  <a  style="padding: 30px 50px" href="phishinggetstarted.php">TRUY TÌM SỰ THẬT</a>
  
    <a style="padding: 30px 50px" href="passwordgetstarted.php">TRÒ CHƠI MẬT KHẨU</a>
    <a style="padding: 30px 50px" class="active" href="cyberiskgetstarted.php">TẤN CÔNG MẠNG</a>
    <a style="padding: 30px 50px" href="logout.php">ĐĂNG XUẤT</a>
  </div>

    </div>
    <div style="padding-top: 0.5%; padding-bottom:10%; min-height: 80%">
      <div class="colresponsive">
        <div style="margin-top: 3%; margin-left: 5%; margin-right:5%">     
        <img src="Image\cyberisk.png" style="width: 100%; float: center; margin-top:0.5%" onContextMenu="return false;"></img>
        <div style="margin-top: 3%; margin-left: 15%; margin-right:15%">  
        <div class="subrow" style="margin-top: 3%">
          <div class="subcolumn">
            <h2 style="margin-top: 5%; margin-right:10%; font-family:arial; color:  #222160;">LUẬT CHƠI: </h2>
            <h4> <li style="margin-top: 5%; margin-right:10%; font-family:arial; color:  #222160;">Bạn cần giúp Aya (một sinh viên đại học) đưa ra các quyết định về bảo mật thông tin của cô ấy trên không gian mạng.</li> </h4>
            <h4> <li style="margin-top: 5%; margin-right:10%; font-family:arial; color:  #222160;">Nhấp vào bất kỳ đâu để bắt đầu câu chuyện và chọn một tùy chọn.</li> </h4>
            <h4> <li style="margin-top: 5%; margin-right:10%; font-family:arial; color:  #222160;">Hãy cố gắng giành được điểm tối đa bạn nhé.</li> </h4>
          </div>
          <div class="subcolumn">
          <h2 style="margin-top: 5%; margin-right:10%; font-family:arial; color:  #E61E2A;">LƯU Ý: </h2>
            <h4> <li style="margin-top: 5%; margin-right:10%; font-family:arial; color: #E61E2A;">Hoạt động này chỉ dành cho mục đích giáo dục. Đại học RMIT Việt Nam sẽ không lưu bất kỳ thông tin của người chơi.</li> </h4>
            <h4> <li style="margin-top: 5%; margin-right:10%; font-family:arial; color:  #E61E2A;">Để đảm bảo an toàn cho thông tin cá nhân của bạn, không chia sẻ câu trả lời của bạn với những người chơi khác.</li> </h4>
          </div>
        </div>
        <div style="margin-top: 8%; margin-left: 0%; margin-right:0%">
            <h2 style="margin-top: 5%; margin-bottom: 5%; margin-right:10%; font-family:arial; color:  #222160;">VIDEO HƯỚNG DẪN CHƠI: </h2>     
        <div class="containerwordwall"> 
            <video class="responsive-iframewordwall" src="Image\video cyberisk VIE.mp4" autoplay loop muted frameborder="0" allowfullscreen onContextMenu="return false;"></video>
        </div>
        <div class="box-root padding-top--44 padding-bottom--0 flex-flex flex-justifyContent--center" style="margin-top: 0%">
        <form id="stripe-login" action="cyberisk.php" onclick="myFunction()">
                <div id = "startedbutton"class="field padding-top--48">
                <button class="loginbutton" type = "submit" style="color: black; background-color: #FAC800; padding: 15px 100px">NHẤN VÀO ĐÂY ĐỂ BẮT ĐẦU CHƠI</button>
                </div>
              </form>
              
        </div>
        </div>
        </div>
        </div>
      </div>
      <div class="col3" >
        <div class = "container">
            <div>
            <h1 style="text-align: center; float: center; margin-left: 15%; margin-right:15%" class = "center"></h1>
            <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 15%; margin-right:15%" class = "center"></h1>
                <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica; font-size: 20px;" class = "center">THE SCREEN IS DECREASING RESOLUTION, AFFECTING YOUR EXPERIENCE</h1>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">PLEASE USE WEB BROWSER ON PC OR LAPTOP</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">PLEASE OPEN FULLSCREEN OF WEB BROWSER</h3>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:arial; font-size: 30px;" class = "center">FOR THE BEST PLAYING GAME EXPERIENCE</h3>
                </div>
                </div>
            </div>
            </div>
        </div>
      </div>

    </div>
    <footer style="padding-top:24px; padding-bottom: 24px; background-color: #222160; margin-top:auto; font-size: 14px; width: 100%; height: 130px">
            <div class="subrow">
            <div class="subcolumn" style="text-align: right">
              <span><a style="color: white; text-align: right; font-size: 14px; margin-right: 5%" href="https://code-rmit.edu.vn/">code-rmit.edu.vn</a></span>
              <span><a style="color: white; text-align: right; font-size: 14px; margin-right: 5%" href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">cyber-security-research-innovation</a></span>
              </div>
              <div class="subcolumn">
              <span><a style="color: white; text-align: left; font-size: 14px; margin-left: 5%" href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
              <span><a style="color: white; text-align: left; font-size: 14px; margin-left: 5%" href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">RMIT Centre for Cyber Security Research and Innovation</a></span>
              </div>
              
            </div>
</footer>

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