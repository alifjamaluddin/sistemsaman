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


$month = $_GET['month'];	
$View__query="
SELECT count(l.id) as 'usage', t.nama from laporan l, tempat t 
WHERE l.tempat = t.id
AND month(tarikhlaporan) = $month 
GROUP BY t.id
";
							
// Check connection
$data_points = array();	
$ViewRS = $connection->query($View__query);
	while($row = mysqli_fetch_assoc($ViewRS)){
        $point = array("label" => $row['nama'] , "y" => $row['usage']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);




mysqli_close($connection);

?>