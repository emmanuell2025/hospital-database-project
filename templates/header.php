<?php
  include "sidebar.php";

  session_start();
  if (isset($_SESSION["loginID"])){
    if($_SESSION["loginID"] == "doctor") {
      
    }
    elseif($_SESSION["loginID"] == "patient") {
      
    }
    elseif($_SESSION["loginID"] == "reception") {
    
    }
    echo $_SESSION["loginID"];
  }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Simple Database App</title>
  
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="main-header">
      <a href="./logout.php" class="logout-button">Logout</a>
      <!-- !!!!!!Change to "/logout.php" before presenting!!!!!! -->
    </div>
  </body>

</html>
