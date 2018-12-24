<?php
if (version_compare(phpversion(), '5.3.7', '<')) {
  require_once "errors/incompatible.php";
} else {
  session_start();
  if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['nm_pengguna']) && isset($_SESSION['idpengguna'])) {
    header("Location: dash.php"); // Akan di alihkan ke file "dash.php" jika masih ada Session/Sesi Login.
  } else {
    require "config/koneksi.php";
    require "config/function.php";
    ?>
    <!DOCTYPE html>
    <html lang="id" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Form Pendaftaran Akun</title>
        <?php if (version_compare(phpversion(), '7.2.0', '>=')): ?>
          <script type="text/javascript">
          function updatetext() {
            var Algo = document.querySelector('input[name="algoritma"]:checked').value;
            if(Algo == "Argon2id") {
              document.getElementById("bcrypt_cost").setAttribute('disabled', true);
              document.getElementById("memory_cost").removeAttribute('disabled');
              document.getElementById("time_cost").removeAttribute('disabled');
              document.getElementById("threads").removeAttribute('disabled');
            }else if (Algo == "Argon2i") {
              document.getElementById("bcrypt_cost").setAttribute('disabled', true);
              document.getElementById("memory_cost").removeAttribute('disabled');
              document.getElementById("time_cost").removeAttribute('disabled');
              document.getElementById("threads").removeAttribute('disabled');
            }else if (Algo == "Bcrypt") {
              document.getElementById("bcrypt_cost").removeAttribute('disabled');
              document.getElementById("memory_cost").setAttribute('disabled', true);
              document.getElementById("time_cost").setAttribute('disabled', true);
              document.getElementById("threads").setAttribute('disabled', true);
            }else{
              document.getElementById("bcrypt_cost").removeAttribute('disabled');
              document.getElementById("memory_cost").removeAttribute('disabled');
              document.getElementById("time_cost").removeAttribute('disabled');
              document.getElementById("threads").removeAttribute('disabled');
            }
          }
          </script>
        <?php else: echo ""; ?>
        <?php endif; ?>
      </head>
      <body>
        <h3>Form Pendaftaran Akun</h3>
        <hr>
        <?php $id_pengguna = autonumber("pengguna", "idpengguna", "6", "U-"); ?>
        <form name="formdaftar" action="proses/daftar.php" method="post">
          <pre>
            ID Pengguna           : <input type="text" name="id" value="<?php echo $id_pengguna; ?>" readonly required>
            Nama                  : <input type="text" size="40" name="nama" value="<?php if (isset($_GET['nm_pengguna'])) {echo $_GET['nm_pengguna'];} else {echo "";}?>" required>
            Nama Pengguna         : <input type="text" size="20" name="username" value="<?php if (isset($_GET['username'])) {echo $_GET['username'];} else {echo "";}?>" required>
            Kata Sandi            : <input type="password" size="20" name="password" required>
            <?php
            
            if (version_compare(phpversion(), '7.3.0', '>=')) {
              ?>Algoritma Kata Sandi  : <input type="radio" name="algoritma" value="Argon2id" onclick="updatetext()" required>Argon2id
                                    <input type="radio" name="algoritma" value="Argon2i" onclick="updatetext()" required>Argon2i
                                        Memory Cost  : <input type="number" id="memory_cost" name="memory_cost" min="1" max="99999" required> MB
                                        Time Cost    : <input type="number" id="time_cost" name="time_cost" min="1" max="99999" required>
                                        Threads      : <input type="number" id="threads" name="threads" min="1" max="500" required>
                                    <input type="radio" name="algoritma" value="Bcrypt" onclick="updatetext()" required>Bcrypt
                                        Cost         : <input type="number" id="bcrypt_cost" name="cost" min="3" max="500" required><?php
            } elseif (version_compare(phpversion(), '7.2.0', '>=') && version_compare(phpversion(), '7.3.0', '<')) {
              ?>Algoritma Kata Sandi  : <input type="radio" name="algoritma" value="Argon2i" onclick="updatetext()" required>Argon2i
                                        Memory Cost  : <input type="number" id="memory_cost" name="memory_cost" min="1" max="99999" required> MB
                                        Time Cost    : <input type="number" id="time_cost" name="time_cost" min="1" max="99999" required>
                                        Threads      : <input type="number" id="threads" name="threads" min="1" max="500" required>
                                    <input type="radio" name="algoritma" value="Bcrypt" onclick="updatetext()" required>Bcrypt
                                        Cost         : <input type="number" id="bcrypt_cost" name="cost" min="3" max="500" required><?php
            } elseif(version_compare(phpversion(), '5.5.0', '>=') && version_compare(phpversion(), '7.2.0', '<')) {
              ?>Bcrypt Cost           : <input type="number" name="cost" min="1" max="500" required>
              <input type="hidden" name="algoritma" value="Bcrypt"><?php
            } elseif (version_compare(phpversion(), '5.3.7', '>=') && version_compare(phpversion(), '5.5.0', '<')) {
              ?>Bcrypt Cost           : <input type="number" name="cost" min="1" max="500" required><?php
            } elseif (version_compare(phpversion(), '5.3.7', '<')) {
              echo "";
            }
            
             ?>
          </pre>
          <button type="submit">Daftar</button>
          <button type="button" onclick="document.location.href='./'">Login Akun</button>
          <button type="reset">Set Ulang</button>
        </form>
        <?php
          if (isset($_GET['status']) && isset($_GET['username']) && $_GET['status'] == 'usernoavailable') {
            $Username = $_GET['username'];
            $cari = mysqli_query($link, "SELECT * FROM pengguna WHERE username='$Username'");
            $data = mysqli_num_rows($cari);
            if ($data > 0) {
              echo "<p>Mohon maaf, Nama Pengguna ".$Username." sudah ada di dalam database. Silahkan gunakan nama pengguna lain !</p>";
            } else {
              echo "";
            }
          } elseif (isset($_GET['status']) && isset($_GET['username']) && isset($_GET['nm_pengguna']) && $_GET['status'] == 'phpnotsupported') {
            if (version_compare(phpversion(), '5.3.7', '<')) {
              ?>
              <p>Mohon maaf, versi PHP yang anda gunakan itu tidak mendukung untuk memproses pendaftaran.</p>
              <p>Versi PHP anda saat ini: <?php echo phpversion(); ?></p>
              <p>Mohon untuk perbarui versi PHP anda, setidaknya ke versi 5.3.7 atau di atasnya. Jika web anda berada di shared hosting, mohon hubungi pihak penyedia hosting untuk memperbarui versi PHP</p>
              <?php
            } else {
              echo "";
            }
          } else {
            echo "";
          }
        ?>
      </body>
    </html>
    <?php
  }
}
?>

  