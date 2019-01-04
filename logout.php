<?php
  session_start();
  if (isset($_SESSION['username']) || isset($_SESSION['password'])) {
    session_destroy();
    session_unset();
    header("Location: ./?loggedout=true");
  } else {
    header("Location: ./?loggedout=false");
  }
?>
