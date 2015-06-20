<?php
require( "config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$SUCCESS = "<script>alert('Berjaya mendaftar pengguna');window.location='../pengguna.php';</script>";
$FAILED = "<script>alert('Gagal mendaftar pengguna');window.location='../form-pengguna.php';</script>";

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

  $nomatrik=$_POST['nomatrik']; 
  $password=$_POST['password']; 
  $noic=$_POST['noic']; 
  $nama=$_POST['nama']; 
  $fakulti=$_POST['fakulti']; 
  $alamat=$_POST['alamat']; 
  $notel=$_POST['notel']; 
  $email=$_POST['email']; 


$InsertRS__query="INSERT INTO `user` (`nomatrik`, `password`, `noic`, `nama`, `fakulti`, `alamat`, `notel`, `email`) VALUES ('$nomatrik', MD5('$password'), '$noic', '$nama', '$fakulti', '$alamat', '$notel', '$email')";

$InsertRS = $connection->query($InsertRS__query);
  if ($InsertRS) {
  	echo $SUCCESS;
    }
  else {
  	ECHO $FAILED;
  }
}

?>