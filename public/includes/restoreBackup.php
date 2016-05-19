<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";

include "../../includes/lib/aws/aws-autoloader.php";

use Aws\S3\S3Client;
	
include "../../includes/functions.php";

set_time_limit(200);

$defineSize = return_bytes(ini_get('upload_max_filesize'));

define ("MAX_SIZE",$defineSize);

$error = false;  

if(isset($_POST['uploadFile']) && $_POST['uploadFile'] == "uploadFile")
{
	$allowed = array('zip');
	
	if(isset($_FILES['importzipFile']))
	{
		
		$size=filesize($_FILES['importzipFile']['tmp_name']);
		
		if (($size > MAX_SIZE || $size == "") && !$error)
		{
			$data[0] = '0';
			$data['msg'] = 'File Size Exceeded!';
			$error = true;
		}
		if(!$error)
		{
			$extension = pathinfo($_FILES['importzipFile']['name'], PATHINFO_EXTENSION);
			
			unlink('../../backups/Import/importWebsite.zip');
			
			if(!in_array(strtolower($extension), $allowed))
			{
				$data[0] = '0';
				$data['msg'] = 'Invalid File Uploaded!';
			}
			else if(move_uploaded_file($_FILES['importzipFile']['tmp_name'], '../../backups/Import/importWebsite.zip'))
			{
				$data[0] = '1';
				$data['msg'] = 'File Uploaded Successfully.';
			}
		}
	}
}
else if(isset($_POST['remoteFilevalidate']) && $_POST['remoteFilevalidate'] == "remoteFilevalidate")
{
	$url = xssClean(mres(trim($_POST['url'])));
	
	$domain = getDomain($url);
	
	$extension = getExtension($url);
	
	if($extension != "zip")
	{
		$data[0] = '0';
		$data['msg'] = 'Invalid Url!';
	}
	else if($domain == $_SERVER['HTTP_HOST'])
	{
		$filename = end(explode('/',$url));
		
		if(isFileExist("../../backups/".$filename,"backups/".$filename))
		{
			$data[0] = '1';
		}
		else
		{
			$data[0] = '0';
			$data['msg'] = 'File does,t Exist!';
		}
	}
	else
	{
		$size = remote_filesize($url);
		
		if($size > 0)
		{
			$data[0] = '1';
		}
		else
		{
			$data[0] = '0';
			$data['msg'] = 'File does,t Exist!';
		}
	}
}
else if(isset($_POST['remoteFileUpload']) && $_POST['remoteFileUpload'] == "remoteFileUpload")
{
	$url = xssClean(mres(trim($_POST['url'])));
	
	$domain = getDomain($url);
	
	$extension = getExtension($url);
	
	if($extension != "zip")
	{
		$data[0] = '0';
		
		$data['msg'] = 'Invalid Url!';
	}
	else
	{	
		unlink('../../backups/Import/importWebsite.zip');
		
		if($domain == $_SERVER['HTTP_HOST'])
		{
			$filename = end(explode('/',$url));
			
			copy('../../backups/'.$filename,'../../backups/Import/importWebsite.zip');
		}
		else
		{
			copy($url,'../../backups/Import/importWebsite.zip');
		}
		
		$data[0] = '1';
		
		$data['msg'] = 'File Uploaded Successfully.';
	}
}
else if(isset($_POST['ImportFile']) && $_POST['ImportFile'] == "ImportFile")
{
	$file = xssClean(mres(trim($_POST['file'])));
	
	$type = xssClean(mres(trim($_POST['type'])));
	
	$users = $_POST['users'];
	
	$rows = mysql_fetch_array(mysql_query("SELECT * FROM `backupSetting` WHERE id='$file'"));
	
	$backupFile = $rows['backupFile'];
	
	$status = $rows['status'];
	
	if($backupFile)
	{
		unlink('../../backups/Import/importWebsite.zip');
		
		$storageSettings = getStorageSettings();
		
		$path = $storageSettings['s3Path'];
		
		$s3Client = new S3Client
		([
			'version'     => 'latest',
			'region'      => $storageSettings['region'],
			'credentials' => [
				'key'    => $storageSettings['appKey'],
				'secret' => $storageSettings['secretKey'],
			],
		]);
		
		$bucket = $storageSettings['bucketName'];
		
		if($status == 1 && $s3Client->doesBucketExist($bucket) && $_SESSION['sb_plugin']['amazonS3'])
			copy($path.'/backups/'.$backupFile,'../../backups/Import/importWebsite.zip');
		else 
			copy_with_rename("../../backups/".$backupFile, "../../backups/Import/importWebsite.zip"); 
		
		$data['ImportFile'] = 1;
	}
	else 
	{
		$data['ImportFile'] = 0;
	} 
}
else if(isset($_POST['unzipBackupFile']) && $_POST['unzipBackupFile'] == "unzipBackupFile")
{
	$zip = new ZipArchive;  
	
	$res = $zip->open('../../backups/Import/importWebsite.zip'); 
	
	delete_directory('../../backups/Restore');
	
	if($res === TRUE) 
	{  
		$zip->extractTo('../../backups/Restore/');  
		
		if(is_dir('../../backups/Restore/Database') && is_dir('../../backups/Restore/images/articlesImages') && is_dir('../../backups/Restore/images/attachments') && is_dir('../../backups/Restore/images/attachmentsImgThumbnails') && is_dir('../../backups/Restore/images/emoticons') && is_dir('../../backups/Restore/images/profileCovers') && is_dir('../../backups/Restore/images/profilePictures') && is_dir('../../backups/Restore/images/slidesImages') && is_dir('../../backups/Restore/images/videosPoster'))
		{ 
			delete_directory('../../images');
			
			$zip->extractTo('../../');	  
			
			delete_directory('../../Database'); 
			
			$data[0] = '1';
		}  
		else
		{
			$data[0] = '0';
		}
		
		$zip->close();
	} 
	else 
	{ 
		$data[0] = '0';
	} 
}
else if(isset($_POST['uploadToAmazon']) && $_POST['uploadToAmazon'] == "uploadToAmazon")
{
	$storageSettings = getStorageSettings();	
	
	$s3Client = new S3Client
	([
		'version'     => 'latest',
		'region'      => $storageSettings['region'],
		'credentials' => [
			'key'    => $storageSettings['appKey'],
			'secret' => $storageSettings['secretKey'],
		],
	]);
	
	$bucket = $storageSettings['bucketName'];
	
	if($s3Client->doesBucketExist($bucket) && $_SESSION['sb_plugin']['amazonS3'])
	{
		$s3Client->deleteMatchingObjects($bucket, 'images');

		$s3Client->uploadDirectory('../../backups/Restore/images', $bucket, 'images', array(
		   'params'      => array('ACL' => 'public-read'),
		   'concurrency' => 100
		)); 
	}
	
	$data[0] = 1;
}
else if(isset($_POST['writeSqlFile']) && $_POST['writeSqlFile'] == "writeSqlFile")
{
	$sql_filename = "../../backups/Restore/Database/Database.sql";
				
	$sql_contents = SplitSQL($sql_filename);
	
	$data[0] = 1;
}

echo json_encode($data);

exit();
?>