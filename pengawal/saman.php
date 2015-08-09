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
$noplat = $_POST['noplat'];
$tempat = $_POST['tempat'];
$catatan = $_POST['catatan'];
$nomatrik = $_POST['nomatrik'];
$kesalahan = $_POST['kesalahan'];
$pelapor = $_POST['pelapor'];
$image = $_POST['image'];


  $SamanRS__query="INSERT INTO `laporan` (`noplat`, `tempat`, `catatan`, `nomatrik`, `kesalahan`,`pelapor`) 
  VALUES ('$noplat', '$tempat', '$catatan', '$nomatrik', '$kesalahan','$pelapor')";

  $SamanRS = $connection->query($SamanRS__query);

  if ($SamanRS) {
    $result['status'] = "success";
  }
  else {
    $result['status'] = "failed";
  }
}
echo json_encode($result);

?>