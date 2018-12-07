<?php
  session_start();
  if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    http_response_code(403);
    header("Location: ./");
  } else {
    ?>
    <!DOCTYPE html>
    <html lang="id" dir="ltr">
      <head>
        <meta charset="utf-8">
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
