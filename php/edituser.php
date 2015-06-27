<?php
require( "config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$SUCCESS = "<script>alert('Berjaya membuat suntingan pengumuman');window.location='../admin/pengguna.php';</script>";
$FAILED = "<script>alert('Gagal membuat suntingan pengumuman');window.location='../admin/pengguna.php';</script>";


// if(!isset($_SESSION['USER_ID']) && empty($_SESSION['USER_ID'])) {
// 	header("Location: " . $REDIRECT_LOGIN );
// }


$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

if (isset($_POST['submit'])) {

 $nodaftar=$_POST['nodaftar']; 
  $password=$_POST['password']; 
  $noic=$_POST['noic']; 
  $nama=$_POST['nama']; 
  $fakulti=$_POST['fakulti']; 
  $alamat=$_POST['alamat']; 
  $notel=$_POST['notel']; 
  $email=$_POST['email']; 
  $id=$_POST['id'];


$InsertRS__query="UPDATE `pengawal` SET `nodaftar` = '$nodaftar', `password` = MD5('$password'), `noic` = '$noic', `nama` = '$nama', `alamat` = '$alamat', `notel` = '$notel', `email` = '$email'  WHERE `id` = $id";

$InsertRS = $connection->query($InsertRS__query);
  if ($InsertRS) {
  	echo $SUCCESS;
    }
  else {
  	echo $FAILED;
  }
}



?>