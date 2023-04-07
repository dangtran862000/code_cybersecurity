<?php 
    session_start();
    if (isset($_SESSION["user_login"])) {
        header("location:phishinggetstarted.php");
      }   
?>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng ký</title>
  <link rel="stylesheet" type="text/css" href="logincss.css">
</head>
<style><?php include 'logincss.css'; ?>
    /* Create two equal columns that floats next to each other */
    .subcolumn {
  float: right;
  width: 50%;
}

/* Clear floats after the columns */
.subrow:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<body>
  <div class="login-root">
   
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="padding-bottom--24" style="margin-left: 2%">
          <img src="./Image/iconCODE-FINAL-RGB-FULL - original.png" style="width: 20%;"></img>

        </div>
    
        
        <div class="formbg-outer" style="background-image: url('Image/regis_background02.jpg'); background-repeat: repeat; background-attachment: fixed; background-size: 100%; min-height:100%;" >
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">  
          <h1><a href="" style="color: #222160" rel="dofollow">ĐĂNG KÝ TÀI KHOẢN</a></h1>
        </div>
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <p style="font-style: italic; color: red">
                <?php 
                    if(isset($_SESSION["thongbao"])) {
                        echo "*" ;
                        echo $_SESSION["thongbao"];
                        unset($_SESSION["thongbao"]);
                    }
                ?>
            </p><br>
              <form id="stripe-login" action="register_submit.php" method="POST">
                <div class="field padding-bottom--24">
                  <label for="username">TÊN ĐĂNG NHẬP</label>
                  <input type ="text" name="username">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="email">EMAIL</label>
                  </div>
                  <input type ="email" name="email">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">MẬT KHẨU</label>
                  </div>
                  <input type ="password" name="password">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">NHẬP LẠI MẬT KHẨU</label>
                  </div>
                  <input type ="password" name="repassword">
                </div>
                <div class="field padding-bottom--24">
                <button style="background-color: #FAC800; color: #222160" class="loginbutton" type="submit" name="submit">ĐĂNG KÝ</button>
                </div>
              </form>
              <span style="color: black; font-size: 15px">Bạn đã có tài khoản? <a href="login.php" style="color: #fac800; font-size: 15px">Đăng nhập</a></span>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
    
  </div>
  <footer style=" padding-top:24px; padding-bottom: 24px; background-color: #222160; margin-top:auto; font-size: 14px; width: 100%;">
            <div class="subrow">
            <div class="subcolumn" style="text-align: right">
              <span><a style="color: white; text-align: right; font-size: 14px; margin-right: 10%" href="https://code-rmit.edu.vn/">code-rmit.edu.vn</a></span>
              <span><a style="color: white; text-align: right; font-size: 14px; margin-right: 10%" href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">cyber-security-research-innovation</a></span>
              </div>
              <div class="subcolumn">
              <span><a style="color: white; text-align: left; font-size: 14px; margin-left: 10%" href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
              <span><a style="color: white; text-align: left; font-size: 14px; margin-left: 10%" href="https://www.rmit.edu.au/research/centres-collaborations/cyber-security-research-innovation">RMIT Centre for Cyber Security Research and Innovation</a></span>
              </div>
            </div>
</footer>
</body>

</html>