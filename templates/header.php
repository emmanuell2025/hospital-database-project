<?php
  include "sidebar.php";
  session_start();
  if (isset($_SESSION["loginID"])){
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

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <a href="/hospital-database-project/logout.php">Logout</a>
    <!-- !!!!!!Change to "/logout.php" before presenting!!!!!! -->
  </body>

</html>
