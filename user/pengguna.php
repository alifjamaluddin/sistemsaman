<?php
require( "php/config.php" );

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
	<title>Sistem Saman</title>

	<!-- css -->
	<link href="css/base.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

	<!-- favicon -->
	<!-- ... -->

	<!-- ie -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		<body class="avoid-fout">
			<?php include('template/loading.php'); ?>
			<?php include('template/header.php'); ?>
			<?php include('template/menu.php'); ?>
			<?php include('template/profile.php'); ?>
			<div class="content">
				<div class="content-heading">
					<div class="container">
						<h1 class="heading">Pengguna</h1>
					</div>
				</div>

				<div class="container-inner">

					<a class="btn btn-yellow waves-button waves-effect pull-right" href="form-pengawal.php">Daftar pengguna</a>
				</div>

				<div class="container-inner searchbox">
					<div class="container">
						<div class="tile-wrap">
							<div class="tile">
								<form method="post"> 
								<!-- <div class="pull-left tile-side">
									<div class="avatar avatar-blue avatar-sm">
										<span class="icon icon-search"></span>
									</div>
								</div> -->
								<div class="tile-action tile-action-show">
									<ul class="nav nav-list pull-right">
										<li>
											<div class="form-group-btn">
												<button class="btn btn-blue waves-button waves-light waves-effect" type="submit" name="search">Search</button>
											</div>
										</li>
									</ul>
								</div>
								<div class="tile-inner">

									<input class="form-control" id="input-text" type="text" name="carian" placeholder="Carian menggunakan nombor pendaftaran">
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>


			<div class="container-inner">
				<div class="container">
					<?php 


					if(isset($_POST['search'])){
						$nomatrik = $_POST['carian'];

						$View__query="SELECT * FROM `user` where nomatrik = '$nomatrik'";
						$ViewRS = $connection->query($View__query);
						$row = mysqli_fetch_assoc($ViewRS);
						$rowNo = $ViewRS->num_rows;

						if($rowNo > 0){
						echo '
						<div class="col-lg-6 col-sm-6">
							<div class="card">
								<aside class="card-side card-side-img">
									<img alt="alt text" src="images/samples/portrait.jpg">
								</aside>
								<div class="card-main">
									<div class="card-inner">
										<p class="card-heading">'.strtoupper($row['nama']).'</p>
										<p>
											<small>Nombor pendaftaran</small> '.strtoupper($row['nomatrik']).'<br>
											<small>Nombor kad pengenalan</small> '.$row['noic'].'<br>
											<small>Jabatan</small> '.$row['fakulti'].'<br>
											<small>Alamat</small> '.$row['alamat'].'<br>
											<small>Nombor telefon</small> '.$row['notel'].'<br>
											<small>Email</small> '.$row['email'].'<br>
											<a href="form-edit-pengawal.php?id='.$row['id'].'" class="btn btn-flat btn-yellow waves-button waves-effect pull-left">Update User</a>
											<a href="php/deleteuser.php?id='.$row['id'].'" class="btn btn-flat btn-red waves-button waves-effect pull-left">Delete User</a> 

										</p>
									</div>
								</div>
							</div>
						</div>
						';
					}else{
						echo '<p>Tiada dalam senarai</p>';
					}

					}
					?>



				</div>
			</div>







			<?php include('template/footer.php'); ?>

			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="js/base.min.js" type="text/javascript"></script>
		</body>
		</html>