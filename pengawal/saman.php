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
$image = $_POST['imageStr'];
$binary=base64_decode($image);
$filename = $_POST['imageName'];
header('Content-Type: bitmap; charset=utf-8');
$imagedir = '../images/laporan/'.$filename;
$file = fopen($imagedir, 'wb');
fwrite($file, $binary);
fclose($file);

if($noplat == "" && $tempat == "" && $catatan == "" && $nomatrik == "" && $kesalahan == "" ){
  $result['status'] = "failed";
  $result['error'] = "Please fill all required fields";
}else{
$SamanRS__query="INSERT INTO `laporan` (`noplat`, `tempat`, `catatan`, `nomatrik`, `kesalahan`,`pelapor`,`image`) 
  VALUES ('$noplat', '$tempat', '$catatan', '$nomatrik', '$kesalahan','$pelapor','$filename')";

  $SamanRS = $connection->query($SamanRS__query);

  if ($SamanRS) {
    $result['status'] = "success";
  }
  else {
    $result['status'] = "failed";
  }

}
  
}
echo json_encode($result);

?>