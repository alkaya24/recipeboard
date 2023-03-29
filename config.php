<?php
  define('DB_SERVER', 'db5012468103.hosting-data.io');
  define('DB_PORT', '3306');
  define('DB_USERNAME', 'dbu3851606');
  define('DB_PASSWORD', 'Deinemudda247');
  define('DB_NAME', 'dbs10483263');

  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

  if (!$conn) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>

