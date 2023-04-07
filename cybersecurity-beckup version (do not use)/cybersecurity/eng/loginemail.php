<?php
    session_start();
    require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
        require 'PHPMailer-master/PHPMailer-master/src/POP3.php';
        require 'PHPMailer-master/PHPMailer-master/src/OAuth.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

    include 'config.php';

       
        //  Kiểm tra tài khoản đã đăng ký chưa (mở comment để hiện chức năng)
        // -------------------------------------------------------------------------------------------------------------------------
   

        //  Gửi mail verify (mở comment để hiện chức năng)
        // -------------------------------------------------------------------------------------------------------------------------

       // send the email verification

        $htmlStr = "";
        $htmlStr .= "Hi  ,<br /><br />";
        $htmlStr .= "Please click the link below to verify your email address and have access to your account.<br/><br/><br/>";
        $htmlStr .= "Kind regards,<br />";
        $htmlStr .= "Admin<br />";

        $developmentMode = false;
        //Create an instance; passing `true` enables exceptions
        $mailer = new PHPMailer($developmentMode);

        $mailer->isSMTP();
        try {
            $mailer->SMTPDebug = 0;

        if ($developmentMode) {
        $mailer->SMTPOptions = [
            'ssl'=> [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ];
        }

        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'rmitcode@gmail.com';
        $mailer->Password = 'exlpvynsofqqdwnt';
        $mailer->SMTPSecure = 'tls'; //'tls'
        // $mailer->SMTPAutoTLS = false;
        $mailer->Port = 587; //587, 465, 25, 2525 have been tested

        $mailer->setFrom('rmitcode@gmail.com', 'RMIT CODE');
        $mailer->addAddress('tranhaidang.la@rmit.edu.vn', 'Hai Dang');

        //Content
        $mailer->isHTML(true); // Set email format to HTML
        $mailer->Subject = 'Đăng nhập trò chơi';
        $mailer->Body = "<!DOCTYPE html>
<html>
  <head>
    <base target='_top'>
  </head>
  <meta charset='ISO-8859-1'>
  <body>
    <div>
      
      <div style='margin-bottom:25px'></div>
      <img src='https://code-rmit.edu.vn/wp-content/uploads/2018/08/iconCODE-FINAL-RGB-FULL-e1544631108890.jpg'></img>
      <h1><span style='background-color: #0000ff; color: #ffffff;'><strong>Cyber Squid Game</strong></span></h1>
      <h4><strong>Chào mừng người chơi, </strong></h4>
      <h4>Hãy vui lòng truy cập vào <a style='font-size: 15px; color: blue;' href='https://dthlweb.com/login.php' >LINK</a> này để bắt đầu trò chơi</h4>
      <img src='https://cmccybersecurity.com/wp-content/uploads/2020/10/Cyber-Security-Importance-1080x675-1.jpeg'><img>
      

    </div>
  </body>
</html>";
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mailer->send();
        $mailer->ClearAllRecipients();
        
        header("location:admin.php");
        echo "MAIL HAS BEEN SENT SUCCESSFULLY";
        
        
        } catch (Exception $e) {
            echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
        }

    // -------------------------------------------------------------------------------------------------------------------------
?>