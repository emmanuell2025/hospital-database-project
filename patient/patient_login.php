<?php
  require_once "../config.php";

  if(!$dbc)
    die("Connection failed: " . mysqli_connect_error());
  echo "Connected to Database";
?>
