<?php
if (version_compare(phpversion(), '5.3.7', '<')) {
  require_once "../errors/incompatible.php";
} else {
  session_start();
  if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['nm_pengguna']) && isset($_SESSION['idpengguna'])) {
    header("Location: ../dash.php"); // Akan di alihkan ke file "../dash.php" jika masih ada Session/Sesi Login.
  } elseif (empty($_POST['username']) || empty($_POST['password'])) {
    if (!function_exists('http_response_code')) {
      header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
    } else {
      http_response_code(403);
    }
    header("Location: ../"); // Akan di alihkan ke "../index.php" atau "../" atau halaman login jika tidak ada salah satu atau sama sekali inputan dari Halaman Login.
  } else {
    require "../config/koneksi.php";
    if (!function_exists('password_verify')) {
      require "../ext/password_compat.php";
    }
    $InputUser = $_POST['username'];
    $Password = $_POST['password'];
    unset($_POST['password']);
    $cari = mysqli_query($link, "SELECT * FROM pengguna WHERE username='$InputUser'");
    $read = mysqli_fetch_array($cari);
    $data = mysqli_num_rows($cari);
    $Hash = $read['password'];
    unset($read['password']);
    if ($data == '1') {
      if (password_verify($Password, $Hash)) {
        $_SESSION['idpengguna'] = $read['idpengguna'];
        $_SESSION['nm_pengguna'] = $read['nm_pengguna'];
        $_SESSION['username'] = $read['username'];
        $_SESSION['password'] = $Hash;
        header("Location:../dash.php");
      } else {
        header("Location:../?username=$InputUser&status=incorrectpass");
      }
    } else {
      header("Location:../?username=$InputUser&status=invalidaccount");
    }
  }
}
?>