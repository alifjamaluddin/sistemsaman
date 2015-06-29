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
  $id = $_GET['id'];
  $ViewRS__query="SELECT l.noplat, t.nama as 'tempat', l.catatan, l.nomatrik, k.nama as 'kesalahan', l.tarikhlaporan, p.nama as 'pelapor' 
  FROM laporan l, kesalahan k, tempat t, pengawal p 
  WHERE l.tempat = t.id 
  AND l.kesalahan = k.id 
  AND l.pelapor = p.id 
  AND l.id = $id";


  $ViewRS = $connection->query($ViewRS__query);
  if ($ViewRS) {
 	$row = mysqli_fetch_assoc($ViewRS);
    $result['status'] = "success";
  	$result['detailsaman'] = $row;

  }
  else {
    $result['status'] = "failed";
    $result['query'] = $ViewRS__query;
  }
}
echo json_encode($result);

?>
