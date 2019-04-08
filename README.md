# PHP Login Test
Ini merupakan file percobaan untuk mengimplementasi Fungsi [`password_*`](https://secure.php.net/password) pada PHP.

Ini cocok bagi anda yang ingin mengimplementasi nya, dengan cukup mudah. Dan, ini juga cocok bagi anda yang ingin mempelajarinya.


## Tipe Alur
Program ini masih menggunakan Alur Struktural (bukan PDO/PHP Data Object), karena pemula akan bingung jika saya membuatnya dengan menggunakan PDO. Sehingga, di harapkan program ini dapat di pahami oleh Pemula/Orang yang baru terjun ke PHP.

Jika ada kesempatan, maka saya akan membuat versi PDO nya.


## Fitur-fitur pada Program
Fitur-fitur pada Program yang bisa anda pelajari sebagai berikut:

1. Selain bisa login, dan mempunyai halaman Dasbor, Program ini bisa melakukan Daftar Akun.
2. Bisa di jalankan/kompatibel pada PHP versi 5.3.7, atau di atasnya. Ini terjadi berkat Perpustakaan (*Library*) PHP [`password_compat`](https://github.com/ircmaxell/password_compat) yang di buat oleh Username [`ircmaxell`](https://github.com/ircmaxell), sehingga fungsi [`password_hash()`](https://secure.php.net/manual/en/function.password-hash.php), [`password_verify()`](https://secure.php.net/manual/en/function.password-verify.php) dan fungsi [`password_*`](https://secure.php.net/password) lainnya bisa berjalan pada PHP versi lama, yang semula kedua fungsi tersebut hanya dapat di jalankan pada PHP (minimalnya) versi 5.5.0 atau di atasnya.
3. Algoritma yang bisa anda pilih dan atur opsi nya sesuka anda (dengan opsi yang ada, serta resiko yang anda tanggung sendiri). (Berlaku untuk pengguna PHP 7.2.0 atau di atasnya)
4. Penggunaan Algoritma pada saat Daftar akan menyesuaikan dengan versi PHP yang anda gunakan. Misal, jika menggunakan versi PHP di bawah 7.2.0, maka secara otomatis "Algoritma Kata Sandi" akan hilang, namun di gantikan dengan textbox "BCrypt Cost", dan secara otomatis akan menggunakan `Bcrypt` untuk Algoritma Kata Sandi nya, hal ini dilakukan agar meminimalisir kesalahan (*Error*). Dan, ini juga berkat fungsi [`version_compare()`](https://secure.php.net/manual/en/function.version-compare.php) dari PHP.
5. Untuk pengguna PHP versi 7.2.0 ke bawah, maka secara otomatis anda akan menggunakan Algoritma `Bcrypt` daripada `Argon2` (dan varian nya).

Fitur-fitur yang rencananya ingin di implementasikan pada program ini:
1. [x] Implementasi Algoritma `Argon2id` pada PHP (Berlaku hanya untuk PHP 7.3.0 dan diatasnya).
2. [ ] Hak Akses Pengguna.
3. [ ] Tabel CRUD untuk melihat, mengedit dan menghapus data pengguna berdasarkan hak akses yang dimiliki saat sesi.
4. [x] Menghalangi PHP versi yang di bawah dari 5.3.7 untuk menjalankan program ini, dari sisi Belakang (*Back-end*).


## Sanggahan
Saya memang membuat program ini. Tapi, saya tidak akan bertanggungjawab atas kerusakan atau apapun yang terjadi karena ulah anda sendiri saat menggunakan program ini, baik pada Komputer anda sendiri maupun orang lain.

Saya membuat program ini dengan menggunakan Fungsi yang ada pada PHP, saya tidak menggunakan Fungsi PHP yang di dapat dari luar/pihak ke-3, kecuali untuk Library [`password_compat`](https://github.com/ircmaxell/password_compat) yang di buat oleh [`ircmaxell`](https://github.com/ircmaxell) agar Program ini bisa berjalan pada PHP 5.3.7 atau di atasnya.

Dengan begitu, harusnya tidak ada Malware yang merusak di dalam software ini, hanya pengaruhnya ke Kinerja yang melambat (Karena menghasilkan Hash membutuhkan sumber daya). Jadi, mohon gunakanlah dengan bijak dan tanggung sendiri resiko nya !

Dan, saya peringatkan sekali lagi, bahwa program ini tidak cocok untuk di Implementasikan ke dalam lingkungan PRODUKSI, melainkan hanya MENGUJI nya saja. Karena, program ini di desain untuk melakukan pengujian dan pembelajaran, bukan ke tahap PRODUKSI.

Meski demikian, anda dapat mempelajari fungsi-fungsi ini, lalu di implementasikan ke dalam program anda/program yang berbeda daripada ini, ke dalam lingkungan Produksi.

Oh, ya, ngomong-ngomong, saya belum pernah menggunakan PHP 5.3.7 atau yang di bawah dari 5.6, jadi saya tidak menjamin bahwa program ini akan berjalan dengan lancar pada PHP 5.6 kebawah. Tapi, setidaknya saya telah mencobanya di PHP 5.6 yang dapat berjalan dengan lancar.


## Persyaratan Minimal
Sebelum menggunakan Software ini, alangkah baik nya untuk memenuhi persyaratan berikut:

1. Sebuah Komputer dan Sistem Operasi (Bisa gunakan Windows, Distribusi GNU/Linux atau macOS X)
2. Sudah terinstall Web Browser. (Minimal: Web Browser Bawaan)
3. Spesifikasi Komputer yang sanggup menjalankan Web Browser sekarang. (Sisakan Memori pada RAM setidaknya minimal sebesar 128 MB atau di atasnya dan sedikit penggunaan CPU untuk proses Hashing)
4. Sudah terinstall Webserver Apache2/Nginx, PHP Server, dan MySQL/MariaDB Server. (Contoh: XAMPP pada Windows, LAMP pada GNU/Linux, dll)
5. phpMyAdmin untuk mengelola Database, atau bisa anda gunakan perangkat lunak lainnya untuk mengelola Database SQL, seperti Adminer, dll.
6. Minimal versi PHP nya adalah 5.3.7 atau saya sarankan agar gunakan versi 5.6 atau di atasnya.

Jika syarat sudah terpenuhi, maka anda telah siap untuk menggunakan program ini dengan mendownloadnya terlebih dahulu.


## A. Cara Download
Jika anda ingin mendownloadnya, anda bisa langsung klik `Clone or Download`, lalu klik *Button* `Download ZIP`.

Atau, jika anda lebih menyukai nya dengan menggunakan Terminal/Bash/Shell, mungkin bisa anda Clone seluruh Repo ini dengan perintah berikut:
```sh
$ git clone https://github.com/FarrelF/php-login-test.git
```


## B. Cara Instalasi dan Penggunaan
Cara menggunakannya mudah sekali, tapi sebelum itu, anda harus menginstallnya terlebih dahulu:

### 1. Membuat Basis Data/Database
Buatlah sebuah basis data SQL (disarankan menggunakan MySQL/MariaDB sebagai Perangkat Lunak RDBMS). Lalu, sesuaikan informasi mengenai Login dan Host MySQL/MariaDB beserta Basis data yang di buat dengan file `koneksi.php` yang berada di `config/koneksi.php`.

Untuk mengisi basis data tersebut, kamu dapat mengimpor file `login_test.sql` dengan phpMyAdmin. Sebelum itu, pastikan anda memilih Basis data yang baru anda buat tersebut di dalam phpMyAdmin.

### 2. Menyalinkan file Program
Pastikan bahwa semua file "PHP Login Test" ini sudah tersalin ke dalam direktori kerja anda dengan baik.

Misalnya, kalau anda menggunakan XAMPP pada Windows, anda dapat menyalin folder `php-login-test-master` ke dalam Folder `C:\xampp\htdocs`.

Atau, kalau kamu menggunakan LAMP di sistem GNU/Linux (Terutama jika kamu menggunakan Sistem Operasi Distribusi GNU/Linux seperti Ubuntu, Linux Mint dan Turunannya), kamu dapat menyalin folder tersebut ke dalam `/var/www/html`.

Jika anda mau, anda bisa merename folder `php-login-test-master` menjadi `php-login-test` atau apapun yang anda inginkan, asalkan jangan lupa konsep penempatan web nya.

### 3. Membuka Program
Sebelum membuka Program nya, pastikan Webserver (Seperti Apache atau nginx) atau Server Basis data (seperti MySQL atau MariaDB) di aktifkan.

Jika anda menggunakan XAMPP, buka terlebih dahulu `XAMPP Control Panel`, lalu klik pada *Button* `Start` di bagian Apache dan MySQL.

Setelah itu, buka Web Browser anda, dan ketikkan URL dengan `localhost/php-login-test-master` jika folder nya masih bernama `php-login-test-master`. Akan berbeda URL nya jika nama Foldernya lain.

Voila! Dengan begini, anda bisa menggunakan program ini.

### 4. Menggunakan Program
Anda bisa bebas mencoba-coba Program ini, tapi pertama-tama yang harus anda lakukan ialah "Daftar Akun".

Anda bisa melakukan nya dengan membuka Program nya, lalu klik pada *Button* `Daftar Akun`, setelah itu, isikan semua yang ada disitu, yakni Nama, Nama Pengguna (*Username*), Kata Sandi, dan Algoritma Kata Sandi beserta Opsi nya.

Perlu yang anda ingat, bahwa program ini menyesuaikan dengan versi PHP yang anda gunakan.

Jika anda menggunakan PHP versi 7.2.0 atau di atasnya, maka akan muncul pilihan `Algoritma Kata Sandi` beserta opsinya, sedangkan jika tidak, maka hanya muncul `Bcrypt Cost` saja, dan secara otomatis akan menggunakan Algoritma `Bcrypt`.

Setelah anda daftar, anda bisa login dengan menggunakan akun anda. Setelah itu, Voila! muncul selamat datang dengan di sertai nama anda.

Selamat Mencoba \^\_\^


## C. Cara Melihat/Mengedit kode Program
Anda dapat mengedit nya dengan menggunakan Perangkat Lunak Perubah Teks (*Text Editor*) atau IDE seperti [Atom](https://atom.io), [Notepad++](https://notepad-plus-plus.org), [Sublime Text (berbayar)](https://www.sublimetext.com/), [Visual Studio Code (Source: Open-source, binary: freeware)](https://code.visualstudio.com/), [Netbeans IDE](https://netbeans.org/), [Komodo Edit](https://www.activestate.com/products/komodo-edit/), dll.

Bahkan, anda bisa mengeditnya dengan Notepad jika mau. Tapi, saya sarankan agar anda mengeditnya dengan perubah teks yang memiliki fitur "*Syntax Highlighter*" dan "*Auto-complete*" agar mempermudah anda untuk merubah/membuat sebuah Program.

Dari semua Perangkat Lunak yang saya sebut, Sublime Text memang paling populer di gunakan oleh Web Programmer, hanya saja sayang sekali jika lisensi nya berbayar.

Daripada kita melanggar Aturan "Lisensi" dengan 'menggandakannya', maka lebih baik kita menggunakan versi Gratis nya, atau lebih baik jika Software nya bukan 'Freeware' atau hanya Gratis semata, melainkan 'Open-source' atau 'Free Software' (Perangkat Lunak Bebas).

Salah satu nya adalah yang saya sebutkan di atas (Kecuali Visual Studio Code, yang binary nya Freeware), namun Perangkat Lunak Alternatif terbaik dari Sublime Text (menurut saya) yang bisa anda gunakan, adalah [Atom](https://atom.io).

Sebenarnya anda dapat melihat secara langsung kode program nya disini, namun anda tidak bisa mengeditnya, karena hanya pemilik Repolah yang bisa (kecuali jika anda ingin mengirimkan Pull Request).

Selamat Belajar \^\_\^