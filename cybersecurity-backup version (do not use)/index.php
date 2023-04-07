<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url("/Image/wp1991165.jpg");
  min-height: 100%;
  background-position: center;
  background-size: cover;
}

.subcolumn {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.subrow:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>


<body>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white" style="background-image: url('Image/cybercover.png');">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
      <img class="imgheader" src="Image\iconCODE-FINAL-RGB-FULL-reverse.png" style="width: 15%; "></img>
   
         <form method="post" style="float:right">
             
        <button type="submit" name="button1" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img class="imgheader" src="Image\speaker.png" style="width: 100%; "></img></button><br>
        <button type="submit" name="button2" style="padding: 0;border: none;background: none; width: 50px; height: 50px; cursor: pointer;"><img class="imgheader" src="Image\muted.png" style="width: 100%; "></img></button>
            
        </form>     
  </div>
  
        <?php 
        if(isset($_POST['button1'])) {
            
            ?>
            <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display: none"></iframe>
              <audio id="audio1" autoplay loop>
              <source src="Music/welcomemusic.mp3" type="audio/mp3">
              </audio></a>
            <?php
        } if(isset($_POST['button2'])) {
            ?> 
            <iframe src="https://olafwempe.com/mp3/silence/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display: none"></iframe>
              <audio id="audio1" muted >
              <source src="Music/welcomemusic.mp3" type="audio/mp3">
              </audio></a>
            <?php
        }
        ?>
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-top" style="text-align: center;">WELCOME TO CYBER SECURITY WORKSHOP</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <div class="subrow" style="margin-top: 5%;">
      <div class="subcolumn">
        <a href="https://dthlweb.com/cybersecurity/eng/login.php" target="_blank"><img class="imgheader" src="Image\engchoose.png" style="width: 100%; "></img></a>
      </div>
      <div class="subcolumn">
        <a href="https://dthlweb.com/cybersecurity/vn/login.php" target="_blank"><img class="imgheader" src="Image\vnchoose.png" style="width: 100%; "></img></a>
      </div>
    </div>
  </div>
  <div class="w3-display-bottomleft w3-padding-large">
    Designed by <a href="https://code-rmit.edu.vn/" target="_blank">RMIT Centre of Digital Excelence</a>
    <p>Developer: La Tran Hai Dang</p>
  </div>
</div>

</body>
</html>
