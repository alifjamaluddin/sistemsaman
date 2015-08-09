<?php
require( "config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$SUCCESS = "<script>alert('Berjaya mendaftar kenderaan');window.location='../user/index.php';</script>";
$FAILED = "<script>alert('Gagal mendaftar kenderaan');window.location='../user/form-kenderaan.php';</script>";

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

  $nomatrik=strtoupper($_SESSION['nomatrik']); 
  $noplat=strtoupper($_POST['noplat']); 
  $jenis=strtoupper($_POST['jenis']); 
  $jenama=strtoupper($_POST['jenama']); 
  $warna=strtoupper($_POST['warna']); 
  $isiankebuk=strtoupper($_POST['isiankebuk']); 
  $nolesen=strtoupper($_POST['nolesen']); 
  $tamatlesen=$_POST['tamatlesen']; 
  $tamatcukai=$_POST['tamatcukai']; 


$InsertRS__query="INSERT INTO `kenderaan` (`noplat`, `jenis`, `jenama`, `warna`, `isiankebuk`, `nolesen`, `nomatrik`, `tarikhdaftar`, `tamatlesen`, `tamatcukai`) 
VALUES ('$noplat', '$jenis', '$jenama', '$warna', '$isiankebuk', '$nolesen', '$nomatrik', CURRENT_TIMESTAMP, '$tamatlesen', '$tamatcukai')";

$InsertRS = $connection->query($InsertRS__query);
  if ($InsertRS) {
  	echo $SUCCESS;
    }
  else {
  	ECHO $FAILED;
  }
}

?>