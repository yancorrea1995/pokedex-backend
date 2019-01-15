<?php

// db credentials
define('DB_HOST', 'us-cdbr-iron-east-01.cleardb.net:3306');
define('DB_USER', 'be1ac295a270bf');
define('DB_PASS', '8b76acd3');
define('DB_NAME', 'heroku_1f10eb5821ace69');

// Connect with the database.
function connect()
{
  $connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);

  if (mysqli_connect_errno($connect)) {
    die("Failed to connect:" . mysqli_connect_error());
  }

  mysqli_set_charset($connect, "utf8");

  return $connect;
}

$conn = connect();


?>
