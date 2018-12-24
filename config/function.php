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
 error_reporting(0);
 function autonumber($tabel, $kolom, $lebar=0, $awalan='') {
   include 'koneksi.php';
   $auto = mysqli_query($link, "SELECT $kolom FROM $tabel order by $kolom desc limit 1") or die(mysqli_error());
   $jumlah_record = mysqli_num_rows($auto);

   if ($jumlah_record == 0) {
     $nomor = 1;
   } else {
     $row = mysqli_fetch_array($auto);
     $nomor = intval(substr($row[0], strlen($awalan)))+1;
   }
   if ($lebar > 0) {
     $angka = $awalan.str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
   } else {
     $angka=$awalan.$nomor;
   }
   return $angka;
 }
}
?>