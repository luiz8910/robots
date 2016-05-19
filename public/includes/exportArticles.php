<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";

include "../../includes/lib/aws/aws-autoloader.php";

use Aws\S3\S3Client;
	
include "../../includes/functions.php";

set_time_limit(200);

$data = array();

$error = false;

function CreateFileSavingDirectories()
{
	delete_directory('images');
	mkdir("images");
	mkdir("images/articlesImages");
	mkdir("images/articlesImages/thumb1");
	mkdir("images/articlesImages/thumb2");
	mkdir("images/articlesImages/thumb3");
	mkdir("images/articlesImages/thumb4");
	mkdir("images/articlesImages/thumb5");
	mkdir("images/articlesImages/thumb6");
	mkdir("images/articlesImages/thumb7");
	mkdir("images/articlesImages/thumb8");
	mkdir("images/articlesImages/thumb9");
	mkdir("images/articlesImages/thumb10"); 
}
if(isset($_POST['ArticlesBackupTitle']) && $_POST['ArticlesBackupTitle'] == "ArticlesBackupTitle")
{
	$title = xssClean(mres(trim($_POST['title'])));
	
	$numRows = mysql_num_rows(mysql_query("SELECT * FROM `ExportArticles` WHERE `title`='$title'"));
	
	if($numRows > 0)
	{
		$data['0'] = 0;
	}
	
}
else if(isset($_POST['DownloadDatebase']) && $_POST['DownloadDatebase'] == "DownloadDatebase")
{
	$title = xssClean(mres(trim($_POST['title'])));
	
	$numRows = mysql_num_rows(mysql_query("SELECT * FROM `ExportArticles` WHERE `title`='$title'"));
	
	if($numRows > 0)
	{
		$data['ExportArticles'] = 0;
	}
	else
	{
		$type = trim($_POST['type']);
		
		$array = $_POST['array'];
		
		if($type == 'custom')
			$query = ExecuteExportArticleQuery($array);
		else if($type == 'complete')
			$query = '';
		
		$filename = 'Database.sql';
		
		$path = '../../backups/ArticleBackup/Database/'.$filename;
		
		$putTitleInFile = '../../backups/ArticleBackup/Database/Title.txt';
		
		ExportArticlesTable($path,$query);
		
		PutTitleOFExportArticles($putTitleInFile, $title);
		
		CreateFileSavingDirectories();
		
		$data['ExportArticles'] = 1;
	}
}
else if(isset($_POST['FetchArticlesId']) && $_POST['FetchArticlesId'] == 'FetchArticlesId')
{
	$showresult = mysql_query("SELECT id from articles") or die(mysql_error());
	while($row = mysql_fetch_array($showresult)) 
	$data[] = $row['id']; 
}
else if(isset($_POST['ExportArticlesToLocal']) && $_POST['ExportArticlesToLocal'] == "ExportArticlesToLocal")
{
	$id = xssClean(mres(trim($_POST['id'])));
	
	$row = mysql_fetch_array(mysql_query("SELECT * FROM articles WHERE id = '$id'")) or die(mysql_error());
	
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
	
	if($storageSettings['getFiles'] == 1 && $s3Client->doesBucketExist($bucket) && $_SESSION['sb_plugin']['amazonS3'])
	{
		copy($path.'/images/articlesImages/'.$row['image'],'images/articlesImages/'.$row['image']);
		copy($path.'/images/articlesImages/thumb1/'.$row['image'],'images/articlesImages/thumb1/'.$row['image']);
		copy($path.'/images/articlesImages/thumb2/'.$row['image'],'images/articlesImages/thumb2/'.$row['image']);
		copy($path.'/images/articlesImages/thumb3/'.$row['image'],'images/articlesImages/thumb3/'.$row['image']);
		copy($path.'/images/articlesImages/thumb4/'.$row['image'],'images/articlesImages/thumb4/'.$row['image']);
		copy($path.'/images/articlesImages/thumb5/'.$row['image'],'images/articlesImages/thumb5/'.$row['image']);
		copy($path.'/images/articlesImages/thumb6/'.$row['image'],'images/articlesImages/thumb6/'.$row['image']);
		copy($path.'/images/articlesImages/thumb7/'.$row['image'],'images/articlesImages/thumb7/'.$row['image']);
		copy($path.'/images/articlesImages/thumb8/'.$row['image'],'images/articlesImages/thumb8/'.$row['image']);
		copy($path.'/images/articlesImages/thumb9/'.$row['image'],'images/articlesImages/thumb9/'.$row['image']);
		copy($path.'/images/articlesImages/thumb10/'.$row['image'],'images/articlesImages/thumb10/'.$row['image']);
	}
}
else if(isset($_POST['zipExportArticles']) && $_POST['zipExportArticles'] == "zipExportArticles")
{
	$title = xssClean(mres(trim($_POST['title'])));
	
	if($title != "")
	{
		$type = trim($_POST['type']);
		
		$filename = time().'.zip';
		
		$array = $_POST['array'];
		
		if($type == 'custom')
			$query = ExecuteExportArticleQuery($array);
		else if($type == 'complete')
			$query = '';
			
		$result = mysql_query('SELECT * FROM articles'.$query) or die(mysql_error());
			
		$ziparticleArray = array();
		
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
			while($row = mysql_fetch_array($result))
			{		
				$ziparticleArray[] = 'images/articlesImages/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb1/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb2/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb3/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb4/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb5/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb6/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb7/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb8/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb9/'.$row['image'];
				$ziparticleArray[] = 'images/articlesImages/thumb10/'.$row['image']; 
			} 
		}
		else
		{
			while($row = mysql_fetch_array($result))
			{
				$ziparticleArray[] = '../../images/articlesImages/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb1/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb2/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb3/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb4/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb5/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb6/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb7/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb8/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb9/'.$row['image'];
				$ziparticleArray[] = '../../images/articlesImages/thumb10/'.$row['image'];
			} 
		}
		
		$ziparticleArray[] = '../../backups/ArticleBackup/Database/Database.sql';
			
		$ziparticleArray[] = '../../backups/ArticleBackup/Database/Title.txt';
		
		$zip_file_name = '../../backups/ArticleBackup/'.$filename;

		$result = zipExportArticles($ziparticleArray,$zip_file_name);  
		
		$data['filename'] = $filename; 
		
		$data['zipExportArticles'] = 1; 
	}
	else
	{
		$data['zipExportArticles'] = 0;
	}
}
else if(isset($_POST['uploadArticlesToAmazonS3']) && $_POST['uploadArticlesToAmazonS3'] == "uploadArticlesToAmazonS3")
{
	$filename = xssClean(mres(trim($_POST['filename'])));
	
	$title = xssClean(mres(trim($_POST['title'])));
	
	$date = FetchDateTimeByZone();
	
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
	
	if(($storageSettings['status'] == 1 || $storageSettings['status'] == 2) && $s3Client->doesBucketExist($bucket) && $_SESSION['sb_plugin']['amazonS3'])
	{	
		mysql_query("INSERT INTO ExportArticles(`backupFile`,`title`,`date`,`status`) VALUES('$filename','$title','$date','$status')") or die(mysql_error());
		
		$result = $s3Client->putObject(array(
			'Bucket'     => $bucket,
			'Key'        => 'backups/ArticleBackup/'.$filename,
			'SourceFile' => '../../backups/ArticleBackup/'.$filename,
			'ACL'    => 'public-read'
		));
		
		if($storageSettings['status'] == 1)
		{
			unlink('../../backups/ArticleBackup/'.$filename);
		}
	}
	else if($storageSettings['status'] == 0)
	{
		mysql_query("INSERT INTO ExportArticles(`backupFile`,`title`,`date`,`status`) VALUES('$filename','$title','$date','$status')") or die(mysql_error());
	}

	$data['uploadArticlesToAmazonS3'] = 1; 
}
echo json_encode($data);

exit();  
?>