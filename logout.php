<?php
// include "./templates/header.php";
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
// echo "Thank You";
header("Refresh:0; url=./index.php");
?>
