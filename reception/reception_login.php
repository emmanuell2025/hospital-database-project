<?php


include "../templates/header.php";
require_once "../config.php";
$_SESSION["loginID"] = "reception";

// $query = "SELECT drID from doctor";
// $responce = mysqli_query($dbc, $query);
//
//
// if ($responce){
//   while($row = mysqli_fetch_array($responce)) {
//     echo $row['drID'] . "\n";
// }}
// else{
//   echo "Error with database";
//   echo mysqli_connect_error($dbc);
// }
//
// mysqli_close($dbc);


if (isset($_POST['submit'])){
  $receptionID=$_POST['receptionID'];
}
?>
  <body>
    <h1>Select An Account</h1>

    <ul>
      <li class="login">
        <form action="../patient/patient_list.php" method="POST">
          <label for="doctorID">Reception ID</label>
          <input type="text" name="doctorID">
          <input type="submit" name="submit" value="Submit">
        </form>
      </li>
    </ul>
    </div>
  </body>
</html>
