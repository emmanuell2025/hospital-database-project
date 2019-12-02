<?php include "../templates/header.php";
require_once "../config.php";

session_start();

$query = "SELECT pMRN from patient";
$responce = mysqli_query($dbc, $query);
if ($responce){
  while($row = mysqli_fetch_array($responce)) {
    echo $row['pMRN'] . "\n"; // Print a single column data
    // echo print_r($row);       // Print the entire row data
}
}
else{
  echo "Error with database";
  echo mysqli_connect_error($dbc);
}

mysqli_close($dbc);


if (isset($_POST['submit'])){
  $MRN=$_POST['MRN'];
  $_SESSION["login"]="patient";
  $_SESSION["MRN"]=$MRN;
}
?>
  <body>
    <h1>Select An Account</h1>

    <ul>
      <li>
        <form class="login" action="../patient/patient_data.php" method="POST">
          <label for="MRN">Patient MRN</label>
          <input type="text" name="MRN">
          <input type="submit" name="submit" value="Submit">
        </form>
      </li>
    </ul>
  </body>
</html>
<?php include "../templates/footer.php"; ?>
