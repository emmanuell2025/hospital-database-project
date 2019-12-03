<?php
include "../templates/header.php";
require_once "../config.php";

if (isset($_SESSION["MRN"])){
  $MRN = $_SESSION["MRN"];
  $query = "SELECT apDate, apTime, apDesc, roomNum, drLName, procCost
  FROM appointment, doctor, proc
  WHERE appointment.procID = proc.procID
  AND doctor.drID = appointment.drID
  AND doctor.drID = proc.drID
  AND appointment.pMRN = proc.pMRN
  AND appointment.pMRN = '$MRN'";
}
else {
  $query = "SELECT appointment.pMRN, pLName, pFName, apDate, apTime, apDesc, roomNum, drLName, procCost
FROM appointment, doctor, proc, patient
WHERE appointment.procID = proc.procID
AND doctor.drID = appointment.drID
AND doctor.drID = proc.drID
AND appointment.pMRN = proc.pMRN
AND appointment.pMRN = patient.pMRN";
}

$login = $_SESSION["loginID"];
echo $login;

$responce = mysqli_query($dbc, $query);

if ($responce){
  echo '<table><tr class="theader">';
  if ($login=="reception"){
    echo '<td>MRN</td><td>Patient Name</td>';
  }
  echo '
  <td>Date</td>
  <td>Time</td>
  <td>Description</td>
  <td>Room</td>
  <td>Doctor</td>
  <td>Cost</td>
  </tr>';
  $tablerownum = "0";
    while ($row = mysqli_fetch_array($responce)){
      echo '<tr class="trow' . $tablerownum .'"> <td>';
      if ($login=="reception"){
        echo $row['pMRN'] . '</td> <td>' .
        $row['pFName'] . " " . $row['pLName'] . '</td> <td>';
      }
      echo $row['apDate'] . '</td> <td>' .
      $row['apTime'] . '</td> <td>' .
      $row['apDesc'] . '</td> <td>' .
      $row['roomNum'] . '</td> <td>' .
      $row['drLName'] . '</td> <td>' .
      $row['procCost'] . '</td><td>';
      if ($login == "reception"){
        echo '<a href="../reception/create_appointment.php?MRN=' . $row['pMRN'] . '">Create Appointment</a></td>';
      }
      echo '</tr>';
      if ($tablerownum == "1") {
        $tablerownum = "0";
      }
      else {
        $tablerownum = "1";
      }
    }
    echo '</table>';
}
else{
  echo "Error with database";
  echo mysqli_connect_error($dbc);
}

mysqli_close($dbc);
 ?>
