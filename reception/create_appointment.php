<?php

include "../templates/header.php";

$MRN = $_GET["MRN"];


 ?>

<body>
  <form action="../patient/patient_list.php" method="post">
    <label for="DeptID">Department ID</label> <input type="text" name="deptID" value="">
    <label for="apDesc">Description</label> <input type="text" name="apDesc" value="">
    <label for="procID">Procedure ID</label> <input type="text" name="procID" value="">
    <label for="roomNum">Room #</label> <input type="text" name="roomNum" value="">
    <label for="apDate">Date</label> <input type="date" name="apDate" value="">
    <label for="apTime">Time</label> <input type="time" name="apTime" value="">
    <label for="pMRN">Patient MRN</label> <input type="text" name="pMRN" value="<?php echo $MRN; ?>">
    <label for="drID">Doctor ID</label> <input type="text" name="drID" value="">
    <input type="submit" name="submit" value="submit">

  </form>
</body>
