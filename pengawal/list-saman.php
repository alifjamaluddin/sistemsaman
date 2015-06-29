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
  $ViewRS__query="SELECT * FROM `laporan` where pelapor = $pelapor";

  $ViewRS = $connection->query($ViewRS__query);
  if ($ViewRS) {
    $result['status'] = "success";
    $listsaman = array();
 	while($row = mysqli_fetch_assoc($ViewRS)){
 		array_push($listsaman, $row);
 	}
  	$result['listsaman'] = $listsaman;

  }
  else {
    $result['status'] = "failed";
    $result['query'] = $ViewRS__query;
  }
}
echo json_encode($result);

?>