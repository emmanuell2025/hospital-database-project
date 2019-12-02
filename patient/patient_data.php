<?php
  include "../templates/header.php";

  require_once "../config.php";

  session_start();

  if (isset($_POST["MRN"])){
    $MRN = $_POST["MRN"];
  }
  else if (isset($_GET["MRN"])){
    $MRN = $_GET["MRN"];
  }
  else {
    echo "Error MRN Not Set";
  }
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
