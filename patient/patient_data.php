<?php
  include "../templates/header.php";

  require_once "../config.php";

  if (isset($_POST['MRN'])){
    $_SESSION["MRN"]=$_POST['MRN'];
  }
  $_SESSION["user"]= "patient";

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
  $response = mysqli_query($dbc, $query);

  echo '<a href="./appointments.php">Appointments</a>';

  if ($response){
    while($row = mysqli_fetch_array($response)) {
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
