<?php
if(!isset($_SESSION)) session_start();
error_reporting(0);
include "../../config/config.php";
include "../../includes/functions.php";
@ini_set('error_reporting', E_ALL & ~ E_NOTICE);
@apache_setenv('no-gzip', 1);
@ini_set('zlib.output_compression', 'Off'); 
if((!isset($_SESSION['3911a0305ed7f7c9da7204da055f48de']) && $_SESSION['3911a0305ed7f7c9da7204da055f48de']!='adminUSERname') || (!isset($_SESSION['a97a5b9b132dde6f4b50c255d900d9f6']) && $_SESSION['a97a5b9b132dde6f4b50c255d900d9f6']!='adminSession'))
{
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: " . rootpath());
	exit();
}
else if(isset($_GET['fn'])) 
{
	$type=trim($_GET['type']);
	$status=trim($_GET['status']);
	$token=trim($_GET['fn']);
	$token = trim(str_replace(' ', '+', $token));
	while(strpos($token,'-') !== false)
		$token = str_replace('-','.',$token);
	$fileName=fileEncryptDecrypt('decrypt',$token);
	if($status == 0 || $status == 2)
	{
		if($type == 0)
			$file_dir="../../backups/";
		else if($type == 1)
			$file_dir="../../backups/ArticleBackup/";
			
		$file_size=filesize($file_dir.$fileName);
	}
	else
	{ 
		$storageSettings = getStorageSettings();
		if($type == 0)
			$file_dir=$storageSettings['s3Path']."/backups/";
		else if($type == 1)
			$file_dir=$storageSettings['s3Path']."/backups/ArticleBackup/";
			
		$file_size=remote_filesize($file_dir.$fileName);
	}
	$file_path  = $file_dir.$fileName;
	$path_parts = pathinfo($file_path);
	$file_name  = $path_parts['basename'];
	$file_ext   = $path_parts['extension'];
	$is_attachment = isset($_REQUEST['stream']) ? false : true;
	$file = @fopen($file_path,"rb");
	if ($file)
	{
		header("Pragma: public");
		header("Expires: -1");
		header("Cache-Control: public, must-revalidate, post-check=0, pre-check=0");
		header("Content-Disposition: attachment; filename=\"$file_name\"");
		if ($is_attachment) {
				header("Content-Disposition: attachment; filename=\"$file_name\"");
		}
		else {
				header('Content-Disposition: inline;');
				header('Content-Transfer-Encoding: binary');
		}
		$ctype_default = "application/octet-stream";
		$content_types = array(
				"exe" => "application/octet-stream",
				"zip" => "application/zip",
				"mp3" => "audio/mpeg",
				"mpg" => "video/mpeg",
				"avi" => "video/x-msvideo",
		);
		$ctype = isset($content_types[$file_ext]) ? $content_types[$file_ext] : $ctype_default;
		header("Content-Type: " . $ctype);
		if(isset($_SERVER['HTTP_RANGE']))
		{
			list($size_unit, $range_orig) = explode('=', $_SERVER['HTTP_RANGE'], 2);
			if ($size_unit == 'bytes')
			{
				list($range, $extra_ranges) = explode(',', $range_orig, 2);
			}
			else
			{
				$range = '';
				header('HTTP/1.1 416 Requested Range Not Satisfiable');
				exit;
			}
		}
		else
		{
			$range = '';
		}
		list($seek_start, $seek_end) = explode('-', $range, 2);
		$seek_end   = (empty($seek_end)) ? ($file_size - 1) : min(abs(intval($seek_end)),($file_size - 1));
		$seek_start = (empty($seek_start) || $seek_end < abs(intval($seek_start))) ? 0 : max(abs(intval($seek_start)),0);
		if ($seek_start > 0 || $seek_end < ($file_size - 1))
		{
			header('HTTP/1.1 206 Partial Content');
			header('Content-Range: bytes '.$seek_start.'-'.$seek_end.'/'.$file_size);
			header('Content-Length: '.($seek_end - $seek_start + 1));
		}
		else
		  header("Content-Length: $file_size");

		header('Accept-Ranges: bytes');
		set_time_limit(0);
		fseek($file, $seek_start);
		while(!feof($file)) 
		{
			print(@fread($file, 1024*8));
			ob_flush();
			flush();
			if (connection_status()!=0) 
			{
				@fclose($file);
				exit;
			}			
		}
		@fclose($file);
		exit;
	}
	else 
	{
		header("HTTP/1.0 500 Internal Server Error");
		exit;
	}  
}
?>