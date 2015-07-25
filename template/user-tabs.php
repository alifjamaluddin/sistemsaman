<div class="content-inner">
			<div class="container">
				<nav class="tab-nav tab-nav-alt front-tabs">
							<ul class="nav nav-justified">
								<li  class="active">
									<a class="waves-color-alt waves-effect" data-toggle="tab" href="#first-tab" aria-expanded="false">Home</a>
								</li>
								<li>
									<a class="waves-color-alt waves-effect" data-toggle="tab" href="#second-tab" aria-expanded="true">About</a>
								</li>
								<li>
									<a class="waves-color-alt waves-effect" data-toggle="tab" href="#third-tab">Contact</a>
								</li>
							</ul>
						<div class="tab-nav-indicator" style="left: 204px; right: 189px;"></div>
				</nav>
				<div class="tab-content">
							<div class="tab-pane fade active in" id="first-tab">
								<?php include "frontpage/home.php"; ?>
							</div>
							<div class="tab-pane fade" id="second-tab">
								<?php include "frontpage/about.php"; ?>
							</div>
							<div class="tab-pane fade" id="third-tab">
								<?php include "frontpage/contact.php"; ?>
							</div>
						</div>
			</div>
</div>
