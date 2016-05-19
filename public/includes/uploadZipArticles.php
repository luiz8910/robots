<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";

include "../../includes/lib/aws/aws-autoloader.php";

use Aws\S3\S3Client;
	
include "../../includes/functions.php";

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
			
			unlink('../../backups/Import/importArticles.zip');
			
			if(!in_array(strtolower($extension), $allowed))
			{
				$data[0] = '0';
				$data['msg'] = 'Invalid File Uploaded!';
			}
			else if(move_uploaded_file($_FILES['importzipFile']['tmp_name'], '../../backups/Import/importArticles.zip'))
			{
				$data[0] = '1';
				$data['msg'] = 'File Uploaded Successfully.';
			}
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
		unlink('../../backups/Import/importArticles.zip');
		
		if($domain == $_SERVER['HTTP_HOST'])
		{
			$filename = end(explode('/',$url));
			
			copy('../../backups/ArticleBackup/'.$filename,'../../backups/Import/importArticles.zip');
		}
		else
		{
			copy($url,'../../backups/Import/importArticles.zip');
		}
		
		$data[0] = '1';
		
		$data['msg'] = 'File Uploaded Successfully.';
	}
}
else if(isset($_POST['ImportFile']) && $_POST['ImportFile'] == "ImportFile")
{
	$category = xssClean(mres(trim($_POST['category'])));
	
	$file = xssClean(mres(trim($_POST['file'])));
	
	$type = trim($_POST['type']);
	
	$users = $_POST['users'];
	
	$rows = mysql_fetch_array(mysql_query("SELECT * FROM `ExportArticles` WHERE id='$file'"));
	
	$backupFile = $rows['backupFile'];
	
	$status = $rows['status'];
	
	if($backupFile)
	{
		unlink('../../backups/Import/importArticles.zip');
		
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
			copy($path.'/backups/ArticleBackup/'.$backupFile,'../../backups/Import/importArticles.zip'); 
		else 
			copy_with_rename("../../backups/ArticleBackup/".$backupFile, "../../backups/Import/importArticles.zip"); 
		
		$data['ImportFile'] = 1;
	}
	else 
	{
		$data['ImportFile'] = 0;
	}
}
else if(isset($_POST['unzipImportFile']) && $_POST['unzipImportFile'] == "unzipImportFile")
{
	delete_directory('../../backups/Import/unzipImport');
	
	$zip = new ZipArchive;  
	
	$res = $zip->open('../../backups/Import/importArticles.zip');  
	
	if($res === TRUE) 
	{  
		$zip->extractTo('../../backups/Import/unzipImport/');

		if(is_dir('../../backups/Import/unzipImport/backups/ArticleBackup/Database') && is_dir('../../backups/Import/unzipImport/images'))
		{
			$sql_filename = "../../backups/Import/unzipImport/backups/ArticleBackup/Database/Database.sql";
			
			$sql_contents = SplitSQL($sql_filename);
			
			$data['title'] = file_get_contents("../../backups/Import/unzipImport/backups/ArticleBackup/Database/Title.txt");
			
			$data['unzipImportFile'] = 1;
		}
		else
		{
			$data['unzipImportFile'] = 0;
		}
		$zip->close();  
	} 
	else 
	{ 
		$data['unzipImportFile'] = 0;
	} 
}
else if(isset($_POST['ArticlesImportToUsers']) && $_POST['ArticlesImportToUsers'] == "ArticlesImportToUsers")
{
	$user = xssClean(mres(trim($_POST['user'])));
	
	$category = xssClean(mres(trim($_POST['category'])));
	
	$date = FetchDateTimeByZone();
	
	$result = mysql_query('SELECT * FROM ImportArticles') or die(mysql_error());

	while($row = mysql_fetch_array($result))
	{	
		$newFileName = $user.$row['image'];
		
		importArticlesToUser($row,$newFileName,$user,$category,$date);		
	} 
	
	$data['user'] = $date;
	
	$data['ArticlesImportToUsers'] = 1;
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
		
		if(isFileExist("../../backups/ArticleBackup/".$filename,"backups/ArticleBackup/".$filename))
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

echo json_encode($data);

exit();
?>