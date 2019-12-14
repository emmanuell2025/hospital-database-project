<?php

include "../templates/header.php";
require_once "../config.php";

if (isset($_GET["MRN"])){
  $MRN = $_GET["MRN"];
}
else {
  $MRN = "";
}
if (isset($_SESSION["doctorID"])){
  $doctorID = $_SESSION['doctorID'];
}
else {
  $doctorID = "";
}

if(isset($_POST['submit'])){
  $rxID = $_POST['rxID'];
  $pMRN = $_POST['pMRN'];
  $drID = $_POST['drID'];
  $rxCost = $_POST['rxCost'];
  $medID = $_POST['medID'];

  echo $_POST['apTime'];
  echo "<br>";
  echo $_POST['apDate'];
  echo "<br>";
  echo "<br>";
  echo $apTime;

  $query = "INSERT into prescription values ('$rxID', '$pMRN', '$drID', '$rxCost', '$medID');";
  $foreignDisable = "SET FOREIGN_KEY_CHECKS=0";
  $foreignEnable = "SET FOREIGN_KEY_CHECKS=1";
  mysqli_query($dbc, $foreignDisable);
  $responce = mysqli_query($dbc, $query);
  if ($responce){
    echo "Prescription Created Successfully";
    header("Refresh:3;url=../patient/patient_list.php");
  }
  else {
    echo "error with appointment";
    echo $dbc->error;
  }
  mysqli_query($dbc, $foreignEnable);
  mysqli_close($dbc);
}

?>

<body>
  <form action="#" method="post">
    <label for="rxID">Prescription ID</label> <input type="text" name="rxID" value="">
    <label for="pMRN">Patient MRN</label> <input type="text" name="pMRN" value="<?php echo $MRN; ?>">
    <label for="drID">Doctor ID</label> <input type="text" name="drID" value="<?php echo $doctorID; ?>">
    <label for="rxCost">Cost</label> <input type="text" name="rxCost" value="">
    <label for="medID">Medicine ID</label> <input type="text" name="medID" value="">
    <input type="submit" name="submit" value="submit">

  </form>
</div>
</body>
