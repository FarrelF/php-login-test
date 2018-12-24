<?php
if (version_compare(phpversion(), '5.3.7', '<')) {
  if (!function_exists('http_response_code')) {
    header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
  } else {
    http_response_code(403);
  }
  die("Maaf, aplikasi ini tidak di dukung oleh Aplikasi yang anda gunakan, silahkan perbarui versi PHP anda ke versi minimal 5.3.7");
} else {
  header("Location: ../");
}
?>