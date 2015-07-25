<?php
require( "../php/config.php" );

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Sistem Saman</title>

	<!-- css -->
	<link href="../css/base.min.css" rel="stylesheet">

	<!-- favicon -->
	<!-- ... -->

	<!-- ie -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body class="avoid-fout">
	<?php include('../template/loading.php'); ?>
<?php include('../template/header.php'); ?>
<?php include('../template/student-menu.php'); ?>
<?php include('../template/profile.php'); ?>
	<div class="content">
		<div class="content-heading">
			<div class="container">
				<h1 class="heading">Saman</h1>
			</div>
		</div>


		<?php 
			$nomatrik = strtoupper($_SESSION['nomatrik']);
			$View__query="SELECT l.id, l.noplat, l.catatan, l.nomatrik, l.tarikhlaporan, t.nama as 'tempat', k.nama as 'kesalahan' FROM `laporan` l, tempat t, kesalahan k WHERE l.kesalahan = k.id and l.tempat = t.id and nomatrik = '$nomatrik' ORDER BY tarikhlaporan DESC";
			$ViewRS = $connection->query($View__query);
			$ViewRSNumber = $ViewRS->num_rows;


		

		if ($ViewRSNumber > 0) {
			while($row = mysqli_fetch_assoc($ViewRS)){
				echo '
		<div class="content-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-8">
						<p><a class="btn btn-yellow collapsed waves-button waves-effect" data-toggle="collapse" href="#collapsible-region'.$row['id'].'"><span class="collapsed-hide">'.$row['noplat'].'</span><span class="collapsed-show">'.$row['noplat'].'</span></a></p>
						<div class="collapsible-region collapse" id="collapsible-region'.$row['id'].'">
							Nombor matrik: '.$row['nomatrik'].'<br>
							No Plat Kenderaan: '.$row['noplat'].'<br>
							Tempat: '.$row['tempat'].'<br>
							Kesalahan: '.$row['kesalahan'].'<br>
							Catatan: '.$row['catatan'].'<br>
							Tarikh saman: '.$row['tarikhlaporan'].'<br>
							
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
	}
?>


		

		
	<?php include('../template/footer.php'); ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/base.min.js" type="text/javascript"></script>
</body>
</html>