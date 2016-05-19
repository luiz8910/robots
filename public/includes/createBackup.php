<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";

include "../../includes/lib/aws/aws-autoloader.php";

use Aws\S3\S3Client;
	
include "../../includes/functions.php";

$data = array();

$error = false;

if(isset($_POST['downloadDatabase']) && $_POST['downloadDatabase'] == "downloadDatabase")
{
	$filename = 'Database.sql';
	
	$path = '../../backups/Database/'.$filename;
	
	backup_Database($path,'*');
	
	$data['createBackup'] = 1;
}
else if(isset($_POST['downloadAmazon']) && $_POST['downloadAmazon'] == "downloadAmazon")
{
	delete_directory('../../backups/downloadBucket/images');
	
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
	
	if($storageSettings['getFiles'] == 1 && $s3Client->doesBucketExist($bucket) && $_SESSION['sb_plugin']['amazonS3'])
	{	
		$s3Client->registerStreamWrapper();
		
		$s3Client->downloadBucket('../../backups/downloadBucket/images/', $bucket, 'images', array(
			'concurrency' => 100
		));	
	}
	
	$data['status'] = 1;	
}
else if(isset($_POST['generateZipFile']) && $_POST['generateZipFile'] == "generateZipFile")
{
	include "FlxZipArchive.php";
	
	$storageSettings = getStorageSettings();
	
	$filename = time().'.zip';
		
	$zip_file_name = '../../backups/'.$filename;
	
	$za = new FlxZipArchive;
		
	$res = $za->open($zip_file_name, ZipArchive::CREATE);
	
	if($res === TRUE) 
	{
		$Databasepath = '../../backups/Database';
		
		if($storageSettings['getFiles'] == 1)
			$Images_folder = '../../backups/downloadBucket/images';
		else
			$Images_folder = '../../images';
		
		$za->addImagesDir($Images_folder, 'images');
		
		$za->addDatabaseDir($Databasepath,'Database');
		
		$data['filename'] = $filename;
		
		$data['status'] = 1;
		
		$za->close();
	}
	else
	{
		$data['filename'] = $filename;
		
		$data['status'] = 0;
	}
}
else if(isset($_POST['saveWebsiteBackup']) && $_POST['saveWebsiteBackup'] == "saveWebsiteBackup")
{
	$date = FetchDateTimeByZone();
	
	$filename = xssClean(mres(trim($_POST['filename'])));
	
	$storageSettings = getStorageSettings();
	
	$status = $storageSettings['status'];
	
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
	
	mysql_query("INSERT INTO backupSetting(`backupFile`,`date`,`status`) VALUES('$filename','$date','$status')") or die(mysql_error());
	
	if(($storageSettings['status'] == 1 || $storageSettings['status'] == 2) && $s3Client->doesBucketExist($bucket) && $_SESSION['sb_plugin']['amazonS3'])
	{
		$result = $s3Client->putObject(array(
			'Bucket'     => $bucket,
			'Key'        => 'backups/'.$filename,
			'SourceFile' => '../../backups/'.$filename,
			'ACL'    => 'public-read'
		));
		
		if($storageSettings['status'] == 1)
		{
			unlink('../../backups/'.$filename);
		}
	}
	
	$data['status'] = 1;
}

echo json_encode($data);

exit();  
?>