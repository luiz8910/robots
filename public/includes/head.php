<?php
error_reporting(0);
if(!isset($_SESSION))
{
	session_start();
}
?>
<head>

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	
	<?php
	if((!isset($_SESSION['3911a0305ed7f7c9da7204da055f48de']) && $_SESSION['3911a0305ed7f7c9da7204da055f48de']!='adminUSERname') || (!isset($_SESSION['a97a5b9b132dde6f4b50c255d900d9f6']) && $_SESSION['a97a5b9b132dde6f4b50c255d900d9f6']!='adminSession'))
	{
		header('Location: index.php');
		
		exit();
	}
	include "../config/config.php";
	
	include "../includes/functions.php";
	
	$plugin = plugins();
	
	$_SESSION['sb_plugin'] = $plugin;
	
	$_SESSION['sb_storageSetings'] = getStorageSettings();
	
	$moderaterSettings = getModeraterSettings($_SESSION['uid']);
	
	define("FILESPATH",filesPath());
	?>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	
	<link rel="shortcut icon" href="../images/favicon.png?<?php echo timeStamp()?>">
	
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	
	<link href="css/bootoption.css" rel="stylesheet" type="text/css" />
	
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo rootpath()?>/style/css/<?php echo getDefaultheme()?>" rel="stylesheet">
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	
	<script src="js/jquery.js"></script>
	
	<link href="css/preloader.css" rel="stylesheet">
	
	<?php 
	if(adminSidePreloader())
	{ ?>
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="cssload-container">
					<div class="cssload-speeding-wheel"></div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#loading').fadeOut('slow',function(){$(this).remove();});
		});
	</script>
	<?php
	}
	?>
	<div id="submitLoader"></div>
</head>