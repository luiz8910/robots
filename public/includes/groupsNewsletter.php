<?php
if(!isset($_SESSION)) session_start();

error_reporting(0);

include "../../config/config.php";
	
include "../../includes/functions.php";

include '../../includes/lib/mail.php';

include '../../includes/lib/PHPmailer/PHPMailerAutoload.php';

$data = array();

$error = false;

if(isset($_POST['groupTitle']) && $_POST['groupTitle'] == "groupTitle")
{
	$id = xssClean(mres(trim($_POST['id'])));
	
	$groupName = xssClean(mres(trim($_POST['group'])));
	
	if(existGroup($groupName,$id))
	{
		$data['group'] = 0;
	}
	else
	{
		$data['group'] = 1;
	}
}
else if(isset($_POST['totalUsers']) && $_POST['totalUsers'] == "totalUsers")
{
	$country = $_POST['country'];

	$age = $_POST['age'];
	
	$gender = $_POST['gender'];

	$status = trim($_POST['status']);
	
	$totalUsers = CountCustomMembers($country,$age,$status,$gender);
	
	$data['totalUsers'] = $totalUsers;
}
else if(isset($_POST['addEmails']) && $_POST['addEmails'] == "addEmails")
{
	$i = trim($_POST['i']);
	
	$name = xssClean(mres(trim($_POST['name'])));
	
	$email =  xssClean(mres(trim($_POST['email'])));
	
	if($name == "" && !$error)
		$error = 'Enter First Name!';
		
	if(!validEmail($email) && !$error)
		$error = 'Invalid Email Address!';
		
	if(!$error)
	{
		$data[0] = '1';
		$data['addEmails'] = '<tr id="addRows'.$i.'">
			<td>'.$name.'</td>
			<td>'.$email.'</td>
			<td>
				<a onclick="editRow('.$i.')" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
				<a onclick="deleteRow('.$i.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
			</td>
			<input type="hidden" value="'.$email.'" id="email'.$i.'" name="email'.$i.'">;
			<input type="hidden" value="'.$email.'" name="emails[]">;
			<input type="hidden" value="'.$name.'" id="name'.$i.'" name="name'.$i.'">;
			<input type="hidden" value="'.$i.'" name="total[]">
		</tr>';
		$data['msg'] = 'Email Add Successfully!';
	}
	else
	{
		$data[0] = '0';
		$data['msg'] = $error;
	}
}
else if(isset($_POST['editEmails']) && $_POST['editEmails'] == "editEmails")
{
	$arrayValue = trim($_POST['arrayValue']);
	
	$name =  xssClean(mres(trim($_POST['name'])));
	
	$email =  xssClean(mres(trim($_POST['email'])));
	
	if($name == "" && !$error)
		$error = 'Enter First Name!';
		
	if(!validEmail($email) && !$error)
		$error = 'Invalid Email Address!';
		
	if(!$error)
	{
		$data[0] = '1';
		$data['editEmails'] = '<td>'.$name.'</td>
			<td>'.$email.'</td>
			<td>
				<a onclick="editRow('.$arrayValue.')" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
				<a onclick="deleteRow('.$arrayValue.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
			</td>
			<input type="hidden" value="'.$email.'" id="email'.$arrayValue.'" name="email'.$arrayValue.'">;
			<input type="hidden" value="'.$email.'" name="emails[]">;
			<input type="hidden" value="'.$name.'" id="name'.$arrayValue.'" name="name'.$arrayValue.'">;
			<input type="hidden" value="'.$arrayValue.'" name="total[]">';
		$data['msg'] = 'Email Updated Successfully!';
	}
	else
	{
		$data[0] = '0';
		$data['msg'] = $error;
	}
}
else if(isset($_POST['fetchGroup']) && $_POST['fetchGroup'] == "fetchGroup")
{
	$dt = new DateTime();
	
	$date = $dt->format('Y-m-d H:i:s');
	
	$type = trim($_POST['type']);
	
	$groupId =  xssClean(mres(trim($_POST['group'])));
	
	$title =  xssClean(mres(trim($_POST['title'])));
	
	$content =  xssClean(mres(trim($_POST['content'])));
	
	if($title == "" && !$error)
		$error = 'Enter First Newletter Title!';
		
	if($content == "" && !$error)
		$error = 'Enter First Newletter Content!';
		
	if(!$error)
	{		
		if($type == "groupUsers")
		{
			$group = mysql_fetch_array(mysql_query("SELECT * FROM NewsletterGroups WHERE id='$groupId'"));
			
			$groupName = $group['groupName'];
			
			$country = $group['countryCode'];
			
			$gender = $group['gender'];
			
			$age = $group['age'];
			
			$status = $group['status'];
			
			mysql_query("INSERT INTO sendNewsletters(`title`,`content`,`groupName`,`type`,`countryCode`,`gender`,`age`,`status`,`date`,`gid`) VALUES('$title','$content','$groupName','0','$country','$gender','$age','$status','$date','$groupId')") or die(mysql_error());
		}
		else
		{
			$countryArray = $_POST['country'];
			
			$genderArray = $_POST['gender'];

			$ageArray = $_POST['age'];
			
			foreach ($countryArray as $results1) { 
				$country .= $results1.',';
			}
			
			foreach ($genderArray as $results2) { 
				$gender .= $results2.',';
			}
			
			foreach ($ageArray as $results3) { 
				$age .= $results3.',';
			}
			
			$status = trim($_POST['status']);
			
			mysql_query("INSERT INTO sendNewsletters(`title`,`content`,`groupName`,`type`,`countryCode`,`gender`,`age`,`status`,`date`,`gid`) VALUES('$title','$content','','1','$country','$gender','$age','$status','$date','$groupId')") or die(mysql_error());
		}

		$countryArray=explode(",",$country);
			
		$genderArray=explode(",",$gender);
		
		$ageArray=explode(",",$age);
		
		$FilterQuery = FilterGroup($countryArray,$ageArray,$status,$genderArray);
			
		$Users = mysql_query($FilterQuery);
		
		$countUser = mysql_num_rows($Users);
		
		$i = 0;
		
		$data[0] = '1';
		
		if($type == "groupUsers")
		{
			$groupCustomUser = mysql_query("SELECT * FROM groupcustomEmails WHERE gid='$groupId'");
			
			$countGroupCustomUser = mysql_num_rows($groupCustomUser);
		}
		else
		{
			$countGroupCustomUser = 0;
		}
		
		$data['count'] = $countUser+$countGroupCustomUser;
		
		while($rows = mysql_fetch_array($Users))
		{
			$data['id'.$i] = $rows['id'];
			$data['userType'.$i] = '0';
			$i++;
		}
		if($type == "groupUsers")
		{
			while($results = mysql_fetch_array($groupCustomUser))
			{
				$data['id'.$i] = $results['id'];
				$data['userType'.$i] = '1';
				$i++;
			}
		}
	}
	else
	{
		$data[0] = '0';
		$data['msg'] = $error;
	}
}
else if(isset($_POST['sendNewsletter']) && $_POST['sendNewsletter'] == "sendNewsletter")
{
	$id = trim($_POST['id']);
	
	$userType = trim($_POST['userType']);
	
	$title =  xssClean(mres(trim($_POST['title'])));
	
	$content =  trim($_POST['content']);
	
	if($userType == 0)
	{
		$userInfo = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$id'"));
		
		$username = $userInfo['profileUsername'];
		
		$to = $userInfo['email'];
	}
	else if($userType == 1)
	{
		$userInfo = mysql_fetch_array(mysql_query("SELECT * FROM groupcustomEmails WHERE id='$id'"));
		
		$username = $userInfo['username'];
		
		$to = $userInfo['email'];
	}
	
	$websiteName = websiteTitle();
	
	$content = EmailContentReplace($username,'','','','','','','','','','','','','','','','','',$websiteName,'','',$content,'','','','','','');
	
	if(newsletterEmailType() == 0)
		SendNewsletterBYMail($title,$content,$username,$to,$websiteName);
	else
		SendNewsletterBYSMTP($title,$content,$username,$to,$websiteName);
	
	$data[0] = $username;
}
else if(isset($_POST['groupUsers']) && $_POST['groupUsers'] == "groupUsers")
{
	$groupId = trim($_POST['group']);
	
	$groupUsers = CountGroupMembers($groupId);
	
	$data['groupUsers'] = $groupUsers;
}
else if(isset($_POST['editNewsletter']) && $_POST['editNewsletter'] == "editNewsletter")
{
	$dt = new DateTime();
	
	$date = $dt->format('Y-m-d H:i:s');
	
	$id = trim($_POST['id']);
	
	$type = trim($_POST['type']);
	
	$groupId = xssClean(mres(trim($_POST['group'])));
	
	$title = xssClean(mres(trim($_POST['title'])));
	
	$content = xssClean(mres(trim($_POST['content'])));
	
	if($title == "" && !$error)
		$error = 'Enter First Newletter Title!';
		
	if($content == "" && !$error)
		$error = 'Enter First Newletter Content!';
		
	if(!$error)
	{		
		if($type == "groupUsers")
		{
			$group = mysql_fetch_array(mysql_query("SELECT * FROM NewsletterGroups WHERE id='$groupId'"));
			
			$groupName = $group['groupName'];
			
			$country = $group['countryCode'];
			
			$gender = $group['gender'];
			
			$age = $group['age'];
			
			$status = $group['status'];
			
			mysql_query("UPDATE `sendNewsletters` SET `title`='$title',`groupName`='$groupName',`type`='0',`countryCode`='$country',`gender`='$gender',`age`='$age',`status`='$status',`date`='$date',`gid`='$groupId' WHERE `id`='$id'") or die(mysql_error());
		}
		else
		{
			$countryArray = $_POST['country'];
			
			$genderArray = $_POST['gender'];

			$ageArray = $_POST['age'];
			
			foreach ($countryArray as $results1) { 
				$country .= $results1.',';
			}
			
			foreach ($genderArray as $results2) { 
				$gender .= $results2.',';
			}
			
			foreach ($ageArray as $results3) { 
				$age .= $results3.',';
			}
			
			$status = trim($_POST['status']);
			
			mysql_query("UPDATE `sendNewsletters` SET `title`='$title',`groupName`='',`type`='1',`countryCode`='$country',`gender`='$gender',`age`='$age',`status`='$status',`date`='$date',`gid`='$groupId' WHERE `id`='$id'") or die(mysql_error());
		}
		
		$countryArray=explode(",",$country);
			
		$genderArray=explode(",",$gender);
		
		$ageArray=explode(",",$age);
		
		$FilterQuery = FilterGroup($countryArray,$ageArray,$status,$genderArray);
			
		$Users = mysql_query($FilterQuery);
		
		$countUser = mysql_num_rows($Users);
		
		$i = 0;
		
		$data[0] = '1';
		
		if($type == "groupUsers")
		{
			$groupCustomUser = mysql_query("SELECT * FROM groupcustomEmails WHERE gid='$groupId'");
			
			$countGroupCustomUser = mysql_num_rows($groupCustomUser);
		}
		else
		{
			$countGroupCustomUser = 0;
		}
		
		$data['count'] = $countUser+$countGroupCustomUser;
		
		while($rows = mysql_fetch_array($Users))
		{
			$data['id'.$i] = $rows['id'];
			$data['userType'.$i] = '0';
			$i++;
		}
		if($type == "groupUsers")
		{
			while($results = mysql_fetch_array($groupCustomUser))
			{
				$data['id'.$i] = $results['id'];
				$data['userType'.$i] = '1';
				$i++;
			}
		}
	}
	else
	{
		$data[0] = '0';
		$data['msg'] = $error;
	}
}

echo json_encode($data);

exit(); 
?>