<?php


  include "../templates/header.php";
  require_once "../config.php";


  if (isset($_POST['doctorID'])){
    $user = $_POST['doctorID'];
    $_SESSION["user"] = $user;
  }
  $login = $_SESSION["loginID"];

  if ($login == "doctor"){
    echo '<a href="../doctor/doctor_schedule.php">Schedule</a>';
    $query = "SELECT pMRN, pFName, pLName, pPhone, pAge from patient where drID = '$_SESSION["user"]'";
  }
  else if ($login == "reception"){
    echo '<a href="../patient/appointments.php">Appointments</a>';
    $query = "SELECT pMRN, pFName, pLName, pPhone, pAge from patient";
  }
  if (isset($_POST['doctorID'])){
    $_SESSION['doctorID']=$_POST['doctorID'];
  }
  $responce = mysqli_query($dbc, $query);

  $tablerownum = "1";

  if ($responce){
    echo '<table> <tr class="pat-table-head">
    <td>MRN</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Phone Number</td>
    <td>Age</td></tr>';
      while ($row = mysqli_fetch_array($responce)){
        echo '<tr class="pat-table-row' . $tablerownum . '"> <td>' .
        $row['pMRN'] . '</td> <td>' .
        $row['pFName'] . '</td> <td>' .
        $row['pLName'] . '</td> <td>' .
        $row['pPhone'] . '</td> <td>' .
        $row['pAge'] . '</td><td> <a href="./patient_data.php?MRN=' . $row['pMRN'] . '">View</a></td><td> <a href="../doctor/create_prescription.php?MRN=' . $row['pMRN'] . '">Create Prescription</a></td>';
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



<?php include "../templates/footer.php"; ?>
