<?php 
    session_start();
    if (isset($_SESSION["user_login"])) {
        header("location:phishinggetstarted.php");
      }        
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
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
<script>sessionStorage.setItem("sound", "on");</script>
<body>
  <div class="login-root">
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="padding-bottom--24" style="margin-left: 2%">
          <img src="./Image/iconCODE-FINAL-RGB-FULL - original.png" style="width: 20%;"></img>
        <!--<img src="./Image/RMIT_Cyberhub.png" style="width: 23%;"></img>-->
        </div>
        <div class="formbg-outer" style="background-image: url('Image/regis_background02.jpg'); background-repeat: repeat; background-attachment: fixed; background-size: 100%; min-height:100%;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">  
          <h1><a href="" style="color: #222160" rel="dofollow">HOẠT ĐỘNG AN NINH MẠNG</a></h1>
        </div>
          <div class="formbg" style="margin-top: 5%; margin-bottom:5%">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15" style="margin-left: 30%">ĐĂNG NHẬP</span>
              <p style="font-style: italic; color: red">
              <?php
                include 'config.php';
                $username = isset($_GET['username']) ? $_GET['username'] : 1;
                $sql = "SELECT * FROM user WHERE user_name='$username'";
                $user = mysqli_query($conn,$sql);
                $result = $conn->query($sql);
                    if(mysqli_num_rows($user)>0) {
                      while($row = $result->fetch_assoc()) {
                          $code = $row['verify_code'];
                          $hash_verify = md5($code);
                        }
                  } 
                    if(isset($_SESSION["thongbao"])) {
                        if ($_SESSION["thongbao"] == "Đăng ký thành công, vui lòng đăng nhập vào tài khoản của bạn!") {
                            ?> <p style="font-style: italic; color: green"><?php echo "*" ;
                        echo $_SESSION["thongbao"]; ?></p> <?php
                        } else {
                            ?> <p style="font-style: italic; color: red"><?php echo "*" ;
                        echo $_SESSION["thongbao"]; ?></p> <?php
                        }
                        if ($_SESSION["thongbao"] === "Bạn cần xác nhận email") {
                            ?><a href="verification.php?username=<?php echo $username ?>&code=<?php echo $hash_verify ?>"> Click here</a> <?php
                        }
                        unset($_SESSION["thongbao"]);
                    }
                   
                ?>
            </p><br>
              <form id="stripe-login" action="login_submit.php" method="POST">
                <div class="field padding-bottom--24">
                  <label for="u">TÊN ĐĂNG NHẬP</label>
                  <input type ="text" name="username">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">MẬT KHẨU</label>
                  </div>
                  <input type ="password" name="password">
                </div>
                <div class="field padding-bottom--24">
                <button style="background-color: #FAC800; color: #222160" class="loginbutton" type="submit" name="submit">ĐĂNG NHẬP</button>
                </div>
                <span style="color: black; font-size: 15px">Bạn chưa có tài khoản ? <a href="index.php" style="color: #fac800; font-size: 15px">Đăng ký</a></span>
              </form>
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