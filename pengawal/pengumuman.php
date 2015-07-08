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
  $ViewRS__query="SELECT * FROM pengumuman ORDER BY tarikh DESC";

  $ViewRS = $connection->query($ViewRS__query);

  if ($ViewRS) {
    $result['status'] = "success";
    $tajuk = array();
    $detail = array();
    while($row = mysqli_fetch_assoc($ViewRS)){
      array_push($tajuk, $row['tajuk']);
      array_push($detail, $row);
      // $tajuk[] = $row['tajuk']; 
      // $detail[] = $row;
    }
   
    $result['tajuk'] = $tajuk;
    $result['detail'] = $detail;
    

    
  }
  else {
    $result['status'] = "failed";
    $result['query'] = $ViewRS__query;
  }
}
echo json_encode($result);

?>