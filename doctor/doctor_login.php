<?php include "../templates/header.php";
require_once "../config.php";
// $query = "SELECT doctorID from doctor";
$responce = mysqli_query($dbc, $query);
if ($responce){
  echo '<table>';
  while ($row = mysqli_fetch_array($responce)){
    '<tr><td>' . $row['doctorID'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
}
else{
  echo "Error with database";
  echo mysqli__error($dbc);
}

mysql_close($dbc);


// if (isset($_POST['submit'])){
//   $doctorID=$_POST['doctorID'];
// }
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
