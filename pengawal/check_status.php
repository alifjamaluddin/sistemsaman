<?php

require( "../php/config.php" );

$result = array();
$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno()){
	$result['status'] = "failed";
	$result["error"] = mysqli_connect_error();
}else{
	$result['status'] = "success";
}

echo json_encode($result);	