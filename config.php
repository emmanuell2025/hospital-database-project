<?php
DEFINE ('DB_USER', getenv('DB_USERNAME'));
DEFINE ('DB_PASSWORD', getenv('DB_PASSWORD_ACCESS'));
DEFINE ('DB_HOST', getenv('DB_SERVER'));
DEFINE ('DB_NAME', getenv('DB_DATABASE'));




// INSTRUCTIONS FOR XAMPP MYSQL ACCESS
// cd C:\xampp\mysql\bin or cd /opt/lampp/bin/
// windows: mysql.exe -u DB_USERNAME -p -h DB_SERVER
// linux: ./mysql -u DB_USERNAME -p -h DB_SERVER
// password: -
// use -

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
