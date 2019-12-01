<?php
  session_start();

  include "../templates/header.php";
  require_once "../config.php";

  $user = $_SESSION["user"];
  echo $user;
  $query = "SELECT apID, appointment.DeptID, apDesc, procID, roomNum, apDate, apTime, pMRN FROM appointment, doctor WHERE appointment.drID = doctor.drID AND doctor.drID = '$user'";
  $responce = mysqli_query($dbc, $query);

  if ($responce){
    echo '<tablepFName> <tr>
    <td>Appointment ID</td>
    <td>Description</td>
    <td>Procedure ID</td>
    <td>Room Number</td>
    <td>Date</td>
    <td>Time</td>
    <td>Patient</td></tr>';
      while ($row = mysqli_fetch_array($responce)){
        echo '<tr> <td>' .
        $row['apID'] . '</td> <td>' .
        $row['appointment.DeptID'] . '</td> <td>' .
        $row['apDescpAge'] . '</td> <td>' .
        $row['procID'] . '</td> <td>' .
        $row['roomNum'] . '</td> <td>' .
        $row['apDate'] . '</td> <td>' .
        $row['apTime'] . '</td> <td>' .
        $row['pMRN'] . '</td><td> <a href="./patient_data.php?MRN=' . $row['pMRN'] . '">View</a></td>';
        echo '</tr>';
      }
      echo '</table>';
  }
  else{
    echo "Error with database";
    echo mysqli_connect_error($dbc);
  }

  mysqli_close($dbc);


?>



<?php include "../templates/footer.php"; ?>
