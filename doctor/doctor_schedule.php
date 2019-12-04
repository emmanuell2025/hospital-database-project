<?php

  include "../templates/header.php";
  require_once "../config.php";

  $user = $_SESSION["user"];
  echo $user . "<br>";
  $query = "SELECT patient.pMRN, patient.pFName, patient.pLName, apID, apDesc, appointment.procID, roomNum, apDate, DATE_FORMAT(`appointment`.`apTime`,'%h:%i %p') FROM appointment, doctor, patient WHERE patient.pMRN = appointment.pMRN AND patient.procID = appointment.procID AND doctor.DeptID = appointment.DeptID AND doctor.drID = '$user'";
  $response = mysqli_query($dbc, $query);

  if ($response){
    echo '<table><tr class="theader">
    <td>Appointment ID</td>
    <td>Description</td>
    <td>Procedure ID</td>
    <td>Room Number</td>
    <td>Date</td>
    <td>Time</td>
    <td>Patient MRN</td>
    <td>Patient First Name</td>
    <td>Patient Last Name</td>
    </tr>';
    $tablerownum = "1";
      while ($row = mysqli_fetch_array($response)){
        echo '<tr class="trow' . $tablerownum .'"> <td>' .
        $row['apID'] . '</td> <td>' .
        $row['apDesc'] . '</td> <td>' .
        $row['procID'] . '</td> <td>' .
        $row['roomNum'] . '</td> <td>' .
        $row['apDate'] . '</td> <td>' .
        $row[8] . '</td> <td>' .
        $row['pMRN'] . '</td> <td>' .
        $row['pFName'] . '</td> <td>' .
        $row['pLName'] . '</td><td> <a href="../patient/patient_data.php?MRN=' . $row['pMRN'] . '">View</a></td>';
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
    echo $dbc->error;
  }

  mysqli_close($dbc);


?>



<?php include "../templates/footer.php"; ?>
