<?php 
class FlxZipArchive extends ZipArchive {
	public function addImagesDir($location, $name) 
	{
		$this->addEmptyDir($name);
		$this->addImagesDirDo($location, $name);
	} 
	public function addDatabaseDir($Databasepath ,$dbName) 
	{
		$this->addEmptyDir($dbName);
		$this->addDatabaseDirDo($Databasepath ,$dbName);
	} 
	private function addImagesDirDo($location, $name) 
	{
		$name .= '/';
		$location .= '/';
		$dir = opendir ($location);
		while ($file = readdir($dir))
		{
			if ($file == '.' || $file == '..') continue;
			$do = (filetype( $location . $file) == 'dir') ? 'addImagesDir' : 'addFile';
			$this->$do($location . $file, $name . $file);
		} 
	}
	private function addDatabaseDirDo($Databasepath ,$dbName) 
	{
		$dbName .= '/';
		$Databasepath .= '/';
		$dir = opendir ($Databasepath);
		while ($file = readdir($dir))
		{
			if ($file == '.' || $file == '..') continue;
			$do = (filetype( $Databasepath . $file) == 'dir') ? 'addDatabaseDir' : 'addFile';
			$this->$do($Databasepath . $file, $dbName . $file);
		} 
	}	
}
?>