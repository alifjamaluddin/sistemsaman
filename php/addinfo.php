<?php
require( "config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$SUCCESS = "<script>alert('Berjaya membuat pengumuman');window.location='../admin/pengumuman.php';</script>";
$FAILED = "<script>alert('Gagal membuat pengumuman');window.location='../form-pengumuman.php';</script>";
$CANCELLED = "<script>window.location='../pengumuman.php';</script>";

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

  $title=$_POST['title']; 
  $content=$_POST['content']; 


$InsertRS__query="INSERT INTO `pengumuman` (`id`, `tajuk`, `teks`, `tarikh`) VALUES (NULL, '$title', '$content', CURRENT_TIMESTAMP);";

$InsertRS = $connection->query($InsertRS__query);
  if ($InsertRS) {
  	echo $SUCCESS;
    }
  else {
  	ECHO $FAILED;
  }
}

?>