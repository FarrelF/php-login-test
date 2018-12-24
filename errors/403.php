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
  if (!function_exists('http_response_code')) {
    header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
  } else {
    http_response_code(403);
  }
  //header("Location: ../");
?>
<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>403 Forbidden</title>
  </head>
  <body>
    <h1>403 Forbidden</h1>
    <hr>
    <p>Mohon maaf, anda dilarang untuk mengakses halaman ini, silahkan <a href="javascript:window.history.back(-1);">kembali</a> !</p>
  </body>
</html>
<?php } ?>