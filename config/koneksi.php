<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
  /* Dibawah ini adalah sebuah perintah agar mengubah kode status (Status Code) menjadi 403, saat file di akses secara langsung*/
  if (!function_exists('http_response_code')) {
    header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
  } else {
    http_response_code(403);
  }
  
  /* Dibawah ini merupakan outputnya */
  die("Anda dilarang mengaksesnya secara langsung!");

} else {
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "login_test";

  $link = mysqli_connect($server, $username, $password, $database);
  if (mysqli_connect_errno()) {
    echo "Database gagal di koneksikan !".mysqli_connect_error();
  }
}
?>