<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";

include "../../includes/lib/aws/aws-autoloader.php";

use Aws\S3\S3Client;
	
include "../../includes/functions.php";

if(isset($_POST['websiteBackup']) && $_POST['websiteBackup'] == "websiteBackup")
{
	$id = xssClean(mres(trim($_POST['id'])));
	
	$status = xssClean(mres(trim($_POST['status'])));
	
	$type = xssClean(mres(trim($_POST['type'])));
	
	if($type == 0)
	{
		$rows = mysql_fetch_array(mysql_query("SELECT * FROM `backupSetting` WHERE id='$id'"));
		$filename = $rows['backupFile'];
		$originalSrc = '../../backups/'.$filename;
		$otherSrc = 'backups/'.$filename;
	}
	else if($type == 1)
	{
		$rows = mysql_fetch_array(mysql_query("SELECT * FROM `ExportArticles` WHERE id='$id'"));
		$filename = $rows['backupFile'];
		$originalSrc = '../../backups/ArticleBackup/'.$filename;
		$otherSrc = 'backups/ArticleBackup/'.$filename;
	}
	
	if(backupExist($originalSrc,$otherSrc,$status))
	{
		$data = array();
		
		$encodelink = encodeFile($type,$filename,$status);
		
		$data[0] = 1;
		
		$data[1] = $encodelink;

		echo json_encode($data);

		exit();
	} 
	else
	{
		$data = array();
		
		$data[0] = 0;

		echo json_encode($data);

		exit();
	}
}

?>