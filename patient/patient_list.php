<?php
  session_start();

  include "../templates/header.php";
  require_once "../config.php";


  $user = $_POST['doctorID'];
  $query = "SELECT pMRN, pFName, pLName, pPhone, pAge from patient where drID = '$user'";
  $responce = mysqli_query($dbc, $query);

  if ($responce){
    echo '<table> <tr>
    <td>MRN</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Phone Number</td>
    <td>Age</td></tr>';
      while ($row = mysqli_fetch_array($responce)){
        echo '<tr> <td>' .
        $row['pMRN'] . '</td> <td>' .
        $row['pFName'] . '</td> <td>' .
        $row['pLName'] . '</td> <td>' .
        $row['pPhone'] . '</td> <td>' .
        $row['pAge'] . '</td><td> <a href="./patient_data.php?MRN=' . $row['pMRN'] . '">View</a></td>';
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
