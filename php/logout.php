<?php

if (!isset($_SESSION)) {
  session_start();
}
session_unset();
session_destroy();
 echo "<script>
 alert('You have been logged out');
 window.location='../';
 </script>";
// header("Location: "."./");
?>