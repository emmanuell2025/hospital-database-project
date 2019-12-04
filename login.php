<?php

session_start();

if ($_SESSION['loginID']=='doctor'){
  $_SESSION["user"] = $_POST['doctorID'];
  $_SESSION["doctorID"] = $_POST['doctorID'];
  echo "doctor";
  header("Refresh:0; url=./patient/patient_list.php");
}
else if ($_SESSION['loginID']=='reception'){
  $_SESSION["user"] = $_POST['receptionID'];
  echo "reception";
  header("Refresh:0; url=./patient/patient_list.php");
}
else if ($_SESSION['loginID']=='patient'){
  $_SESSION["user"] = $_POST['MRN'];
  $_SESSION["MRN"]=$_POST['MRN'];
  echo "patient";
  header("Refresh:0; url=./patient/patient_data.php");
}

?>
