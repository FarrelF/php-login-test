<?php
  session_start();
  if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['nm_pengguna']) && isset($_SESSION['idpengguna'])) {
    header("Location: ../dash.php"); // Akan di alihkan ke file "dash.php" jika masih ada Session/Sesi Login.
  } elseif (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['nama']) || empty($_POST['id']) || empty($_POST['algoritma'])) {
    header("Location: ../"); // Akan di alihkan ke "../index.php" "../" atau halaman login jika tidak ada salah satu atau sama sekali inputan dari Halaman Daftar.
  } else {
    require "../config/koneksi.php";
    $idpengguna = $_POST['id'];
    $InputUser = $_POST['username'];
    $Password = $_POST['password'];
    $NamaPengguna = $_POST['nama'];
    $Algo = $_POST['algoritma'];
    if ($Algo == "Argon2id") {
      $mc = $_POST['memory_cost'];
      $tc = $_POST['time_cost'];
      $p = $_POST['threads'];
      $bcryptcost = "";
    } elseif ($Algo == "Argon2i") {
      $mc = $_POST['memory_cost'];
      $tc = $_POST['time_cost'];
      $p = $_POST['threads'];
      $bcryptcost = "";
    } elseif ($Algo == "Bcrypt") {
      $bcryptcost = $_POST['cost'];
      $mc = "";
      $tc = "";
      $p = "";
    }
    $NamaAlgo = "";
    $Opsi = "";
    $cari = mysqli_query($link, "SELECT * FROM pengguna WHERE username='$InputUser'");
    $data = mysqli_num_rows($cari);
    if ($data == 0) {
      if (function_exist('password_hash')) {
        if ($Algo == "Argon2id") {
          $NamaAlgo = PASSWORD_ARGON2ID;
          $Opsi = [
            'memory_cost' => 1024*$mc,
            'time_cost' => $tc,
            'threads' => $p
          ];
        } elseif ($Algo == "Argon2i") {
          $NamaAlgo = PASSWORD_ARGON2I;
          $Opsi = [
            'memory_cost' => 1024*$mc,
            'time_cost' => $tc,
            'threads' => $p
          ];
        } elseif ($Algo == "Bcrypt") {
          $NamaAlgo = PASSWORD_BCRYPT;
          $Opsi = [
            'cost' => $bcryptcost
          ];
        }
      } elseif (!function_exist('password_hash') && version_compare(phpversion(), '5.3.7', '>=') && version_compare(phpversion(), '5.5.0', '<')) {
        require "../ext/password_compat.php";
        $NamaAlgo = PASSWORD_DEFAULT;
        $Opsi = [
          'cost' => $bcryptcost
        ];
      } else {
        header("Location: ../daftar.php?username=".$InputUser."&nm_pengguna=".$NamaPengguna."&status=phpnotsupported");
      }
      $Hash = password_hash($Password, $NamaAlgo, $Opsi);
      $kueri="INSERT INTO pengguna (idpengguna,username,password,nm_pengguna) VALUES ('$idpengguna','$InputUser','$Hash','$NamaPengguna')";
      if (!mysqli_query($link,$kueri)) {
        ?>
        <!DOCTYPE html>
        <html lang="id" dir="ltr">
          <head>
            <meta charset="utf-8">
            <title>Kesalahan saat Mendaftar</title>
          </head>
          <body>
            <p>Adanya kesalahan saat mendaftar akun, berikut di bawah ini kesalahannya:</p>
            <br>
            <p>Deskripsi Kesalahan: <?php echo mysqli_error($link); ?></p>
            <br>
            <a href="../daftar.php?username=<?php echo $InputUser; ?>&nm_pengguna=<?php echo $NamaPengguna; ?>">Kembali</a>
            <!-- Saya memanfaatkan nilai method GET, dengan cara memasukkan ?username=Username_Anda&nm_pengguna=Nama_Anda ke dalam URL. Hal ini agar form kembali terisi otomatis ketika klik "Kembali" -->
            <!-- Tentu saja, saya gunakan if else pada salah satu input form di daftar.php (Lihat daftar.php pada bagian "value" di dalam tag HTML <input>, disitu nanti ada kode PHP) -->
          </body>
        </html>
        <?php
        mysqli_close($link);
      } else {
        header("Location: ../?success=true");
      }
    } elseif ($data > 0) {
      /*
      Saya memanfaatkan nilai method GET, dengan cara memasukkan ?username=Username_Anda&nm_pengguna=Nama_Anda ke dalam URL. Hal ini agar form kembali terisi otomatis ketika klik "Kembali" -->
      Tentu saja, saya gunakan if else pada salah satu input form di daftar.php (Lihat daftar.php pada bagian "value" di dalam tag HTML <input>, disitu nanti ada kode PHP)
      */
      header("Location: ../daftar.php?username=".$InputUser."&nm_pengguna=".$NamaPengguna."&status=usernoavailable");
    }
  }
?>