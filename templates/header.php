<?php
  include "sidebar.php";
  session_start();
  
  
  if (isset($_SESSION["loginID"])){
    require_once "../config.php";
    
    $login = $_SESSION["loginID"];

    if($login == "doctor") {
      $user = $_SESSION["user"];
      $query = "SELECT doctor.drFName, doctor.drLName, doctor.drSpecialty, department.deptName
       FROM doctor, department WHERE doctor.drID = '$user' AND doctor.deptID = department.deptID;";
      $response = mysqli_query($dbc, $query);
      $row = mysqli_fetch_array($response);
      echo '<table> <tr class="profile-info"> <td>User: ' . $row["drFName"] . ' ' . $row["drLName"] . 
      '</td> <td>User number: ' . $user . '</td> <td>Department: ' . $row["deptName"] . '</td> <td> Specialty: ' . $row["drSpecialty"] . '</td> </tr> </table>';
    }
    elseif($login == "patient") {
      $mrn = $_SESSION['MRN'];
      $query = "SELECT patient.pFName, patient.pLName, patient.pMRN, doctor.drFName, doctor.drLName
       FROM doctor, patient WHERE '$mrn' = patient.pMRN AND patient.drID = doctor.drID;";
      $response = mysqli_query($dbc, $query);
      $row = mysqli_fetch_array($response);
      echo "MRN: " . $mrn . "<br>";
      echo "Patient Name: " . $row['pFName'] . ' ' . $row['pLName'] . '<br>';
      echo "Doctor's Name: " . $row['drFName'] . ' ' . $row['drLName'];
    }
    elseif($login == "reception") {
      $user = $_SESSION["user"];
      $query = "SELECT receptID, receptDept FROM reception WHERE reception.receptID = '$user';";
      $response = mysqli_query($dbc, $query);
      $row = mysqli_fetch_array($response);
      echo "User number: " . $user . "<br>Department: " . $row["receptDept"];
    }
    echo '<div class="main-header">
      <a href="../logout.php" class="logout-button">Logout</a>
      <!-- !!!!!!Change to "/logout.php" before presenting!!!!!! -->
    </div>';
  }
  else echo '
    <h1>Login Here</h1>
    <ul class="login-container">
      <li>
        <a href="doctor/doctor_login.php"><strong>Doctor Login</strong></a>
      </li>
      <li>
        <a href="patient/patient_login.php"><strong>Patient Login</strong></a>
      </li>
      <li>
        <a href="reception/reception_login.php"><strong>Reception Login</strong></a>
      </li>
    </ul>';

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body style="background-color:rgb(51, 52, 53); color:white;">
    <div class=sidebar>
      
    </div>
  </body>

</html>
