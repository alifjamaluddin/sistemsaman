<?php
require( "config.php" );

// *** Validate request to login to this site.
// if (!isset($_SESSION)) {
//   session_start();
// }

$SUCCESS = "<script>alert('Permohonan berjaya dibatalkan');window.location='../admin/luluskenderaan.php';</script>";
$FAILED = "<script>alert('Permohonan gagal dibatalkan');window.location='../admin/luluskenderaan.php';</script>";

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

$LulusRS__query="UPDATE `samandb`.`kenderaan` SET `status` = 'Batal' WHERE `id` = $id";
$LulusRS = $connection->query($LulusRS__query);

  if ($LulusRS) {
  	echo $SUCCESS;
    }
  else {
  	echo $FAILED;
  }
?>