<?php


include "../templates/header.php";
require_once "../config.php";

$query = "SELECT drID from doctor";
$responce = mysqli_query($dbc, $query);

$_SESSION["loginID"] = "reception";

if ($responce){
  while($row = mysqli_fetch_array($responce)) {
    echo $row['drID'] . "\n";
}}
else{
  echo "Error with database";
  echo mysqli_connect_error($dbc);
}

mysqli_close($dbc);


if (isset($_POST['submit'])){
  $drID=$_POST['doctorID'];
}
?>
  <body>
    <h1>Select An Account</h1>

    <ul>
      <li>
        <form class="login" action="../patient/patient_list.php" method="POST">
          <label for="doctorID">Doctor ID#</label>
          <input type="text" name="doctorID">
          <input type="submit" name="submit" value="Submit">
        </form>
      </li>
    </ul>
  </body>
</html>
<?php include "../templates/footer.php"; ?>
