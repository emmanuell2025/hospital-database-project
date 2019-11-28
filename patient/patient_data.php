<?php
  include "../templates/header.php";

  require_once "../config.php";
  $MRN = $_POST["MRN"];
  $query = "SELECT * from patient where pMRN = '$MRN'";
  $responce = mysqli_query($dbc, $query);

  if ($responce){
    while($row = mysqli_fetch_array($responce)) {
      echo "MRN: " . $row['pMRN'] . "<br>";
      echo "First Name: " . $row['pFName'] . "<br>";
      // echo print_r($row);       // Print the entire row data
  }
    echo 'Good';
  }
  else{
    echo "Error with database";
    echo mysqli_connect_error($dbc);
  }

  mysqli_close($dbc);
 ?>
