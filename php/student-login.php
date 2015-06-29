<?php
require( "config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}


$SUCCESS = "<script>window.location='../user';</script>";
$FAILED = "<script>alert('Wrong username or password');window.history.back();</script>";

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

if (isset($_POST['submit'])) {
// echo "submitted";
  $nomatrik=$_POST['nomatrik']; 
  $password=$_POST['password']; 
  // echo $username;
  // echo $password;
  $loginPassword=md5($password);
  // echo $loginPassword;


$LoginRS__query="SELECT * FROM user WHERE nomatrik='$nomatrik' AND password='$loginPassword'";
echo "<script>alert('$LoginRS__query');</script>";
// echo $LoginRS__query;
// echo $LoginRS__query;

$LoginRS = $connection->query($LoginRS__query);

  $loginFoundUser = $LoginRS->num_rows;

  if ($loginFoundUser > 0) {
    // echo "User found";
      $row = mysqli_fetch_assoc($LoginRS);
        // $userID = $row['id'];
        // $_SESSION['USER_ID'] = $userID;  
    echo $SUCCESS;
    }
  else {

    echo $FAILED;
    // header("Location: ". $REDIRECT_FAILED );
  }
}

?>