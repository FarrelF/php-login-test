<?php
  if (!function_exists('http_response_code')) {
    header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden"); 
  } else {
    http_response_code(403);
  }
?>