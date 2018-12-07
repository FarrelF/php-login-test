# PHP Login Test
Ini merupakan file percobaan untuk mengimplementasi fungsi `password_hash()` pada PHP.
Ini cocok bagi anda yang ingin mengimplementasi nya, dengan cukup mudah. Dan, ini juga cocok bagi anda yang ingin mempelajarinya.

## Tipe Alur
Program ini masih menggunakan Alur Struktural (bukan PDO/PHP Data Object), karena pemula akan bingung jika saya membuatnya dengan menggunakan PDO. Sehingga, di harapkan program ini dapat di pahami oleh Pemula/Orang yang baru terjun ke PHP.

Jika ada kesempatan, maka saya akan membuat versi PDO nya.

## Cara Download
Jika anda ingin mendownloadnya, anda bisa langsung klik `Clone or Download`, lalu klik *Button* `Download ZIP`.

Atau, jika anda sudah mengerti tentang Git, mungkin bisa anda Clone seluruh Repo ini dengan perintah.
```sh
git clone https://github.com/FarrelF/php-login-test.git
```

## Cara Penggunaan
Cara menggunakannya mudah sekali, caranya berikut ini:

### 1. Membuat Basis Data/Database
Buatlah sebuah basis data SQL (disarankan menggunakan MySQL/MariaDB sebagai Perangkat Lunak RDBMS). Lalu, sesuaikan informasi mengenai Login dan Host MySQL/MariaDB beserta Basis data yang di buat dengan file `koneksi.php` yang berada di `config/koneksi.php`.

Untuk mengisi basis data tersebut, anda dapat mengimpor file `login_test.sql` dengan phpMyAdmin. Sebelum itu, pastikan anda memilih Basis data yang baru anda buat tersebut di dalam phpMyAdmin.

### 2. Menyalinkan file Program
Pastikan bahwa semua file "PHP Login Test" ini sudah tersalin ke dalam direktori kerja anda dengan baik.

Misalnya, kalau anda menggunakan XAMPP pada Windows, anda dapat menyalin folder `php-login-test-master` ke dalam Folder `C:\xampp\htdocs`.

Atau, kalau kamu menggunakan LAMP di sistem GNU/Linux (Terutama jika anda menggunakan Sistem Operasi Distribusi GNU/Linux seperti Ubuntu, Linux Mint dan Turunannya), anda dapat menyalin folder tersebut ke dalam `/var/www/html`.

Jika anda mau, anda bisa merename folder `php-login-test-master` menjadi `php-login-test` atau apapun yang anda inginkan, asalkan jangan lupa konsep penempatan web nya.

### 3. Membuka Program
Sebelum membuka Program nya, pastikan Webserver (Seperti Apache atau nginx) atau Server Basis data (seperti MySQL atau MariaDB) di aktifkan.

Jika anda menggunakan XAMPP, buka terlebih dahulu `XAMPP Control Panel`, lalu klik pada *Button* `Start` di bagian Apache dan MySQL.

Setelah itu, buka Web Browser anda, dan ketikkan URL dengan `localhost/php-login-test-master` folder nya masih bernama `php-login-test-master`. Akan berbeda jika namanya lain.

Voila! Dengan begini, anda bisa mempelajari program ini.

Selamat Belajar \^_\^
