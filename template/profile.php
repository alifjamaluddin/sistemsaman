	// *** Validate request to login to this site.
<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

	<nav class="menu menu-right" id="profile">
		<div class="menu-scroll">
			<div class="menu-wrap">
				<div class="menu-top">
					<div class="menu-top-img">
						<img alt="John Smith" src="../images/samples/landscape.jpg">
					</div>
					<div class="menu-top-info">
						<a class="menu-top-user" href="javascript:void(0)"><span class="avatar pull-left"><img alt="alt text for <?php echo $_SESSION['nama'] ?> avatar" src="../images/users/avatar-001.jpg"></span><?php echo $_SESSION['nama'] ?></a>
					</div>
					<div class="menu-top-info-sub">
						<small><?php echo $_SESSION['email'] ?></small>
					</div>
				</div>
				<div class="menu-content">
					<ul class="nav">
						<!-- <li>
							<a href="javascript:void(0)"><span class="icon icon-account-box"></span>Profile Settings</a>
						</li> -->
						<li>
							<a href="../php/logout.php"><span class="icon icon-exit-to-app"></span>Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>