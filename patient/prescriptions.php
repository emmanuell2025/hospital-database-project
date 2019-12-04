<?php


  include "../templates/header.php";
  require_once "../config.php";


  if(isset($_SESSION['MRN'])){
    $MRN = $_SESSION['MRN'];
  }
  else if(isset($_GET['MRN'])){
    $MRN = $_GET['MRN'];
  }

  $query = "SELECT pFName, pLName, rxID, rxCost, medName
FROM patient, prescription, medicine
WHERE patient.pMRN = prescription.pMRN
AND prescription.medID = medicine.medID
AND prescription.pMRN = '$MRN'";

  $responce = mysqli_query($dbc, $query);

  $tablerownum = "1";

  if ($responce){
    echo '<table> <tr class="pat-table-head">';
    if ($_SESSION['loginID']=='doctor'){
      echo '
      <td>First Name</td>
      <td>Last Name</td>';
    }
    echo '
    <td>Prescription ID</td>
    <td>Medicine Name</td>
    <td>Cost</td></tr>';
      while ($row = mysqli_fetch_array($responce)){
        echo '<tr class="pat-table-row' . $tablerownum . '"> <td>';
        if ($_SESSION['loginID']=='doctor'){
          echo $row['pFName'] . '</td> <td>' .
          $row['pLName'] . '</td> <td>';
        }
        echo $row['rxID'] . '</td> <td>' .
        $row['medName'] . '</td>' .
        $row['rxCost'] . '</td>';
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
