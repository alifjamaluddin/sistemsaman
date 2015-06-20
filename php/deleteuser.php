<?php
require( "config.php" );

// *** Validate request to login to this site.
// if (!isset($_SESSION)) {
//   session_start();
// }

$SUCCESS = "<script>alert('Pengguna berjaya dipadam');window.location='../pengguna.php';</script>";
$FAILED = "<script>alert('Pengguna gagal dipadam');window.location='../pengguna.php';</script>";


// if(!isset($_SESSION['USER_ID']) && empty($_SESSION['USER_ID'])) {
// 	header("Location: " . $REDIRECT_LOGIN );
// }


$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $id=$_GET['id'];

$DeleteRS__query="DELETE FROM `user` WHERE `id` = $id";
$DeleteRS = $connection->query($DeleteRS__query);

  if ($DeleteRS) {
  	echo $SUCCESS;
    }
  else {
  	echo $FAILED;
  }
?>