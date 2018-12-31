<?php
  session_start();
  if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    if (!function_exists('http_response_code')) {
      header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
    } else {
      http_response_code(403);
    }
    header("Location: ./");
  } else {
    ?>
    <!DOCTYPE html>
    <html lang="id" dir="ltr">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dasbor Web</title>
      </head>
      <body>
        <h1 style="text-align: center;">Selamat datang di Dasbor Web, <?php echo $_SESSION['nm_pengguna']; ?></h1>
        <p style="text-align: center;"><a href="logout.php">Keluar</a></p>
      </body>
    </html>
    <?php
  }
?>