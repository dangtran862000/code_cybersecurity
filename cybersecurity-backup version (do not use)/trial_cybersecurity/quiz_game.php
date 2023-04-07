<?php 
    include 'config.php';
    include 'passwordGame.php';
    echo $id_quiz;
    if( isset($_POST['submit'] ) ) {
        $current_page += 1 ;
        $answer1 = $_POST["answer"];
        echo $answer1;  
    }
    

    
    $string = 'location: passwordGame.php?page=' . (string)($id_quiz+1);
    header( $string);
   
?>