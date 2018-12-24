<?php
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
    <p>Mohon maaf, anda di larang untuk mengakses halaman ini, silahkan <a href="javascript:window.history.back(-1);">kembali</a> !</p>
  </body>
</html>