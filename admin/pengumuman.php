<?php
require( "../php/config.php" );

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Pengumuman</title>

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
<?php include('../template/menu.php'); ?>
<?php include('../template/profile-admin.php'); ?>
	<div class="content">
		<div class="content-heading">
			<div class="container">
				<h1 class="heading">Pengumuman</h1>
			</div>
		</div>

		<div class="container-inner">
			<a class="btn btn-yellow waves-button waves-effect pull-right" href="form-pengumuman.php">Tambah pengumuman</a>
		</div>


		<?php 
			$View__query="SELECT * FROM `pengumuman` ORDER BY tarikh DESC limit 5";
			$ViewRS = $connection->query($View__query);
			$ViewRSNumber = $ViewRS->num_rows;


		

		if ($ViewRSNumber > 0) {
			while($row = mysqli_fetch_assoc($ViewRS)){
				echo '
		<div class="content-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-8">
						<p><a class="btn btn-blue collapsed waves-button waves-effect" data-toggle="collapse" href="#collapsible-region'.$row['id'].'"><span class="collapsed-hide">'.$row['tajuk'].'</span><span class="collapsed-show">'.$row['tajuk'].'</span></a></p>
						<div class="collapsible-region collapse" id="collapsible-region'.$row['id'].'">
							'.$row['teks'].'<br>
							Tarikh: '.$row['tarikh'].'<br>
							<hr>
							<a href="form-edit-pengumuman.php?id='.$row['id'].'" class="btn btn-yellow waves-button waves-effect">Edit</a> <a href="../php/deleteinfo.php?id='.$row['id'].'" class="btn btn-red waves-button waves-effect">Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
	}
?>


		

		
	<?php include('../template/footer.php'); ?>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/base.min.js" type="text/javascript"></script>
</body>
</html>