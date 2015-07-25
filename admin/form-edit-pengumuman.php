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


$id = $_GET['id'];
$Edit__query="SELECT * FROM `pengumuman` where id = $id";
$EditRS = $connection->query($Edit__query);
$row = mysqli_fetch_assoc($EditRS)

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
				<h1 class="heading">Create Announcement</h1>
			</div>
		</div>
		<div class="content-inner">
			<div class="container">
				<form class="form" method="post" action="../php/editinfo.php">
					<fieldset>
						<legend class="col-lg-10 col-lg-offset-2 col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-4">Pengumuman</legend>
						

						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-4">
									<label class="form-label" for="input-text">Tajuk</label>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-8">
									<input class="form-control" id="input-text" type="text" name="title" placeholder="Isi tajuk pengumuman" value="<?php echo $row['tajuk']; ?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-4">
									<label class="form-label" for="input-text">Isi pengumuman</label>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-8">
									<input class="form-control" id="input-text" type="text" name="content" placeholder="Isi pengumuman" value="<?php echo $row['teks']; ?>">
								</div>
							</div>
						</div>

						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

					</fieldset>



					<div class="form-group-btn">
						<div class="row">
							<div class="col-lg-4 col-lg-push-2 col-md-6 col-md-push-3 col-sm-8 col-sm-push-4">
								<button class="btn btn-blue waves-button waves-light waves-effect" type="submit" name="submit">Update</button><a class="btn waves-button waves-effect" href="pengumuman.php" >Cancel</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include('../template/footer.php'); ?>


	<script src="../js/jquery.min.js"></script>
	<script src="../js/base.min.js" type="text/javascript"></script>
</body>
</html>