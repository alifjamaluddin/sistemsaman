<?php
require( "../php/config.php" );
// include "../php/check_access_admin.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA	-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Student Activity Center Reservation System</title>

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
			<div class="avoid-fout-indicator avoid-fout-indicator-fixed">
				<div class="progress-circular progress-circular-alt progress-circular-center">
					<div class="progress-circular-wrapper">
						<div class="progress-circular-inner">
							<div class="progress-circular-left">
								<div class="progress-circular-spinner"></div>
							</div>
							<div class="progress-circular-gap"></div>
							<div class="progress-circular-right">
								<div class="progress-circular-spinner"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<header class="header">
			

			<ul class="nav nav-list pull-left">
			<li>
				<a data-toggle="menu" href="#menu">
					<span class="access-hide">Menu</span>
					<span class="icon icon-menu icon-lg"></span>
				</a>
			</li>
		</ul>
				<a class="header-logo" href="index.php">Student Activity Center Reservation System</a>
				
				<ul class="nav nav-list pull-right">
					<li>
						<a data-toggle="menu" href="#profile">
							<span class="access-hide">Sign In</span>
							<span class="avatar avatar-sm"><img alt="alt text for John Smith avatar" src="../images/users/avatar-001.jpg"></span>
						</a>
					</li>
				</ul>
			</header>
			<?php include "../template/admin-menu.php"; ?>
			<?php include "../template/admin-profile.php"; ?>

			<div class="content">
	<div class="content-heading">
					<div class="container">
						<h1 class="heading">Statistic Report</h1>
					</div>
				</div>
				<div class="container-inner searchbox">
					<div class="container">
						<div class="tile-wrap">
							<div class="tile">
								<form method="get" action="statistic.php"> 
								<!-- <div class="pull-left tile-side">
									<div class="avatar avatar-blue avatar-sm">
										<span class="icon icon-search"></span>
									</div>
								</div> -->
								<div class="tile-action tile-action-show">
									<ul class="nav nav-list pull-right">
										<li>
											<div class="form-group-btn">
												<button class="btn btn-blue waves-button waves-light waves-effect" type="submit" name="report">Generate Report</button>
											</div>
										</li>
									</ul>
								</div>
								<div class="tile-inner">

									<select class="form-control" id="input-select" name="month" onchange="" size="1">
								    <option value="1">January</option>
								    <option value="2">February</option>
								    <option value="3">March</option>
								    <option value="4">April</option>
								    <option value="5">May</option>
								    <option value="6">June</option>
								    <option value="7">July</option>
								    <option value="8">August</option>
								    <option value="9">September</option>
								    <option value="10">October</option>
								    <option value="11">November</option>
								    <option value="12">December</option>
								</select>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			</div>

			
			
			<!-- FOOTER -->
			<?php include "../template/footer.php"; ?>

			<script src="../js/jquery.min.js"></script>
			<script src="../js/base.min.js" type="text/javascript"></script>
		</body>
		</html>