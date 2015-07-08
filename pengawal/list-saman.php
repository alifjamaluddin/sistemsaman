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
  $pelapor = $_GET['id'];
  $ViewRS__query="SELECT l.id, l.noplat, t.nama as 'tempat', l.catatan, l.nomatrik, u.nama as 'pesalah', k.nama as 'kesalahan', l.tarikhlaporan, p.nama as 'pelapor' 
  FROM laporan l, kesalahan k, tempat t, pengawal p, user u
  WHERE l.tempat = t.id 
  AND l.kesalahan = k.id 
  AND l.pelapor = p.id 
  AND l.nomatrik = u.nomatrik
  AND l.pelapor = $pelapor
  ORDER BY l.tarikhlaporan DESC";

  $ViewRS = $connection->query($ViewRS__query);
  if ($ViewRS) {
    $result['status'] = "success";
    $listsaman = array();
    $idsaman = array();
 	while($row = mysqli_fetch_assoc($ViewRS)){
 		array_push($listsaman, $row);
    array_push($idsaman, $row['tarikhlaporan']);
 	}
    $result['idsaman'] = $idsaman;
  	$result['listsaman'] = $listsaman;

  }
  else {
    $result['status'] = "failed";
    $result['query'] = $ViewRS__query;
  }
}
echo json_encode($result);

?>