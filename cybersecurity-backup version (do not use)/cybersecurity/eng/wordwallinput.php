<?php 
    include 'config.php';
    $name = $_GET["linkwordwall"];
    $sql = "UPDATE user_eng
    SET wordwall ='$name'";
    mysqli_query($conn,$sql);
    header("location: admin.php");    
?>
