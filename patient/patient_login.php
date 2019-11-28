<?php include "../templates/header.php";
require_once "../config.php";
$query = "SELECT MRN from patient";
$responce = mysqli_query($dbc, $query);
if ($responce){
  echo '<table>';
  while ($row = mysqli_fetch_array($responce)){
    '<tr><td>' . $row['MRN'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
}
else{
  echo "Error with database";
  echo mysqli_connect_error($dbc);
}

mysqli_close($dbc);


if (isset($_POST['submit'])){
  $MRN=$_POST['MRN'];
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
