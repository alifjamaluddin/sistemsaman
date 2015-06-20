<?php
include "check_access.php";

require( "config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}


$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	$id = $_GET['id'];
	$Delete__query="DELETE FROM `tracksys`.`trackno` WHERE `trackno`.`id` = $id";
	$DeleteRS = $connection->query($Delete__query);
	echo "<script>alert('Delete success');window.location = '../admin-manage.php';</script>"

?>