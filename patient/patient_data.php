<?php
  include "../templates/header.php";

  require_once "../config.php";

  $query = 'SELECT * from patient where MRN = $_GET["MRN"]';
  $responce = mysqli_query($dbc, $query);

  if ($responce){
    echo "Name: " . $responce['Fname'];
  }
  else{
    echo "Error with database";
    echo mysqli_connect_error($dbc);
  }

  mysqli_close($dbc);
 ?>
