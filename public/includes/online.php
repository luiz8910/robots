<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";
	
include "../../includes/functions.php";

// We don't want web bots scewing our stats:
if(is_bot()) die();
$stringIp = getRealUserIp();
$isOnline = xssClean(mres(trim($_POST['isOnline'])));
$longIp = ip2long($stringIp);
$inDB = mysql_query("SELECT * FROM tz_who_is_online WHERE online='$isOnline'");
if(!mysql_num_rows($inDB))
{	
	$details = ip_details($stringIp); 
	$countryName = $details['country_name'];
	$countryAbbrev = $details['country_code'];	
	if($countryAbbrev != "")
	{
		mysql_query("INSERT INTO tz_who_is_online (online,country,countrycode,visitorsIp,dt) VALUES('$isOnline','$countryName','$countryAbbrev','$longIp',NOW())") or die(mysql_error());
	}
}
else
{
	mysql_query("UPDATE tz_who_is_online SET dt=NOW() WHERE online='$isOnline'");
}
?>