<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";

include "../../includes/lib/aws/aws-autoloader.php";
	
include "../../includes/functions.php";

$data = array();

$error = false;

if(isset($_POST['id']) && isset($_POST['websiteBackup']) && trim($_POST['websiteBackup']) == "websiteBackup") 
{ 
	$id = trim($_POST['id']); 
	
	$status = trim($_POST['status']); 
	
	$rows = mysql_fetch_array(mysql_query("SELECT * FROM `backupSetting` WHERE id='$id'"));
	
	$backupFile = $rows['backupFile'];
	
	if($backupFile)
	{	
		if($status == 0)
			unlink('../../backups/'.$backupFile);
		else if($status == 1)
			deleteFromBucket('backups/'.$backupFile);
		else if($status == 2)
		{
			unlink('../../backups/'.$backupFile);
			deleteFromBucket('backups/'.$backupFile);
		}
			
		unlink('../../backups/Database/Database.sql');
		
		delete_directory('../../backups/Restore/images');
		
		delete_directory('../../backups/Restore/Database');

		mysql_query("DELETE FROM `backupSetting` WHERE id='$id'");
		
		$count = mysql_num_rows(mysql_query("SELECT * FROM `backupSetting`"));
		
		$data[0] = 1;
		
		$data[1] = $count;
	}
	else
	{
		$data[0] = '0';
	}
}
else if(isset($_POST['id']) && isset($_POST['articleBackup']) && trim($_POST['articleBackup']) == "articleBackup") 
{ 
	$id = $_POST['id']; 
	
	$status = trim($_POST['status']); 
	
	$rows = mysql_fetch_array(mysql_query("SELECT * FROM `ExportArticles` WHERE id='$id'"));
	
	$backupFile = $rows['backupFile'];
	
	if($backupFile)
	{	
		if($status == 0)
			unlink('../../backups/ArticleBackup/'.$backupFile);
		else if($status == 1)
			deleteFromBucket('backups/ArticleBackup/'.$backupFile);
		else if($status == 2)
		{
			unlink('../../backups/ArticleBackup/'.$backupFile);
			deleteFromBucket('backups/ArticleBackup/'.$backupFile);
		}
		
		unlink('../../backups/ArticleBackup/Database/Database.sql');

		mysql_query("DELETE FROM `ExportArticles` WHERE id='$id'");
		
		$count = mysql_num_rows(mysql_query("SELECT * FROM `ExportArticles`"));
		
		$data[0] = 1;
		
		$data[1] = $count;
	}
	else
	{
		$data[0] = '0';
	}
}
else if(isset($_POST['id']) && isset($_POST['deleteGroup']) && trim($_POST['deleteGroup']) == "deleteGroup") 
{ 
	$id = $_POST['id']; 

	mysql_query("DELETE FROM `NewsletterGroups` WHERE id='$id'");
	
	$count = mysql_num_rows(mysql_query("SELECT * FROM `NewsletterGroups`"));
	
	$data[0] = $count;
}
else if(isset($_POST['id']) && isset($_POST['deleteNewsletter']) && trim($_POST['deleteNewsletter']) == "deleteNewsletter") 
{ 
	$id = $_POST['id']; 

	mysql_query("DELETE FROM `sendNewsletters` WHERE id='$id'");
	
	$count = mysql_num_rows(mysql_query("SELECT * FROM `sendNewsletters`"));
	
	$data[0] = $count;
}

echo json_encode($data);

exit(); 
?>