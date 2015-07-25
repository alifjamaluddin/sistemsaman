<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Sistem Saman</title>

	<!-- css -->
	<link href="../css/base.min.css" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet">

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
	<!-- 	<div class="content-heading">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-push-3 col-sm-10 col-sm-push-1">
						<h1 class="heading">Sistem Saman</h1>
					</div>
				</div>
			</div>
		</div> -->
		<div class="content-inner">
		<div class="container">
			<?php include "../template/user-tabs.php"; ?>
		</div>
		</div>
	</div>
<?php include('../template/footer.php'); ?>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/base.min.js" type="text/javascript"></script>
</body>
</html>