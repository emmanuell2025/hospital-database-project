<?php
DEFINE ('DB_USER', 'bf7c7ff3d38152');
DEFINE ('DB_PASSWORD', '38c4dba3');
DEFINE ('DB_HOST', 'us-cdbr-iron-east-05.cleardb.net');
DEFINE ('DB_NAME', 'heroku_1ba2fa6c7c2d2b6');


// mysql://bf7c7ff3d38152:38c4dba3@us-cdbr-iron-east-05.cleardb.net/heroku_1ba2fa6c7c2d2b6?reconnect=true

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
