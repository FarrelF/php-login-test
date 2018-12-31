<?php
if (version_compare(phpversion(), '5.3.7', '<')) {
  require_once "errors/incompatible.php";
} else {
  session_start();
  if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['nm_pengguna']) && isset($_SESSION['idpengguna'])) {
    header("Location: dash.php"); // Akan di alihkan ke file "dash.php" jika masih ada Session/Sesi Login.
  } else {
   ?>
   <!DOCTYPE html>
   <html lang="id" dir="ltr">
     <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Login</title>
     </head>
     <body>
       <h3>Login</h3>
       <hr>
       <form action="proses/login.php" method="post">
         <pre>
           Nama Pengguna   : <input type="text" size="20" name="username" value="<?php if (isset($_GET['username'])) {echo $_GET['username'];} else {echo "";}?>" required>
           Kata Sandi      : <input type="password" size="20" name="password" required>
         </pre>
         <button type="submit">Login</button>
         <button type="button" onclick="document.location.href='daftar.php'">Daftar Akun</button>
         <button type="reset">Set Ulang</button>
         <?php
           if (isset($_GET['success']) && $_GET['success'] == true) { // Saya manfaatkan if else untuk menampilkan pesan sukses, dan juga memanfaatkan kondisi '?success=true' di dalam Alamat URL.
             echo "<p>Akun anda berhasil di daftarkan, silahkan login dengan menggunakan akun anda !</p>"; // Pesan seperti ini hanya ada ketika akun berhasil di daftarkan
           } elseif (isset($_GET['status']) && isset($_GET['username']) && $_GET['status'] == "incorrectpass") {
             echo "<p>Kata sandi yang anda masukkan tidak benar. Masukkan lagi dengan benar !!</p>";
           } elseif (isset($_GET['status']) && isset($_GET['username']) && $_GET['status'] == "invalidaccount") {
             echo "<p>Akun yang anda masukkan salah atau mungkin tidak ada. Silahkan hubungi Administrator !</p>";
           } elseif (isset($_GET['status']) && isset($_GET['username']) && $_GET['status'] == 'phpnotsupported') {
             if (version_compare(phpversion(), '5.3.7', '<') || !function_exist('password_hash')) {
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
       </form>
     </body>
   </html>
   <?php
  }
}
?>
 
