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
    if( isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != '' && $_POST["email"] != '') {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $email = $_POST["email"];
        $level = 0;
        if ($password != $repassword ){
            $_SESSION["thongbao"] = "Mật khẩu nhập lại không khớp";
            header("location:index.php");
            die();
        }
        $sql = "SELECT * FROM user WHERE user_name='$username'";
        $old = mysqli_query($conn,$sql);
        if (mysqli_num_rows($old)>0) {
            $_SESSION["thongbao"] = "Tên đăng nhập đã tồn tại !!! Vui lòng sử dụng tên đăng nhập khác";
            header("location:index.php");
            die();
        }

        

        $verificationCode = rand(100000,999999);
        $hash_code = md5($verificationCode);
    //   // send the email verification


    //     $htmlStr = "";
    //     $htmlStr .= "Hi " . $email . ",<br /><br />";
    //     $htmlStr .= "Please click the link below to verify your email address and have access to your account.<br /><br /><br />";
    //     $htmlStr .= "<a href='https://dthlweb.com/verification.php?username=$username&code=$hash_code' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
    //     $htmlStr .= " Your verify code: $verificationCode <br/><br/>";
    //     $htmlStr .= "Kind regards,<br />";
    //     $htmlStr .= "Admin<br />";

    //     $developmentMode = false;
    //     //Create an instance; passing `true` enables exceptions
    //     $mailer = new PHPMailer($developmentMode);

    //     $mailer->isSMTP();
    //     try {
    //         $mailer->SMTPDebug = 0;

    //     if ($developmentMode) {
    //     $mailer->SMTPOptions = [
    //         'ssl'=> [
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => true
    //         ]
    //     ];
    //     }

    //     $mailer->Host = 'dthlweb.com';
    //     $mailer->SMTPAuth = true;
    //     $mailer->Username = 'info@dthlweb.com';
    //     $mailer->Password = 'Haidang86.';
    //     $mailer->SMTPSecure = 'tls'; //'tls'
    //     // $mailer->SMTPAutoTLS = false;
    //     $mailer->Port = 587; //587, 465, 25, 2525 have been tested

    //     $mailer->setFrom('info@dthlweb.com', 'Hai Dang Admin');
    //     $mailer->addAddress($email, $username);

    //     //Content
    //     $mailer->isHTML(true); // Set email format to HTML
    //     $mailer->Subject = 'Verification Step';
    //     $mailer->Body = "Hi $username, <br/><br/><a href='https://dthlweb.com/autoverify.php?username=$username&code=$hash_code/' >VERIFY YOUR EMAIL HERE</a><br /><br />Your verify code: $verificationCode <br/><br/>Kind regards,<br />Admin";
    //     $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //     $mailer->send();
    //     $mailer->ClearAllRecipients();
        
    //     echo "MAIL HAS BEEN SENT SUCCESSFULLY";
        
    //     } catch (Exception $e) {
    //         echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
    //     }
        
        $password = md5($password);
        $sql = "INSERT INTO user (user_name,email,password,verify_code,verify,level) VALUES ('$username','$email','$password','$verificationCode',1,'$level')";
        mysqli_query($conn,$sql);
        ?> <?php
        $_SESSION["thongbao"] = "Đăng ký thành công, vui lòng đăng nhập vào tài khoản của bạn!";
        header("location:login.php");
        ?><?php

        
    } else {
        $_SESSION["thongbao"] = "Vui lòng điền đủ thông tin để đăng ký";
        header("location:index.php");
    }
?>