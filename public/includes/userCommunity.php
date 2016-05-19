<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";
	
include "../../includes/functions.php";

include "../../includes/lib/cache/phpfastcache.php";

phpFastCache::setup("storage","auto");

date_default_timezone_set('UTC');

define("FILESPATH",filesPath());

$online=xssClean(mres(trim($_POST['online'])));

$start = trim($_POST['start']);

$limit = trim($_POST['limit']);

if(isset($online) && $online == 'currentOnline')
{	
	$cache = phpFastCache(); 
	
	$count = mysql_num_rows(mysql_query("SELECT * FROM onlineUser WHERE `currentOnline` >= NOW() - INTERVAL 1 MINUTE"));
	
	$variable = 'currentlyOnlineUser-'.$count.$limit;
											
	$data = $cache->get($variable);
	
	if($data==null)
	{
		$data = array();
		
		$qry = mysql_query("SELECT * FROM onlineUser WHERE `currentOnline` >= NOW() - INTERVAL 1 MINUTE LIMIT $start,$limit");
		
		while($row = mysql_fetch_array($qry))
		{
			$data[] = $row;
		}
		$cache->set($variable,$data,600);
	}

	if($count > 0)
	{
		foreach($data as $row)
		{
			$userId = $row['userId'];
			$fetch = mysql_fetch_array(mysql_query("SELECT * from users WHERE id='$userId' AND `verify`=1"));
			$date = new DateTime($fetch['joiningDate']);
			$joinDate = $date->format('M j, Y');
			?>
			<li>
				<a target="_blank" href="<?php echo rootpath()?>/<?php echo $fetch['username']?>">
				 <?php
					if($fetch['profilePicture'] && isFileExist('../../images/profilePictures/'.$fetch['profilePicture'],'images/profilePictures/'.$fetch['profilePicture']))
					{ ?>
					  <img src="<?php echo  getFilesPath() ?>/images/profilePictures/<?php echo $fetch['profilePicture']?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>">
					 <?php
					}
					else
					{ ?>
						<img src="<?php echo  rootpath()?>/images/profilePictures/<?php echo getDefaultPicture($fetch['gender']);?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>">
					<?php
					} ?>
				</a>
				<a class="users-list-name" target="_blank" href="<?php echo rootpath()?>/<?php echo $fetch['username']?>"><?php echo $fetch['profileUsername']?></a>
				<span class="users-list-date"><?php echo $joinDate;?></span>
			</li>
			<?php 
		}	
	}
	else
	{
		?><div style='position: absolute; left: 38%; top: 50%;'><h4>Currently no user found!</h4></div><?php
	}
	if($count > $limit)
	{
		?><a class="loadmoreStats">load More</a><?php
	}
}
else if(isset($online) && $online == 'todayOnline')
{
	$query = mysql_query("SELECT * FROM `onlineUser` WHERE DATE(date) = CURDATE() LIMIT $start,$limit");
	
	$count = mysql_num_rows($query);
	
	if($count > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			$userId = $row['userId'];
			$fetch = mysql_fetch_array(mysql_query("SELECT * from users WHERE id='$userId' AND `verify`=1"));
			$date = new DateTime($fetch['joiningDate']);
			$joinDate = $date->format('M j, Y');
			?>
			<li>
				<a target="_blank" href="<?php echo rootpath()?>/<?php echo $fetch['username']?>">
				 <?php
					if($fetch['profilePicture'] && file_exists('../../images/profilePictures/'.$fetch['profilePicture']))
					{ ?>
					  <img src="<?php echo  rootpath()?>/images/profilePictures/<?php echo $fetch['profilePicture']?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>">
					 <?php
					}
					else
					{ ?>
						<img src="<?php echo  rootpath()?>/images/profilePictures/<?php echo getDefaultPicture($fetch['gender']);?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>">
					<?php
					} ?>
				</a>
				<a class="users-list-name" target="_blank" href="<?php echo rootpath()?>/<?php echo $fetch['username']?>"><?php echo $fetch['profileUsername']?></a>
				<span class="users-list-date"><?php echo $joinDate;?></span>
			</li>
			<?php 
		}	
	}		
	if($count != $limit)
	{
		?>
		<script>
		document.getElementById("loadtodayOnlineUser").style.display = "none";
		</script>
		<?php 
	}
}
?>