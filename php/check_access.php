<?php

if (!isset($_SESSION)) {
  session_start();
}

if(!isset($_SESSION['USER_ID'])){
  echo "
    <script>
    alert('Please login');
    window.location = 'admin-login.php';
    </script>
  ";
}
?> 