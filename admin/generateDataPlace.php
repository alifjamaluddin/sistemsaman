<?php

header('Content-Type: application/json');
require( "../php/config.php" );
// include "../php/check_access_admin.php";	

// *** Validate request to login to this site.
// if (!isset($_SESSION)) {
//   session_start();
// }


$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$place = $_GET['place'];	
$View__query="
SELECT count(l.id) as 'usage', l.tarikhlaporan as 'tarikh' from laporan l, tempat t WHERE l.tempat = $place and l.tempat = t.id GROUP BY month(l.tarikhlaporan)
";
							
// Check connection
$data_points = array();	
$ViewRS = $connection->query($View__query);
	while($row = mysqli_fetch_assoc($ViewRS)){
$month = date('m', $row['tarikh']);
$newTimestamp = mktime(0, 0, 0, $month, 0, 0);
        $point = array("x" => $newTimestamp, "y" => $row['usage']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points);




mysqli_close($connection);

?>