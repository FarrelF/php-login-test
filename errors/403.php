<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
  /* Dibawah ini adalah sebuah perintah agar mengalihkan ke file Index, saat file di akses secara langsung*/
  header("Location: ../");
} else {
  if (!function_exists('http_response_code')) {
    header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
  } else {
    http_response_code(403);
  }
?>
<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
  </head>
  <body>
    <h1>403 Forbidden</h1>
    <hr>
    <p>Mohon maaf, anda dilarang untuk mengakses halaman ini, silahkan <a href="javascript:window.history.back(-1);">kembali</a> !</p>
  </body>
</html>
<?php } ?>