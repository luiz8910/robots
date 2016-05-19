<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";
	
include "../../includes/functions.php";

$type = trim($_POST['type']);

$rowsperpage = 10;

if($type == 'today')
	$result = mysql_query("	SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE DATE(dt) = CURDATE() GROUP BY countryCode");
else if($type == 'week')
	$result = mysql_query("	SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= NOW() - INTERVAL 6 DAY GROUP BY countryCode");
else if($type == 'month')
	$result = mysql_query("	SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= (NOW() - INTERVAL 1 MONTH) GROUP BY countryCode");
else if($type == 'year')
	$result = mysql_query("	SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= (NOW() - INTERVAL 1 YEAR) GROUP BY countryCode");
else if($type == 'all')
	$result = mysql_query("	SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online GROUP BY countryCode");
else if($type == 'online')
	$result = mysql_query("	SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= NOW() - INTERVAL 1 MINUTE GROUP BY countryCode");
	
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
	$records = mysql_query("SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE DATE(dt) = CURDATE() GROUP BY countryCode ORDER BY total DESC limit $offset , $rowsperpage");
else if($type == 'week')
	$records = mysql_query("SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= NOW() - INTERVAL 6 DAY GROUP BY countryCode ORDER BY total DESC limit $offset , $rowsperpage");
else if($type == 'month')
	$records = mysql_query("SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= (NOW() - INTERVAL 1 MONTH) GROUP BY countryCode ORDER BY total DESC limit $offset , $rowsperpage");
else if($type == 'year')
	$records = mysql_query("SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= (NOW() - INTERVAL 1 YEAR) GROUP BY countryCode ORDER BY total DESC limit $offset , $rowsperpage");
else if($type == 'all')
	$records = mysql_query("SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online GROUP BY countryCode ORDER BY total DESC limit $offset , $rowsperpage");
else if($type == 'online')
	$records = mysql_query("SELECT countryCode,country,COUNT(*) AS total FROM tz_who_is_online WHERE `dt` >= NOW() - INTERVAL 1 MINUTE GROUP BY countryCode ORDER BY total DESC limit $offset , $rowsperpage");
	
$numRows = mysql_num_rows($records);

if($numRows > 0)
{
	echo '<table class="table table-striped">
		<thead>
			<tr>
				<th>Country</th>
				<th>Visitors</th>
			</tr>
		</thead>
		<tbody>';
	while($row=mysql_fetch_assoc($records))
	{
		echo '
		<tr>
			<td title="'.htmlspecialchars($row['country']).'"><img src="'.rootpath().'/admin/images/country/'.strtolower($row['countryCode']).'.gif" width="16" height="11" /> '.$row['country'].'</td>
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
	<?php
}
else
{
	?>
	<h1 class="emptyPage"><i class="fa fa-exclamation-triangle"></i>&nbsp;No Record Found!</h1>
	<?php
}
?>
<script>
$(".start").click(function()
{ 
	var page = $(this).attr("id");
	var type = '<?php echo $type;?>';
	$('.online,.month,.week,.year,.all,.today').removeClass('active');
	$('.'+type).addClass('active');
	$.ajax
	({	
		type:"POST",
		url:"<?php echo rootpath() ?>/admin/includes/geodata.php",
		data:{pageid : page,'type':type},
		success: function(ajaxresult)
		{
			$(".onlineWidget").html(ajaxresult);
		}    
	});
});
$(".prevpage").click(function()
{ 
	var page = $(this).attr("id");
	var type = '<?php echo $type;?>';
	$('.online,.month,.week,.year,.all,.today').removeClass('active');
	$('.'+type).addClass('active');
	$.ajax
	({	
		type:"POST",
		url:"<?php echo rootpath() ?>/admin/includes/geodata.php",
		data:{pageid : page,'type':type},
		success: function(ajaxresult)
		{
			$(".onlineWidget").html(ajaxresult);
		}    
	});
});
$(".x").click(function()
{ 
	var page = $(this).attr("id");
	var type = '<?php echo $type;?>';
	$('.online,.month,.week,.year,.all,.today').removeClass('active');
	$('.'+type).addClass('active');
	$.ajax
	({	
		type:"POST",
		url:"<?php echo rootpath() ?>/admin/includes/geodata.php",
		data:{pageid : page,'type':type},
		success: function(ajaxresult)
		{
			$(".onlineWidget").html(ajaxresult);
		}    
	});
});
$(".nextpage").click(function()
{ 
	var page = $(this).attr("id");
	var type = '<?php echo $type;?>';
	$('.online,.month,.week,.year,.all,.today').removeClass('active');
	$('.'+type).addClass('active');
	$.ajax
	({	
		type:"POST",
		url:"<?php echo rootpath() ?>/admin/includes/geodata.php",
		data:{pageid : page,'type':type},
		success: function(ajaxresult)
		{
			$(".onlineWidget").html(ajaxresult);
		}    
	});
});
$(".next").click(function()
{ 
	var page = $(this).attr("id");
	var type = '<?php echo $type;?>';
	$('.online,.month,.week,.year,.all,.today').removeClass('active');
	$('.'+type).addClass('active');
	$.ajax
	({	
		type:"POST",
		url:"<?php echo rootpath() ?>/admin/includes/geodata.php",
		data:{pageid : page,'type':type},
		success: function(ajaxresult)
		{
			$(".onlineWidget").html(ajaxresult);
		}    
	});
});
$(function () 
{ 
	$("[data-toggle='tooltip']").tooltip(); 
});
</script>