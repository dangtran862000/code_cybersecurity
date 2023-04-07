<?php 
    session_start();
    include 'config.php';
    if( isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '') {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE user_name='$username' AND password='$password'";
        $user = mysqli_query($conn,$sql);
        $result = $conn->query($sql);
        
        if(mysqli_num_rows($user)>0) {
            while($row = $result->fetch_assoc()) {
                $code = $row['verify_code'];
                $hash_verify = md5($code);
                if($row['verify'] == 1) {
                    print_r($_SESSION);
                $_SESSION["user_login"] = $username;
                $count =  1;
                $sql_count = "UPDATE user SET hooking='$count' WHERE user_name= '$username'";
                mysqli_query($conn,$sql_count);
                header("location:hooking.php");
                } else {
                
                $usernamereg = $_SESSION["usernamereg"];
                $count =  1;
                $sql_count = "UPDATE user SET hooking='$count' WHERE user_name= '$usernamereg'";
                mysqli_query($conn,$sql_count);
                header("location:hooking.php");
                }
              }
        } else {
            $usernamereg = $_SESSION["usernamereg"];
            $count =  1;
            $sql_count = "UPDATE user SET hooking='$count' WHERE user_name= '$usernamereg'";
            mysqli_query($conn,$sql_count);
            header("location:hooking.php");
        }
    } else {
        $usernamereg = $_SESSION["usernamereg"];
        $count =  1;
        $sql_count = "UPDATE user SET hooking='$count' WHERE user_name= '$usernamereg'";
        mysqli_query($conn,$sql_count);
        header("location:hooking.php");
    }

?>