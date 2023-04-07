<?php 
    session_start();
    unset($_SESSION['admin_login']);
    unset($_SESSION['level']);
    unset($_SESSION['attempt']);
    unset($_SESSION['level_phishing']);
    header('location: admin_login.php');
?>