<?php
require( "config.php" );

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$REDIRECT_ADMIN = "../../admin-panel.html";
 $REDIRECT_LOGIN = "../../admin-login.php";

if(!isset($_SESSION['USER_ID']) && empty($_SESSION['USER_ID'])) {
	header("Location: " . $REDIRECT_LOGIN );
}


 


$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

if (isset($_POST['submit'])) {

  $name=$_POST['name']; 
  $phone=$_POST['phone']; 
  $tracking=$_POST['tracking']; 


$InsertRS__query="INSERT INTO `tracksys`.`trackno` (`nama`, `notel`, `trackingno`) VALUES ('$name', '$phone', '$tracking');";
// echo $LoginRS__query;

$InsertRS = $connection->query($InsertRS__query);

  // $loginFoundUser = $LoginRS->num_rows;

  if ($InsertRS) {
      // $row = mysqli_fetch_assoc($LoginRS);
      //   $userID = $row['id'];
      //   $_SESSION['USER_ID'] = $userID;  
    echo "<script>alert('Data Insert Success');window.location='../admin-panel.php'</script>";
    }
  else {

    echo "<script>alert('Data Insert Fail');window.location='../admin-panel.php'</script></script>";
  }
}

?>