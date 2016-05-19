<script src="js/jquery.lockfixed.js"></script>
<?php
function countAllArticles()
{
	$query = mysql_query("SELECT COUNT(id) AS `total` FROM `articles` WHERE `status`!='2'");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countApprovedArticles()
{
	$query = mysql_query("SELECT COUNT(id) AS `total` FROM `articles` WHERE `approval`='1' AND `status`!='2'");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countUnapprovedArticles()
{
	$query = mysql_query("SELECT COUNT(id) AS `total` FROM `articles` WHERE `approval`='0' AND `status`!='2'");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countRemovedArticles()
{
	$query = mysql_query("SELECT COUNT(id) AS `total` FROM `articles` WHERE `status`='2'");
	$fetch = mysql_fetch_array($query);
	return $fetch['total'];
}
function countAllCategory()
{
	$query = mysql_query("SELECT COUNT(id) AS `totalCategory` FROM `categories`");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalCategory'];
}
function countAllPages()
{
	$query = mysql_query("SELECT COUNT(id) AS `totalPages` FROM `pages`");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalPages'];
}
function countAllLinks()
{
	$query = mysql_query("SELECT COUNT(id) AS `totalPages` FROM `links`");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalPages'];
}
function countAllUsers()
{
	$loggedUsedId = $_SESSION['uid'];
	$query = mysql_query("SELECT COUNT(id) AS `totalUsers` FROM `users` WHERE `primaryAdmin`!='1' AND `id`!='$loggedUsedId'");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalUsers'];
}
function countAllModerators()
{
	$loggedUsedId = $_SESSION['uid'];
	$query = mysql_query("SELECT COUNT(id) AS `totalUsers` FROM `users` WHERE `primaryAdmin`!='1' AND `id`!='$loggedUsedId' AND `type`='2'");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalUsers'];
}
function countUnApprovedComments()
{
	$query = mysql_query("SELECT COUNT(id) AS `totalUnApprovedComments` FROM `threaded_comments` WHERE `approval`='0'");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalUnApprovedComments'];
}
function countApprovedComments()
{
	$query = mysql_query("SELECT COUNT(id) AS `totalApprovedComments` FROM `threaded_comments` WHERE `approval`='1'");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalApprovedComments'];
}
function countAllAdministrators()
{
	$loggedUsedId = $_SESSION['uid'];
	$query = mysql_query("SELECT COUNT(id) AS `totalUsers` FROM `users` WHERE `primaryAdmin`!='1' AND `id`!='$loggedUsedId' AND `type`='1'");
	$fecth = mysql_fetch_array($query);
	return $fecth['totalUsers'];
}
function countAllReaction()
{
	$query = mysql_query("SELECT COUNT(id) AS `Reaction` FROM `pointSettings`");
	$fecth = mysql_fetch_array($query);
	return $fecth['Reaction'];
}
?>
<section class="sidebar sidebarMenuScroll">
	<ul class="sidebar-menu">
		<?php 
		if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
		{
			?>
			<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "dashboard.php" ? "active" : "") ?>">
				<a href="dashboard.php">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "generalSettings.php" ? "active" : "") ?>"><a href="generalSettings.php"><i class="fa fa-cog"></i> General Settings</a></li>
			<?php
		}
		if(basename($_SERVER['PHP_SELF']) == "articles.php" || basename($_SERVER['PHP_SELF']) == "editArticle.php" || basename($_SERVER['PHP_SELF']) == "addSlide.php" || basename($_SERVER['PHP_SELF']) == "editSlide.php" || basename($_SERVER['PHP_SELF']) == "slides.php" || basename($_SERVER['PHP_SELF']) == "trashcan.php" || basename($_SERVER['PHP_SELF']) == "articleSettings.php")
		{
			?>
			<li class="treeview active">
				<a href="#">
					<i class="fa fa-th"></i>
					<span>Posts</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<?php
					if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
					{
						?>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "articleSettings.php" ? "active" : "") ?>">
							<a href="articleSettings.php">
								<i class="fa fa-gear"></i> Posts Settings
							</a>
						</li>
						<?php
					}
					?>
					<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "articles.php" && isset($_GET['a']) ? "active" : "") ?>">
						<a href="articles.php?a=1">
							<i class="fa fa-unlock"></i> Approved (<?php echo countApprovedArticles()?>)
						</a>
					</li>
					<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "articles.php" && isset($_GET['u']) ? "active" : "") ?>">
						<a href="articles.php?u=0">
							<i class="fa fa-lock"></i> Un Approved (<?php echo countUnapprovedArticles()?>)
						</a>
					</li>
					<?php
					if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
					{
						?>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "trashcan.php" ? "active" : "") ?>">
							<a href="trashcan.php">
								<i class="fa fa-trash"></i> Trashcan (<?php echo countRemovedArticles()?>)
							</a>
						</li>
						<?php
					}
					?>
					<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "articles.php" && !isset($_GET['a']) && !isset($_GET['u']) && basename($_SERVER['PHP_SELF']) != "articleSettings.php" || (basename($_SERVER['PHP_SELF']) == "slides.php" || basename($_SERVER['PHP_SELF']) == "addSlide.php" || basename($_SERVER['PHP_SELF']) == "editSlide.php") ? "active" : "") ?>">
						<a href="articles.php">
							<i class="fa fa-newspaper-o"></i> All Posts (<?php echo countAllArticles()?>)
						</a>
					</li>
				</ul>
			</li>
			<?php
		}
		else
		{
			?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-th"></i>
					<span>Posts</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<?php
					if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
					{
						?>
						<li>
							<a href="articleSettings.php">
								<i class="fa fa-gear"></i> Posts Settings
							</a>
						</li>
						<?php
					}
					?>
					<li>
						<a href="articles.php?p=1">
							<i class="fa fa-unlock"></i> Approved (<?php echo countApprovedArticles()?>)
						</a>
					</li>
					<li>
						<a href="articles.php?u=0">
							<i class="fa fa-lock"></i> Un Approved (<?php echo countUnapprovedArticles()?>)
						</a>
					</li>
					<li>
						<a href="trashcan.php">
							<i class="fa fa-trash"></i> Trashcan (<?php echo countRemovedArticles()?>)
						</a>
					</li>
					<?php
					if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
					{
						?>
						<li>
							<a href="articles.php">
								<i class="fa fa-newspaper-o"></i> All Posts(<?php echo countAllArticles()?>)
							</a>
						</li>
						<?php
					}
					?>
				</ul>
			</li>
			<?php
		}
		if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
		{
			if(basename($_SERVER['PHP_SELF']) == "addCategory.php" || basename($_SERVER['PHP_SELF']) == "categories.php" || basename($_SERVER['PHP_SELF']) == "editCategory.php" || basename($_SERVER['PHP_SELF']) == "categoryDelete.php" || basename($_SERVER['PHP_SELF']) == "categorySettings.php")
			{
				?>
				<li class="treeview active">
					<a href="#">
						<i class="fa fa-folder-open"></i>
						<span>Categories</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "categorySettings.php" ? "active" : "") ?>">
							<a href="categorySettings.php">
							<i class="fa fa-gear"></i>Categories Settings
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "addCategory.php" ? "active" : "") ?>">
							<a href="addCategory.php">
							<i class="fa fa-plus-square-o"></i> Add Category
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "categories.php" ? "active" : "") ?>">
							<a href="categories.php">
								<i class="fa fa-folder-open"></i> All Categories  (<?php echo countAllCategory()?>)
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-folder-open"></i>
						<span>Categories</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="categorySettings.php">
							<i class="fa fa-gear"></i>Categories Settings
							</a>
						</li>
						<li>
							<a href="addCategory.php">
							<i class="fa fa-plus-square-o"></i> Add Category
							</a>
						</li>
						<li>
							<a href="categories.php">
								<i class="fa fa-folder-open"></i> All Categories  (<?php echo countAllCategory()?>)
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
			if($plugin['cache'])
			{
				if(basename($_SERVER['PHP_SELF']) == "links.php" || basename($_SERVER['PHP_SELF']) == "addLink.php" || basename($_SERVER['PHP_SELF']) == "editLink.php")
				{
					?>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-code"></i>
							<span>External Links</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "addLink.php" ? "active" : "") ?>">
								<a href="addLink.php">
									<i class="fa fa-plus-square-o"></i> Add Link
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "links.php" ? "active" : "") ?>">
								<a href="links.php">
								<i class="fa fa-code"></i> All Links (<?php echo countAllLinks()?>)
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-code"></i>
							<span>External Links</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="addLink.php">
									<i class="fa fa-plus-square-o"></i> Add Link
								</a>
							</li>
							<li>
								<a href="links.php">
								<i class="fa fa-code"></i> All Links (<?php echo countAllLinks()?>)
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
			}
			if($plugin['pages'])
			{
				if(basename($_SERVER['PHP_SELF']) == "pages.php" || basename($_SERVER['PHP_SELF']) == "addPage.php" || basename($_SERVER['PHP_SELF']) == "editPage.php")
				{
					?>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-file"></i>
							<span>Pages</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "addPage.php" ? "active" : "") ?>">
								<a href="addPage.php">
									<i class="fa fa-plus-square-o"></i> Add Page
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "pages.php" ? "active" : "") ?>">
								<a href="pages.php">
								<i class="fa fa-file"></i> All Pages (<?php echo countAllPages()?>)
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-file"></i>
							<span>Pages</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="addPage.php">
									<i class="fa fa-plus-square-o"></i> Add Page
								</a>
							</li>
							<li>
								<a href="pages.php">
								<i class="fa fa-file"></i> All Pages (<?php echo countAllPages()?>)
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
			}
			if(basename($_SERVER['PHP_SELF']) == "users.php" || basename($_SERVER['PHP_SELF']) == "editUser.php" || basename($_SERVER['PHP_SELF']) == "addUser.php" || basename($_SERVER['PHP_SELF']) == "userSettings.php" || basename($_SERVER['PHP_SELF']) == "moderatorSettings.php")
			{
				?>
				<li class="treeview active">
					<a href="#">
						<i class="fa fa-users"></i>
						<span>Users</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "userSettings.php" ? "active" : "") ?>">
							<a href="userSettings.php">
								<i class="fa fa-gear"></i> User Settings
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "moderatorSettings.php" ? "active" : "") ?>">
							<a href="moderatorSettings.php">
								<i class="fa fa-user"></i> Moderator Settings
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "addUser.php" ? "active" : "") ?>">
							<a href="addUser.php">
								<i class="fa fa-plus-square-o"></i> Add User
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "users.php" && $_GET['usertype'] == 'moderators' ? "active" : "") ?>">
							<a href="users.php?usertype=moderators">
								<i class="fa fa-users"></i> Moderators (<?php echo countAllModerators() ?>)
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "users.php" && $_GET['usertype'] == 'admin' ? "active" : "") ?>">
							<a href="users.php?usertype=admin">
								<i class="fa fa-users"></i> Administrators (<?php echo countAllAdministrators() ?>)
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "users.php" && !isset($_GET['usertype']) ? "active" : "") ?>">
							<a href="users.php">
								<i class="fa fa-users"></i> All Users (<?php echo countAllUsers()?>)
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i>
						<span>Users</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="userSettings.php">
								<i class="fa fa-gear"></i> User Settings
							</a>
						</li>
						<li>
							<a href="moderatorSettings.php">
								<i class="fa fa-user"></i> Moderator Settings
							</a>
						</li>
						<li>
							<a href="addUser.php">
								<i class="fa fa-plus-square-o"></i> Add User
							</a>
						</li>
						<li>
							<a href="users.php?usertype=moderators">
								<i class="fa fa-users"></i> Moderators (<?php echo countAllModerators() ?>)
							</a>
						</li>
						<li>
							<a href="users.php?usertype=admin">
								<i class="fa fa-users"></i> Administrators (<?php echo countAllAdministrators() ?>)
							</a>
						</li>
						<li>
							<a href="users.php">
								<i class="fa fa-users"></i> All Users (<?php echo countAllUsers()?>)
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
			if(basename($_SERVER['PHP_SELF']) == "adsCode.php" || basename($_SERVER['PHP_SELF']) == "adsSettings.php"  || basename($_SERVER['PHP_SELF']) == "adsRequests.php")
			{
				?>
				<li class="treeview active">
					<a href="#">
						<i class="fa fa-puzzle-piece"></i>
						<span>Ads Management</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "adsSettings.php" ? "active" : "") ?>">
							<a href="adsSettings.php">
								<i class="fa fa-gear"></i> Ads Settings
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "adsCode.php" ? "active" : "") ?>">
							<a href="adsCode.php">
							<i class="fa fa-code"></i> Ads Code
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "adsRequests.php" ? "active" : "") ?>">
							<a href="adsRequests.php">
							<i class="fa fa-retweet"></i> Ads Requests
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-puzzle-piece"></i>
						<span>Ads Management</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="adsSettings.php">
								<i class="fa fa-gear"></i>Ads Settings
							</a>
						</li>
						<li>
							<a href="adsCode.php">
							<i class="fa fa-code"></i> Ads Code
							</a>
						</li>
						<li>
							<a href="adsRequests.php">
							<i class="fa fa-retweet"></i> Ads Requests
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
			if(basename($_SERVER['PHP_SELF']) == "pointSettings.php" || basename($_SERVER['PHP_SELF']) == "editPoints.php" || basename($_SERVER['PHP_SELF']) == "addPoints.php" || basename($_SERVER['PHP_SELF']) == "reactionSettings.php")
			{
				?>
				<li class="treeview active">
					<a href="#">
						<i class="fa fa-heartbeat"></i>
						<span>Reaction Settings</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "reactionSettings.php" ? "active" : "") ?>">
							<a href="reactionSettings.php">
								<i class="fa fa-meh-o"></i> Reaction Settings
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "addPoints.php" ? "active" : "") ?>">
							<a href="addPoints.php">
								<i class="fa fa-plus-square-o"></i> Add Reaction
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "pointSettings.php" ? "active" : "") ?>">
							<a href="pointSettings.php">
								<i class="fa fa-heartbeat"></i> All Reaction (<?php echo countAllReaction()?>)
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-heartbeat"></i>
						<span>Reaction Settings</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="reactionSettings.php">
								<i class="fa fa-meh-o"></i> Reaction Settings
							</a>
						</li>
						<li>
							<a href="addPoints.php">
								<i class="fa fa-plus-square-o"></i> Add Reaction
							</a>
						</li>
						<li>
							<a href="pointSettings.php">
								<i class="fa fa-heartbeat"></i> All Reaction (<?php echo countAllReaction()?>)
							</a>
						</li>
					</ul>
				</li>
				<?php
			}
		}
		if(basename($_SERVER['PHP_SELF']) == "commentSettings.php" || basename($_SERVER['PHP_SELF']) == "manageComments.php" || basename($_SERVER['PHP_SELF']) == "editComment.php")
		{
			?>
			<li class="treeview active">
				<a href="#">
					<i class="fa fa-comment"></i>
					<span>Comments</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<?php
					if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
					{
						?>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "commentSettings.php" ? "active" : "") ?>">
							<a href="commentSettings.php">
								<i class="fa fa-gear"></i> Comment Settings
							</a>
						</li>
						<?php
					}
					?>
					<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "manageComments.php" && $_GET['status'] == "1" ? "active" : "") ?>">
						<a href="manageComments.php?status=1">
							<i class="fa fa-comment"></i> Approved Comments (<?php echo countApprovedComments() ?>)
						</a>
					</li>
					<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "manageComments.php" && $_GET['status'] == "0" ? "active" : "") ?>">
						<a href="manageComments.php?status=0">
							<i class="fa fa-comment"></i> UnApproved Comments (<?php echo countUnApprovedComments() ?>)
						</a>
					</li>
					<li class="<?php echo ((basename($_SERVER['PHP_SELF']) == "manageComments.php" || basename($_SERVER['PHP_SELF']) == "editComment.php") && !(isset($_GET['status'])) ? "active" : "") ?>">
						<a href="manageComments.php">
							<i class="fa fa-comment"></i> All Comments
						</a>
					</li>
				</ul>
			</li>
			<?php
		}
		else
		{
			?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-comment"></i>
					<span>Comments</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<?php
					if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
					{
						?>
						<li>
							<a href="commentSettings.php">
								<i class="fa fa-gear"></i> Comment Settings
							</a>
						</li>
						<?php
					}
					?>
					<li>
						<a href="manageComments.php?status=1">
							<i class="fa fa-comment"></i> Approved Comments (<?php echo countApprovedComments() ?>)
						</a>
					</li>
					<li>
						<a href="manageComments.php?status=0">
							<i class="fa fa-comment"></i> UnApproved Comments (<?php echo countUnApprovedComments() ?>)
						</a>
					</li>
					<li>
						<a href="manageComments.php">
							<i class="fa fa-comment"></i> All Comments
						</a>
					</li>
				</ul>
			</li>
			<?php
		}
		if($_SESSION['714cbc1503d753f7d81a7c8ac9639b2d']=='AdmInIsTrator')
		{
			if(basename($_SERVER['PHP_SELF']) == "socialProfiles.php" || basename($_SERVER['PHP_SELF']) == "socialSharings.php" || basename($_SERVER['PHP_SELF']) == "socialLoginSettings.php")
			{
				?>
				<li class="treeview active">
					<a href="#">
						<i class="fa fa-th"></i>
						<span>Social Settings</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "socialProfiles.php" ? "active" : "") ?>">
							<a href="socialProfiles.php">
								<i class="fa fa-user"></i> Social Profiles
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "socialSharings.php" ? "active" : "") ?>">
							<a href="socialSharings.php">
								<i class="fa fa-share-square-o"></i> Social Sharings
							</a>
						</li>
						<?php
						if($plugin['socialLogin'])
						{
							?>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "socialLoginSettings.php" ? "active" : "") ?>">
								<a href="socialLoginSettings.php">
									<i class="fa fa-users"></i> Social Login Settings
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-th"></i>
						<span>Social Settings</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="socialProfiles.php">
								<i class="fa fa-user"></i> Social Profiles
							</a>
						</li>
						<li>
							<a href="socialSharings.php">
								<i class="fa fa-share-square-o"></i> Social Sharings
							</a>
						</li>
						<?php
						if($plugin['socialLogin'])
						{
							?>
							<li>
								<a href="socialLoginSettings.php">
									<i class="fa fa-users"></i> Social Login Settings
								</a>
							</li>
						<?php
						}
						?>
					</ul>
				</li>
				<?php
			}
			if(basename($_SERVER['PHP_SELF']) == "mailSettings.php" || basename($_SERVER['PHP_SELF']) == "emailTemplate.php" || basename($_SERVER['PHP_SELF']) == "newsletter.php" || basename($_SERVER['PHP_SELF']) == "newsLetterGroups.php" || basename($_SERVER['PHP_SELF']) == "sendNewsLetter.php" || basename($_SERVER['PHP_SELF']) == "editNewsLetter.php" || basename($_SERVER['PHP_SELF']) == "createNewsletterGroup.php" || basename($_SERVER['PHP_SELF']) == "editNewsletterGroup.php" || basename($_SERVER['PHP_SELF']) == "newsletterEmail.php")
			{
				?>
				<li class="treeview active">
					<a href="#">
						<i class="fa fa-envelope"></i>
						<span>Email Settings</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "mailSettings.php" ? "active" : "") ?>">
							<a href="mailSettings.php">
								<i class="fa fa-share"></i> Manage Email
							</a>
						</li>
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "emailTemplate.php" ? "active" : "") ?>">
							<a href="emailTemplate.php">
								<i class="fa fa-align-left"></i> Email Template
							</a>
						</li>
						<?php
						if($plugin['newsLetter'])
						{
							?>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "newsletterEmail.php" ? "active" : "") ?>">
								<a href="newsletterEmail.php">
									<i class="fa fa-reply-all"></i> Manage Newsletter Email
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "newsletter.php" || basename($_SERVER['PHP_SELF']) == "sendNewsLetter.php" || basename($_SERVER['PHP_SELF']) == "editNewsLetter.php" ? "active" : "") ?>">
								<a href="newsletter.php">
									<i class="fa fa-paper-plane"></i> Send Newsletters
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "newsLetterGroups.php" || basename($_SERVER['PHP_SELF']) == "createNewsletterGroup.php" || basename($_SERVER['PHP_SELF']) == "editNewsletterGroup.php" ? "active" : "") ?>">
								<a href="newsLetterGroups.php">
									<i class="fa fa-users"></i> Newsletter Groups
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-envelope"></i>
						<span>Email Settings</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="mailSettings.php">
								<i class="fa fa-share"></i> Manage Email
							</a>
						</li>
						<li>
							<a href="emailTemplate.php">
								<i class="fa fa-align-left"></i> Email Template
							</a>
						</li>
						<?php
						if($plugin['newsLetter'])
						{
							?>
							<li>
								<a href="newsletterEmail.php">
									<i class="fa fa-reply-all"></i> Manage Newsletter Email
								</a>
							</li>
							<li>
								<a href="newsletter.php">
									<i class="fa fa-paper-plane"></i> Send Newsletters
								</a>
							</li>
							<li>
								<a href="newsLetterGroups.php">
									<i class="fa fa-users"></i> Newsletter Groups
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				</li>
				<?php
			}
			if($plugin['sitemaps'])
			{
				if(basename($_SERVER['PHP_SELF']) == "sitemapSettings.php" || basename($_SERVER['PHP_SELF']) == "allSitemaps.php")
				{
					?>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-sitemap"></i>
							<span>Sitemaps</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "sitemapSettings.php" ? "active" : "") ?>">
								<a href="sitemapSettings.php">
									<i class="fa fa-plus-square-o"></i> Generate Sitemaps
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "allSitemaps.php" ? "active" : "") ?>">
								<a href="allSitemaps.php">
									<i class="fa fa-sitemap"></i> All Sitemaps
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-sitemap"></i>
							<span>Sitemaps</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="sitemapSettings.php">
									<i class="fa fa-plus-square-o"></i> Generate Sitemaps
								</a>
							</li>
							<li>
								<a href="allSitemaps.php">
									<i class="fa fa-sitemap"></i> All Sitemaps
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
			}
			if($plugin['backups'])
			{
				if(basename($_SERVER['PHP_SELF']) == "websiteBackup.php" || basename($_SERVER['PHP_SELF']) == "exportArticles.php" || basename($_SERVER['PHP_SELF']) == "articlesBackup.php" || basename($_SERVER['PHP_SELF']) == "importArticles.php" || basename($_SERVER['PHP_SELF']) == "importBackup.php")
				{
					?>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-compress"></i>
							<span>Backup Settings</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "websiteBackup.php" || basename($_SERVER['PHP_SELF']) == "importBackup.php" ? "active" : "") ?>">
								<a href="websiteBackup.php">
									<i class="fa fa-briefcase"></i> Website Backups
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "articlesBackup.php" || basename($_SERVER['PHP_SELF']) == "importArticles.php" || basename($_SERVER['PHP_SELF']) == "exportArticles.php" ? "active" : "") ?>">
								<a href="articlesBackup.php">
									<i class="fa fa-table"></i> Article Backups
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-compress"></i>
							<span>Backup Settings</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="websiteBackup.php">
									<i class="fa fa-briefcase"></i> Website Backups
								</a>
							</li>
							<li>
								<a href="articlesBackup.php">
									<i class="fa fa-table"></i> Article Backups
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
			}
			
			if($plugin['smilies'])
			{
				if(basename($_SERVER['PHP_SELF']) == "emoticons.php" || basename($_SERVER['PHP_SELF']) == "editEmoticon.php" || basename($_SERVER['PHP_SELF']) == "addEmoticon.php")
				{
					?>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-smile-o"></i>
							<span>Emoticons</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "addEmoticon.php" ? "active" : "") ?>">
								<a href="addEmoticon.php">
									<i class="fa fa-plus"></i> Add Emoticon
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "editEmoticon.php" || basename($_SERVER['PHP_SELF']) == "emoticons.php" ? "active" : "") ?>">
								<a href="emoticons.php">
									<i class="fa fa-smile-o"></i> All Emoticons
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-smile-o"></i>
							<span>Emoticons</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "addEmoticon.php" ? "active" : "") ?>">
								<a href="addEmoticon.php">
									<i class="fa fa-plus"></i> Add Emoticon
								</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "editEmoticon.php" || basename($_SERVER['PHP_SELF']) == "emoticons.php" ? "active" : "") ?>">
								<a href="emoticons.php">
									<i class="fa fa-smile-o"></i> All Emoticons
								</a>
							</li>
						</ul>
					</li>
					<?php
				}
			}
			?>
			<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "plugins.php" ? "active" : "") ?>"><a href="plugins.php"><i class="fa fa-plug"></i> Plugins Settings</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "themeSettings.php" ? "active" : "") ?>"><a href="themeSettings.php"><i class="fa fa-paint-brush"></i> Themes Settings</a></li>
			<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "analyticsSettings.php" ? "active" : "") ?>"><a href="analyticsSettings.php"><i class="fa fa-code"></i> Analytics Settings</a></li>
			<?php 
			if($plugin['amazonS3'])
			{
				?>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "storageSettings.php" ? "active" : "") ?>"><a href="storageSettings.php"><i class="fa fa-hdd-o"></i> Storage Settings</a></li>
				<?php
			}
			if($plugin['cache'])
			{
				?>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "cacheSettings.php" ? "active" : "") ?>"><a href="cacheSettings.php"><i class="fa fa-recycle"></i> Cache Settings</a></li>
				<?php
			}
			if($plugin['captcha'])
			{
				?>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "captchaSettings.php" ? "active" : "") ?>"><a href="captchaSettings.php"><i class="fa fa-eye-slash"></i> Captcha Settings</a></li>
				<?php
			}
			?>
			<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "languageSettings.php" || basename($_SERVER['PHP_SELF']) == "addLanguage.php" || basename($_SERVER['PHP_SELF']) == "editLanguage.php" ? "active" : "") ?>"><a href="languageSettings.php"><i class="fa fa-language"></i> Language Settings</a></li>	
			<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "mediaSettings.php" ? "active" : "") ?>"><a href="mediaSettings.php"><i class="fa fa-bullhorn"></i> Media Settings</a></li>
			<?php
			if($plugin['rss'])
			{
				?>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "rssSettings.php" ? "active" : "") ?>"><a href="rssSettings.php"><i class="fa fa-rss"></i> RSS Settings</a></li>
				<?php
			}
			if($plugin['ddosPrevention'])
			{
				?>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "ddos.php" ? "active" : "") ?>"><a href="ddos.php"><i class="fa fa-shield"></i> DDOS Settings</a></li>
				<?php
			}
			if($plugin['watermark'])
			{
				?>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "watermarkSettings.php" ? "active" : "") ?>"><a href="watermarkSettings.php"><i class="fa fa-cog"></i> Watermark Settings</a></li>
				<?php
			}
		}
		?>
		<li><a href="logout.php"><i class="fa fa-sign-out"></i>  Sign Out</a></li>
	</ul>
</section>
<script>
/* (function($) {
$.lockfixed(".sidebarMenuScroll",{offset: {top: 0, bottom: 0}});
})(jQuery); */

</script>