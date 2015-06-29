<?php
require( "../php/config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}


$result = array();

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
  $result['status'] = "failed";
  $result['error'] = mysqli_connect_error();
}else{
  $nodaftar = $_GET['nodaftar'];
  $ViewRS__query="SELECT id, nomatrik, noic, nama, fakulti, alamat, notel, email FROM user WHERE nomatrik = '$nodaftar'";


  $ViewRS = $connection->query($ViewRS__query);
  if ($ViewRS) {
 	$row = mysqli_fetch_assoc($ViewRS);
    $result['status'] = "success";
  	$result['detailpengguna'] = $row;

  }
  else {
    $result['status'] = "failed";
    $result['query'] = $ViewRS__query;
  }
}
echo json_encode($result);

?>
