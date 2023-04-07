<?php 
  session_start();
  if (!isset($_SESSION["user_login"])) {
    header("location:login.php");
  }
?>

<?php 
    include 'config.php';
    $name = $_GET["name"];
    $email = $_GET["email"];
    $outcome = $_GET["outcome"];
    $comment = $_GET["comment"];
    $sql = "INSERT INTO feedback (name, email, outcome, comment) VALUES ('$name', '$email', '$outcome', '$comment');";
    mysqli_query($conn,$sql);
    header("location:feedbacknoti.php");
?>
