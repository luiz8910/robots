<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";
	
include "../../includes/functions.php";

define("FILESPATH",filesPath());

// Ads View Chart
if(isset($_POST['adsChart']) && trim($_POST['adsChart']) == "adsChart")
{
	$type = trim($_POST['type']);
	
	if($type == 'daily')
	{
		$query=mysql_query("SELECT SUM(views) as views,SUM(adminViews) as adminViews, DAYNAME(date) as day FROM adsStats WHERE `date` >= CURDATE() - INTERVAL 6 DAY GROUP BY DATE(date)");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['day']; ?>", "value": <?php echo $row['views']; ?>, "value1": <?php echo $row['adminViews']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	else if($type == 'week')
	{
		$query=mysql_query("SELECT SUM(views) as views,SUM(adminViews) as adminViews,DAY(date) as day,MONTHNAME(date) as month,WEEK(date) as week,YEAR(date) as year FROM adsStats WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) GROUP BY WEEK(date)");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['day'],' '.$row['month'].' '.$row['year'] ?>", "value": <?php echo $row['views']; ?>, "value1": <?php echo $row['adminViews']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	else if($type == 'month')
	{
		$query=mysql_query("SELECT SUM(views) as views,SUM(adminViews) as adminViews,MONTHNAME(date) as month,YEAR(date) as year FROM adsStats WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['month'].' '.$row['year'] ?>", "value": <?php echo $row['views']; ?>, "value1": <?php echo $row['adminViews']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	else if($type == 'year')
	{
		$query=mysql_query("SELECT SUM(views) as views,SUM(adminViews) as adminViews,YEAR(date) as year FROM adsStats WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY YEAR(date)");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['year']; ?>", "value": <?php echo $row['views']; ?>, "value1": <?php echo $row['adminViews']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	?>
	<div class="chart-container">
		<div id="ads-View-chart" class="chart-placeholder"></div>
	</div>
	<script>
	Morris.Line({
		element: 'ads-View-chart',
		data: day_data,
		xkey: 'elapsed',
		ykeys: ['value','value1'],
		labels: ['User Views','Admin Views'],
		parseTime: false
	});
	</script>
	<?php
}

// Visitors Chart
if(isset($_POST['visitoresChart']) && trim($_POST['visitoresChart']) == "visitoresChart")
{
	$type = trim($_POST['type']);
	
	if($type == 'daily')
	{
		$query=mysql_query("SELECT `pageViews`,`uniqueHits`,`clicks`,DAYNAME(date) as day FROM `stats` WHERE `date` >= CURDATE() - INTERVAL 6 DAY ORDER BY `date` ASC");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['day']; ?>", "value1": <?php echo $row['pageViews']; ?>, "value2": <?php echo $row['uniqueHits']; ?>, "value3": <?php echo $row['clicks']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	else if($type == 'week')
	{
		$query=mysql_query("SELECT SUM(pageViews) as pageViews,SUM(clicks) as clicks,SUM(uniqueHits) as uniqueHits,DAY(date) as day,MONTHNAME(date) as month,WEEK(date) as week,YEAR(date) as year FROM stats WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) GROUP BY WEEK(date)");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['day'],' '.$row['month'].' '.$row['year'] ?>", "value1": <?php echo $row['pageViews']; ?>, "value2": <?php echo $row['clicks']; ?>, "value3": <?php echo $row['uniqueHits']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	else if($type == 'month')
	{
		$query=mysql_query("SELECT SUM(pageViews) as pageViews,SUM(clicks) as clicks,SUM(uniqueHits) as uniqueHits,MONTHNAME(date) as month,YEAR(date) as year FROM stats  WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['month'].' '.$row['year'] ?>", "value1": <?php echo $row['pageViews']; ?>, "value2": <?php echo $row['clicks']; ?>, "value3": <?php echo $row['uniqueHits']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	else if($type == 'year')
	{
		$query=mysql_query("SELECT SUM(pageViews) as pageViews,SUM(clicks) as clicks,SUM(uniqueHits) as uniqueHits,YEAR(date) as year FROM stats  WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY YEAR(date)");
		?>
		<script>
		var day_data = [
			<?php while($row = mysql_fetch_array($query)) { ?>
			{"elapsed": "<?php echo $row['year']; ?>", "value1": <?php echo $row['pageViews']; ?>, "value2": <?php echo $row['clicks']; ?>, "value3": <?php echo $row['uniqueHits']; ?>},
			<?php } ?>
		];
		</script>
		<?php
	}
	?>
	<div class="chart-container">
		<div id="visitors-chart" class="chart-placeholder"></div>
	</div>
	<script>
	Morris.Line({
		element: 'visitors-chart',
		data: day_data,
		xkey: 'elapsed',
		ykeys: ['value1','value2','value3'],
		labels: ['Page Views','Unique Visitors','Post Clicks'],
		parseTime: false
	});
	</script>
	<?php
}
// Visitors Country Chart
if(isset($_POST['visitorsCountryChart']) && trim($_POST['visitorsCountryChart']) == "visitorsCountryChart")
{
	$type = trim($_POST['type']);
	
	if($type == 'today')
	{
		$query=mysql_query("SELECT COUNT(*) as total, countryCode FROM UserVisitorsInfo WHERE `date` = CURDATE() GROUP BY countryCode");
	}
	else if($type == 'week')
	{
		$query=mysql_query("SELECT COUNT(*) as total, countryCode FROM UserVisitorsInfo WHERE `date` >= CURDATE() - INTERVAL 6 DAY GROUP BY countryCode");
	}
	else if($type == 'month')
	{
		$query=mysql_query("SELECT COUNT(*) as total, countryCode FROM UserVisitorsInfo WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) GROUP BY countryCode");
	}
	else if($type == 'year')
	{
		$query=mysql_query("SELECT COUNT(*) as total, countryCode FROM UserVisitorsInfo WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY countryCode");
	}
	else if($type == 'all')
	{
		$query=mysql_query("SELECT COUNT(*) as total, countryCode FROM UserVisitorsInfo GROUP BY countryCode");
	}
	?>
	<div class="chart-container">
		<div id="visitors-Country-chart" style="height: 250px; width: 100%;" class="chart-placeholder"></div>
	</div>
	<script>
	var visitorsData = {
		<?php while($row = mysql_fetch_array($query)) { ?>
		"<?php echo $row['countryCode']; ?>": <?php echo $row['total']; ?>,
		<?php } ?>
	};
	$('#visitors-Country-chart').vectorMap({
		map: 'world_mill_en',
		backgroundColor: "#FFFFFF",
		regionStyle: {
			initial: {
				fill: '#DDDDDD',
				"fill-opacity": 1,
				stroke: 'none',
				"stroke-width": 0,
				"stroke-opacity": 1
			}
		},
		series: {
			regions: [{
			values: visitorsData,
			scale: ["#F44336", "#2196F3", "#009688", "#8BC34A", "#FFC107" , "#FF5722", "#CDDC39"],
			normalizeFunction: 'polynomial'
			}]
		},
		onRegionLabelShow: function (e, el, code) {
			if (typeof visitorsData[code] != "undefined")
			el.html(el.html() + ': ' + visitorsData[code] + ' Visitors');
		}
	});
	</script>
	<?php
}
// Visitors Refferals Chart
if(isset($_POST['visitorsRefferalsChart']) && trim($_POST['visitorsRefferalsChart']) == "visitorsRefferalsChart")
{
	$rowsperpage = 10;
	
	$type = trim($_POST['type']);
	
	if($type == 'today')
	{
		$result=mysql_query("SELECT COUNT(*) as total,reffrer FROM visitorsInfo WHERE `date` = CURDATE() AND reffrer!= '' GROUP BY reffrer");
	}
	else if($type == 'week')
	{
		$result=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE `date` >= CURDATE() - INTERVAL 6 DAY AND reffrer!= '' GROUP BY reffrer");
	}
	else if($type == 'month')
	{
		$result=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) AND reffrer!= '' GROUP BY reffrer");
	}
	else if($type == 'year')
	{
		$result=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE YEAR(date) = YEAR(CURDATE()) AND reffrer!= '' GROUP BY reffrer");
	}
	else if($type == 'all')
	{
		$result=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE reffrer!= '' GROUP BY reffrer");
	}
	
	$totalrows = mysql_num_rows($result);

	$totalpages = ceil($totalrows / $rowsperpage);

	if (isset($_POST['pageid']) && is_numeric($_POST['pageid'])) 
	{  
		$currentpage = (int) $_POST['pageid'];
	} 	
	else 
	{
		$currentpage = 1;
	}  

	if($currentpage > $totalpages) 
	{
		$currentpage = $totalpages;
	} 
	if($currentpage < 1) 
	{
		$currentpage = 1;
	} 

	$offset = ($currentpage - 1) * $rowsperpage;

	if($currentpage>1) 
	{
		$i=($currentpage*$rowsperpage)-$rowsperpage;
	}
	
	if($type == 'today')
	{
		$query=mysql_query("SELECT COUNT(*) as total,reffrer FROM visitorsInfo WHERE `date` = CURDATE() AND reffrer!= '' GROUP BY reffrer ORDER BY total DESC limit $offset , $rowsperpage");
	}
	else if($type == 'week')
	{
		$query=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE `date` >= CURDATE() - INTERVAL 6 DAY AND reffrer!= '' GROUP BY reffrer ORDER BY total DESC limit $offset , $rowsperpage");
	}
	else if($type == 'month')
	{
		$query=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) AND reffrer!= '' GROUP BY reffrer ORDER BY total DESC limit $offset , $rowsperpage");
	}
	else if($type == 'year')
	{
		$query=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE YEAR(date) = YEAR(CURDATE()) AND reffrer!= '' GROUP BY reffrer ORDER BY total DESC limit $offset , $rowsperpage");
	}
	else if($type == 'all')
	{
		$query=mysql_query("SELECT COUNT(*) as total, reffrer FROM visitorsInfo WHERE reffrer!= '' GROUP BY reffrer ORDER BY total DESC limit $offset , $rowsperpage");
	}
	
	$numRows = mysql_num_rows($query);

	if($numRows > 0)
	{
		echo '<table class="table table-striped">
			<thead>
				<tr>
					<th>Refferals</th>
					<th>Visitors</th>
				</tr>
			</thead>
		<tbody>';
		while($row=mysql_fetch_assoc($query))
		{
			echo '
			<tr>
				<td title="'.htmlspecialchars($row['reffrer']).'"><img src="http://www.google.com/s2/favicons?domain='.$row['reffrer'].'"/> '.$row['reffrer'].'</td>
				<td>'.$row['total'].'</td>
			</tr>';
		}
		echo '</tbody>
		</table>';
		?>
		<ul class="pagination pagination-md pull-left" style="margin-top:10px; margin-left :10px;">
		<?php
		if($totalrows > $rowsperpage)	
		{
			if($currentpage < 3) 
			{
				$range = 7;
			}
			else 
			{
				$range = $currentpage+4;
			}
			$start=1;
			if ($currentpage > 2) 
			{
				$start = $currentpage-2; 
			}
			if ($currentpage > 1) 
			{ 
				?>
				<li>
					<a style="cursor:pointer" class='start' id=<?php echo $start ?> >
						<i class="fa fa-angle-double-left"></i>
					</a>
				<li> 
				
				<?php $prevpage = $currentpage - 1; ?>
				
				<li>
					<a style="cursor:pointer" class='prevpage' id=<?php echo $prevpage ?> >
						<i class="fa fa-angle-left"></i>
					</a>
				<li> 
				<?php
			} 
			for ($x = $currentpage-2; $x <= $range-2; $x++) 
			{
				if (($x > 0) && ($x <= $totalpages)) 
				{
					if ($x == $currentpage) 
					{
						?>
						<li class='active'>
							<a style="cursor:pointer"><?php echo $x ?></a>
						</li>
						<?php
					} 
					else 
					{	?>
						<li>
							<a style="cursor:pointer" class='x' id=<?php echo $x ?> ><?php echo $x ?></a>
						</li> 
						<?php
					}
				} 
			}
			$next=$x-1;
			if ($currentpage != $totalpages) 
			{
				$nextpage = $currentpage + 1;
				?>
				<li>
					<a style="cursor:pointer" class='nextpage' id=<?php echo $nextpage ?>>
						<i class="fa fa-angle-right"></i>
					</a>
				</li>
				<li>
					<a style="cursor:pointer" class='next' id=<?php echo $next ?>>
						<i class="fa fa-angle-double-right"></i>
					</a>
				</li> 
				<?php
			} 
		}
		?>
		</ul>
		<script>
		$(".start").click(function()
		{ 
			var page = $(this).attr("id");
			$(".visitorsRefferalsChart").html('<p class="tabsLoader"><img src="<?php echo rootpath()?>/images/loading.gif"></p>');
			var type = '<?php echo $type;?>';
			$.ajax
			({	
				type:"POST",
				url: "<?php echo rootpath()?>/statsCalculation.php",
				data:{pageid : page,'type':type,'visitorsRefferalsChart':'visitorsRefferalsChart'},
				success: function(ajaxresult)
				{
					$('.visitorsRefferalsChart').html(ajaxresult);
				}    
			});
		});
		$(".prevpage").click(function()
		{ 
			var page = $(this).attr("id");
			$(".visitorsRefferalsChart").html('<p class="tabsLoader"><img src="<?php echo rootpath()?>/images/loading.gif"></p>'); 
			var type = '<?php echo $type;?>';
			$.ajax
			({	
				type:"POST",
				url: "<?php echo rootpath()?>/statsCalculation.php",
				data:{pageid : page,'type':type,'visitorsRefferalsChart':'visitorsRefferalsChart'},
				success: function(ajaxresult)
				{
					$('.visitorsRefferalsChart').html(ajaxresult);
				}    
			});
		});
		$(".x").click(function()
		{ 
			var page = $(this).attr("id");
			$(".visitorsRefferalsChart").html('<p class="tabsLoader"><img src="<?php echo rootpath()?>/images/loading.gif"></p>');
			var type = '<?php echo $type;?>';
			$.ajax
			({	
				type:"POST",
				url: "<?php echo rootpath()?>/statsCalculation.php",
				data:{pageid : page,'type':type,'visitorsRefferalsChart':'visitorsRefferalsChart'},
				success: function(ajaxresult)
				{
					$('.visitorsRefferalsChart').html(ajaxresult);
				}    
			});
		});
		$(".nextpage").click(function()
		{ 
			var page = $(this).attr("id");
			$(".visitorsRefferalsChart").html('<p class="tabsLoader"><img src="<?php echo rootpath()?>/images/loading.gif"></p>');
			var type = '<?php echo $type;?>';
			$.ajax
			({	
				type:"POST",
				url: "<?php echo rootpath()?>/statsCalculation.php",
				data:{pageid : page,'type':type,'visitorsRefferalsChart':'visitorsRefferalsChart'},
				success: function(ajaxresult)
				{
					$('.visitorsRefferalsChart').html(ajaxresult);
				}    
			});
		});
		$(".next").click(function()
		{ 
			var page = $(this).attr("id");
			$(".visitorsRefferalsChart").html('<p class="tabsLoader"><img src="<?php echo rootpath()?>/images/loading.gif"></p>');
			var type = '<?php echo $type;?>';
			$.ajax
			({	
				type:"POST",
				url: "<?php echo rootpath()?>/statsCalculation.php",
				data:{pageid : page,'type':type,'visitorsRefferalsChart':'visitorsRefferalsChart'},
				success: function(ajaxresult)
				{
					$('.visitorsRefferalsChart').html(ajaxresult);
				}    
			});
		});
		$(function () 
		{ 
			$("[data-toggle='tooltip']").tooltip(); 
		});
		</script>
		<?php
	}
	else
	{
		?>
		<h1 class="emptyPage"><i class="fa fa-exclamation-triangle"></i>&nbsp;No Reffrer Found!</h1>
		<?php
	}
}
// Most Commented Post Chart
if(isset($_POST['commentedPost']) && trim($_POST['commentedPost']) == "commentedPost")
{
	$pageNo = trim($_POST['page']);
	$start = $pageNo*5;
	$post=widgetsPermissions();
	$commentedPost = mysql_query("SELECT distinct articles.*,(SELECT count(*) from threaded_comments WHERE articles.id = threaded_comments.lid) as countOrder from articles WHERE `status`='1' HAVING countOrder > 0 ORDER BY countOrder DESC LIMIT $start,5"); 
	$count = mysql_num_rows(mysql_query("SELECT distinct articles.*,(SELECT count(*) from threaded_comments WHERE articles.id = threaded_comments.lid) as countOrder from articles WHERE `status`='1' HAVING countOrder > 0"));
	if($count > 0)
	{
		?>
		<ul class="list-group">
			<?php
			$i = $start+1;
			while($fetch = mysql_fetch_array($commentedPost))
			{
			$user=userInfoById($fetch['uid']);
			?>	
			<li class="list-group-item">
				<div class="media">
					<div class="media-body">
						<h1 class="media-heading line-clamp line-clamp-2">
						<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>" class="primaryText"><?php echo $i.'. '.truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?></a>
						</h1>
						<a href="<?php echo rootpath()?>/<?php echo $user['username']?>"><small><span class="lightprimaryText">By&nbsp;</span>&nbsp;<?php echo $user['profileUsername']?>&nbsp;</small>
						</a>
						<span class="statsPosts">Comments : <?php echo number_format($fetch['countOrder']); ?></span>
					</div>
					<div class="media-right media-middle">
						<div class="loader-<?php echo $pageNo?>-commented">
							<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>">
							<img src="<?php echo rootpath()?>/images/articlesImages/thumb2/<?php echo $fetch['image']?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>" class="media-object" no="43" style="display: block;">
							</a>
						</div>
					</div>
				</div>
			</li>
			<?php 
			$i++;
			}
			?>
		</ul>
		<?php 
	}
	else
	{
		?>
		<h1 class="emptyPage"><i class="fa fa-exclamation-triangle"></i>&nbsp;No More Post!</h1>
		<?php
	}
	?>
	<script>
	var count = <?php echo $count;?>;
	var pageNo = <?php echo $pageNo;?>;
	var PostNo = <?php echo $i; ?>;
	$("#commentedPostPrev").attr("value", "<?php echo ($pageNo == 0 ? $pageNo:$pageNo-1);?>");
	$("#commentedPostNext").attr("value", "<?php echo $pageNo+1;?>");
	if(PostNo > count)
	{
		$('#commentedPostNext').attr("disabled", true);
		$("#commentedPostPrev").removeAttr("disabled");
	}
	else if(pageNo == 0)
	{
		$('#commentedPostPrev').attr("disabled", true);
		$("#commentedPostNext").removeAttr("disabled");
	}
	else
	{
		$("#commentedPostPrev").removeAttr("disabled");
		$("#commentedPostNext").removeAttr("disabled");
	}
	$('.loader-<?php echo $pageNo?>-commented img').imgPreload();
	</script>
	<?php
}
// Most Point Post Chart
if(isset($_POST['pointPost']) && trim($_POST['pointPost']) == "pointPost")
{
	$pageNo = trim($_POST['page']);
	$start = $pageNo*5;
	$post=widgetsPermissions();
	$ratedPost = mysql_query("SELECT distinct articles.*,(SELECT count(*) from productpointStatus WHERE articles.id = productpointStatus.pid) as countOrder from articles WHERE `status`='1' HAVING countOrder > 0 ORDER BY countOrder DESC LIMIT $start,5"); 
	$count = mysql_num_rows(mysql_query("SELECT distinct articles.*,(SELECT count(*) from productpointStatus WHERE articles.id = productpointStatus.pid) as countOrder from articles WHERE `status`='1' HAVING countOrder > 0"));
	$i = $start+1;
	if($count > 0)
	{
		?>
		<ul class="list-group">
			<?php
			while($fetch = mysql_fetch_array($ratedPost))
			{
				$user=userInfoById($fetch['uid']);
				?>	
				<li class="list-group-item">
					<div class="media">
						<div class="media-body">
							<h1 class="media-heading line-clamp line-clamp-2">
							<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>" class="primaryText"><?php echo $i.'. '.truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?></a>
							</h1>
							<a href="<?php echo rootpath()?>/<?php echo $user['username']?>"><small><span class="lightprimaryText">By&nbsp;</span>&nbsp;<?php echo $user['profileUsername']?>&nbsp;</small>
							</a>
							<span class="statsPosts">Rating : <?php echo number_format($fetch['countOrder']); ?></span>
						</div>
						<div class="media-right media-middle">
							<div class="loader-<?php echo $pageNo?>-point">
								<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>">
								<img src="<?php echo rootpath()?>/images/articlesImages/thumb2/<?php echo $fetch['image']?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>" class="media-object" no="43" style="display: block;">
								</a>
							</div>
						</div>
					</div>
				</li>
				<?php 
				$i++;
			}
			?>
		</ul>
		<?php
	}
	else
	{
		?>
		<h1 class="emptyPage"><i class="fa fa-exclamation-triangle"></i>&nbsp;No More Post!</h1>
		<?php
	}
	?>
	<script>
	var count = <?php echo $count;?>;
	var pageNo = <?php echo $pageNo;?>;
	var PostNo = <?php echo $i; ?>;
	$("#pointPostPrev").attr("value", "<?php echo ($pageNo == 0 ? $pageNo:$pageNo-1);?>");
	$("#pointPostNext").attr("value", "<?php echo $pageNo+1;?>");
	if(PostNo > count)
	{
		$('#pointPostNext').attr("disabled", true);
		$("#pointPostPrev").removeAttr("disabled");
	}
	else if(pageNo == 0)
	{
		$('#pointPostPrev').attr("disabled", true);
		$("#pointPostNext").removeAttr("disabled");
	}
	else
	{
		$("#pointPostPrev").removeAttr("disabled");
		$("#pointPostNext").removeAttr("disabled");
	}
	$('.loader-<?php echo $pageNo?>-point img').imgPreload();
	</script>
	<?php
}
// Most Recent Post Chart
if(isset($_POST['recentPost']) && trim($_POST['recentPost']) == "recentPost")
{
	$pageNo = trim($_POST['page']);
	$start = $pageNo*5;
	$post=widgetsPermissions();
	$recentPost = mysql_query("SELECT * FROM articles WHERE `status`='1' ORDER BY DATE DESC LIMIT $start,5"); 
	$count = mysql_num_rows(mysql_query("SELECT * FROM articles WHERE `status`='1'"));
	$i = $start+1;
	if($count > 0)
	{
		?>
		<ul class="list-group">
			<?php
			while($fetch = mysql_fetch_array($recentPost))
			{
			$user=userInfoById($fetch['uid']);
			?>	
			<li class="list-group-item">
				<div class="media">
					<div class="media-body">
						<h1 class="media-heading line-clamp line-clamp-2">
							<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>" class="primaryText"><?php echo $i.'. '.truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?></a>
						</h1>
						<a href="<?php echo rootpath()?>/<?php echo $user['username']?>"><small><span class="lightprimaryText">By&nbsp;</span>&nbsp;<?php echo $user['profileUsername']?>&nbsp;</small>
						</a>
						<small class="text-muted lightprimaryText"><?php echo timeAgo($fetch['date']);?> </small>
					</div>
					<div class="media-right media-middle">
						<div class="loader-<?php echo $pageNo?>-recent">
							<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>">
							<img src="<?php echo rootpath()?>/images/articlesImages/thumb2/<?php echo $fetch['image']?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>" class="media-object" no="43" style="display: block;">
							</a>
						</div>
					</div>
				</div>
			</li>
			<?php
			$i++;
			}
			?>
		</ul>
		<?php 
	}
	else
	{
		?>
		<h1 class="emptyPage"><i class="fa fa-exclamation-triangle"></i>&nbsp;No More Post!</h1>
		<?php
	}
	?>
	<script>
	var count = <?php echo $count;?>;
	var pageNo = <?php echo $pageNo;?>;
	var PostNo = <?php echo $i; ?>;
	$("#recentPostPrev").attr("value", "<?php echo ($pageNo == 0 ? $pageNo:$pageNo-1);?>");
	$("#recentPostNext").attr("value", "<?php echo $pageNo+1;?>");
	if(PostNo > count)
	{
		$('#recentPostNext').attr("disabled", true);
		$("#recentPostPrev").removeAttr("disabled");
	}
	else if(pageNo == 0)
	{
		$('#recentPostPrev').attr("disabled", true);
		$("#recentPostNext").removeAttr("disabled");
	}
	else
	{
		$("#recentPostPrev").removeAttr("disabled");
		$("#recentPostNext").removeAttr("disabled");
	}
	$('.loader-<?php echo $pageNo?>-recent img').imgPreload();
	</script>
	<?php
}
// Most Viewed Post Chart
if(isset($_POST['viewedPost']) && trim($_POST['viewedPost']) == "viewedPost")
{
	$pageNo = trim($_POST['page']);
	$start = $pageNo*5;
	$post=widgetsPermissions();
	$viewsPost = mysql_query("SELECT * FROM articles WHERE `status`='1' ORDER BY views DESC LIMIT $start,5"); 
	$count = mysql_num_rows(mysql_query("SELECT * FROM articles WHERE `status`='1'"));
	$i = $start+1;
	if($count > 0)
	{
		?>
		<ul class="list-group">
			<?php
			while($fetch = mysql_fetch_array($viewsPost))
			{
			$user=userInfoById($fetch['uid']);
			?>	
			<li class="list-group-item">
				<div class="media">
					<div class="media-body">
						<h1 class="media-heading line-clamp line-clamp-2">
						<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>" class="primaryText"><?php echo $i.'. '.truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?></a>
						</h1>
						<a href="<?php echo rootpath()?>/<?php echo $user['username']?>"><small><span class="lightprimaryText">By&nbsp;</span>&nbsp;<?php echo $user['profileUsername']?>&nbsp;</small>
						</a>
						<span class="statsPosts">Views : <?php echo number_format($fetch['views']); ?></span>
					</div>
					<div class="media-right media-middle">
						<div class="loader-<?php echo $pageNo?>-viewed">
							<a target="_blank" href="<?php echo rootpath()?>/<?php echo $user['username']?>/<?php echo $fetch['permalink']?>/<?php echo $fetch['id']?>">
							<img src="<?php echo rootpath()?>/images/articlesImages/thumb2/<?php echo $fetch['image']?>" alt="<?php echo truncate($fetch['title'],$post['sidebarTopTitleTruncateLimit'])?>" class="media-object" no="43" style="display: block;">
							</a>
						</div>
					</div>
				</div>
			</li>
			<?php 
			$i++;
			}
			?>
		</ul>
		<?php 
	}
	else
	{
		?>
		<h1 class="emptyPage"><i class="fa fa-exclamation-triangle"></i>&nbsp;No More Post!</h1>
		<?php
	}
	?>
	<script>
	var count = <?php echo $count;?>;
	var pageNo = <?php echo $pageNo;?>;
	var PostNo = <?php echo $i; ?>;
	$("#viewedPostPrev").attr("value", "<?php echo ($pageNo == 0 ? $pageNo:$pageNo-1);?>");
	$("#viewedPostNext").attr("value", "<?php echo $pageNo+1;?>");
	if(PostNo > count)
	{
		$('#viewedPostNext').attr("disabled", true);
		$("#viewedPostPrev").removeAttr("disabled");
	}
	else if(pageNo == 0)
	{
		$('#viewedPostPrev').attr("disabled", true);
		$("#viewedPostNext").removeAttr("disabled");
	}
	else
	{
		$("#viewedPostPrev").removeAttr("disabled");
		$("#viewedPostNext").removeAttr("disabled");
	}
	$('.loader-<?php echo $pageNo?>-viewed img').imgPreload();
	</script>
	<?php
}
?>