<?php 
    session_start();
    include 'config.php';
    if( isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '') {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE user_name='$username' AND password='$password' AND role='admin'";
        $user = mysqli_query($conn,$sql);
        $result = $conn->query($sql);
        
        if(mysqli_num_rows($user)>0) {
            while($row = $result->fetch_assoc()) {
                $code = $row['verify_code'];
                $hash_verify = md5($code);
                if($row['verify'] == 1) {
                    print_r($_SESSION);
                $_SESSION["admin_login"] = $username;
                header("location:admin.php");
                } else {
                    $_SESSION["thongbao"] = 'Bạn cần xác nhận email';
                header("location:login.php?username=".$username);
                }
              }
        } else {
            $_SESSION["thongbao"] = "Bạn đã đăng nhập sai username hoặc password";
            header("location:admin_login.php"); 
        }
    } else {
        $_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
        header("location:admin_login.php");  
    }

?>