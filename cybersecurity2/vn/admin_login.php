<?php 
    session_start();
    if (isset($_SESSION["admin_login"])) {
        header("location:admin_login.php");
      }        
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập</title>
  <link rel="stylesheet" type="text/css" href="logincss.css">
</head>

<body>
<div class="header">
      <h1>PASSWORD GAME <a href="logout.php" title="LogOut" class="btn btn-info btn-lg logout_header" style="float: right; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a></h1>
      
    </div>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">  
        <img src="../../Image/iconCODE-FINAL-RGB-FULL - original.png" style="width: 20%;" class="center"></img>
        </div>
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">  
          <h1><a href="" rel="dofollow" style="color: #fac800">CYBER SECURITY WORKSHOP</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Đăng nhập vào tài khoản admin</span>
              <p style="font-style: italic; color: red">
              <?php
                include 'config.php';
                $username = isset($_GET['username']) ? $_GET['username'] : 1;
                $sql = "SELECT * FROM user_vn WHERE user_name='$username'";
                $user = mysqli_query($conn,$sql);
                $result = $conn->query($sql);
                    if(mysqli_num_rows($user)>0) {
                      while($row = $result->fetch_assoc()) {
                          $code = $row['verify_code'];
                          $hash_verify = md5($code);
                        }
                  } 
                    if(isset($_SESSION["thongbao"])) {
                        echo "*" ;
                        echo $_SESSION["thongbao"];
                        if ($_SESSION["thongbao"] === "Bạn cần xác nhận email") {
                            ?>:<a href="verification.php?username=<?php echo $username ?>&code=<?php echo $hash_verify ?>"> Click here</a> <?php
                        }
                        unset($_SESSION["thongbao"]);
                    }
                   
                ?>
            </p><br>
              <form id="stripe-login" action="adminlogin_submit.php" method="POST">
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
                <button class="loginbutton" type="submit" name="submit" style="background-color: #222160;">ĐĂNG NHẬP</button>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Bạn chưa có tài khoản? <a href="index.php" style="color: #fac800">Đăng ký</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>