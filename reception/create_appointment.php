<?php

include "../templates/header.php";
require_once "../config.php";

if (isset($_GET["MRN"])){
  $MRN = $_GET["MRN"];
}
else {
  $MRN = "";
}

if(isset($_POST['submit'])){
  $apID = $_POST['apID'];
  $DeptID = $_POST['DeptID'];
  $apDesc = $_POST['apDesc'];
  $procID = $_POST['procID'];
  $roomNum = $_POST['roomNum'];
  $apDate = $_POST['apDate'];
  $apTime = $_POST['apTime'];
  $apTime .= ":00";
  $pMRN = $_POST['pMRN'];
  $drID = $_POST['drID'];

  echo $_POST['apTime'];
  echo "<br>";
  echo $_POST['apDate'];
  echo "<br>";
  echo "<br>";
  echo $apTime;

  $query = "INSERT into appointment values ('$apID', '$DeptID', '$apDesc', '$procID', '$roomNum', '$apDate', '$apTime', '$pMRN', '$drID')";
  $foreignDisable = "SET FOREIGN_KEY_CHECKS=0";
  $foreignEnable = "SET FOREIGN_KEY_CHECKS=1";
  mysqli_query($dbc, $foreignDisable);
  $responce = mysqli_query($dbc, $query);
  if ($responce){
    echo "Appointment Created Successfully";
    header("Refresh:3;url=../patient/appointments.php");
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
    <label for="apID">Appointment ID</label> <input type="text" name="apID" value="">
    <label for="DeptID">Department ID</label> <input type="text" name="DeptID" value="">
    <label for="apDesc">Description</label> <input type="text" name="apDesc" value="">
    <label for="procID">Procedure ID</label> <input type="text" name="procID" value="">
    <label for="roomNum">Room #</label> <input type="text" name="roomNum" value="">
    <label for="apDate">Date</label> <input type="date" name="apDate" value="">
    <label for="apTime">Time</label> <input type="time" name="apTime" value="">
    <label for="pMRN">Patient MRN</label> <input type="text" name="pMRN" value="<?php echo $MRN; ?>">
    <label for="drID">Doctor ID</label> <input type="text" name="drID" value="">
    <input type="submit" name="submit" value="submit">

  </form>
  </div>
</body>
