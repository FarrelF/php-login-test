<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "login_test";

  $link = mysqli_connect($server, $username, $password, $database);
  if (mysqli_connect_errno()) {
    echo "Database gagal di koneksikan !".mysqli_connect_error();
  }
?>
