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
  $nodaftar =  $_POST['nodaftar']; 
  $password = $_POST['password']; 
  $loginPassword=md5($password);
  $LoginRS__query="SELECT * FROM pengawal WHERE nodaftar='$nodaftar' AND password='$loginPassword'";
  // $result['query'] = $LoginRS__query;
  $result['nodaftar'] = $nodaftar;
  $result['password'] = $password;

  $LoginRS = $connection->query($LoginRS__query);

  $loginFoundUser = $LoginRS->num_rows;

  if ($loginFoundUser > 0) {
    $row = mysqli_fetch_assoc($LoginRS);
    $result['status'] = "success";
    $result['id'] = $row['id'];
    $_SESSION['id'] = $row['id'];
  }
  else {

    $result['status'] = "failed";
    $result['error'] = "Username or password is wrong";
    $result['id'] = null;
  }
}
echo json_encode($result);

?>