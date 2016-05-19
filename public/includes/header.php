<header class="header">
	<a target="_blank" href="<?php echo rootpath() ?>" class="logo secondary-bg-color">
		<img src="../images/<?php echo getHeaderLogo()?>?<?php echo timeStamp();?>">
	</a>
	<nav class="navbar navbar-static-top primary-bg-color" role="navigation">
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-right"> 
			<ul class="nav navbar-nav">
				<li>
					<a href="<?php echo rootpath()?>" target="_blank"><i class="fa fa-globe"></i> Visit Website</a>
				</li>
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<?php
						$fetch=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `type`='".$_SESSION['uSerType']."' AND `id`='".$_SESSION['uid']."'"));
						
						?>
						<span><?php echo($fetch['username']); ?> <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-footer">
							<a href="profile.php">
							<i class="fa fa-user"></i> Profile</a>
							<a href="logout.php">
							<i class="fa fa-sign-out"></i> Sign Out</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>