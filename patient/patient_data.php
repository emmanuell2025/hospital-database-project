<?php
  include "../templates/header.php";

  require_once "../config.php";

  if (isset($_POST['MRN'])){
    $_SESSION["MRN"]=$_POST['MRN'];
    $_SESSION["user"]= "patient";
  }

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
      echo "Last Name: " . $row['pLName'] . "<br>";
      echo "Phone Number: " . $row['pPhone'] . "<br>";
      echo "Insurance: " . $row['pInsure'] . "<br>";
      echo "Address: " . $row['pAddress'] . "<br>";
      echo "SSN: " . $row['pSSN'] . "<br>";
      echo "DOB: " . $row['pDOB'] . "<br>";
      echo "Age: " . $row['pAge'] . "<br>";
  }
  }
  else{
    echo "Error with database";
    echo mysqli_connect_error($dbc);
  }

  mysqli_close($dbc);
  echo '</div>';
 ?>
