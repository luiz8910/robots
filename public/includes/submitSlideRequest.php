<?php
include '../../config/config.php';
include '../../includes/lib/verbalExpressions.php';
include '../../includes/functions.php';
$plugin=plugins();
//All Slides Data
$pid   = trim($_POST['pid']);
$keys   = array_values($_POST['id']);
$slFileName = array_values($_POST['sFile']);
$slPollFileName = array_values($_POST['sPollFile']);
$slTitle  = array_values($_POST['sTitle']);
$slAudioUrl  = array_values($_POST['sAudioUrl']);
$slVideoUrl  = array_values($_POST['sVideoUrl']);
$slEmbedUrl  = array_values($_POST['sEmbedUrl']);
$slMapUrl  = array_values($_POST['sMapUrl']);
$slIframeUrl  = array_values($_POST['sIframeUrl']);
$slPollOptions  = array_values($_POST['sPollOptions']);
$slDescription = array_values($_POST['sDescription']);
$slType = array_values($_POST['sType']);
//Quiz Data
//Quiz Results
$slQuizResultTitle  = array_values($_POST['sQuizResultTitle']);
$slQuizResultDescription  = array_values($_POST['sQuizResultDescription']);
$slQuizResultFileName  = array_values($_POST['sQuizResultFile']);
//Quiz Questions And Answers
$slQuizQuestion  = array_values($_POST['sQuizQuestion']);
$slQuizQuestionFileName = array_values($_POST['sQuizQuestionFile']);
$slQuizAnswersDescription = array_values($_POST['sQuizAnswersDescription']);
//Answer images
$slQuizAnswerFileName = array_values($_POST['sQuizAnswerFile']);
//Dropdown
$slQuizAnswerResult = array_values($_POST['sQuizAnswerResult']);
$result = array();
foreach ($keys as $id => $key)
{
	$key=str_replace('/','',$key);
	$result[$key] = array('sFileName'  => $slFileName[$id],'sTitle'  => $slTitle[$id],'sVideoUrl' => $slVideoUrl[$id],'sAudioUrl' => $slAudioUrl[$id],'sEmbedUrl' => $slEmbedUrl[$id],'sMapUrl' => $slMapUrl[$id],'sIframeUrl' => $slIframeUrl[$id],'sPollOptions' => $slPollOptions[$id],'sPollFileName'  => $slPollFileName[$id],'sDescription' => $slDescription[$id],'sType' => $slType[$id],'sQuizResultTitle' =>$slQuizResultTitle[$id],'sQuizResultDescription' =>$slQuizResultDescription[$id],'sQuizResultFileName' =>$slQuizResultFileName[$id],'sQuizQuestion' =>$slQuizQuestion[$id],'sQuizQuestionFileName' =>$slQuizQuestionFileName[$id],'sQuizAnswersDescription' =>$slQuizAnswersDescription[$id],'sQuizAnswerFileName' =>$slQuizAnswerFileName[$id],'sQuizAnswersResult' => $slQuizAnswerResult[$id]);
	if(strlen(trim($result[$key]['sTitle'])) < 10)
	{
		$errorMsg='Title minimum length should be 10 chars';
		$error=true;
		error($errorMsg);
	}
	if($result[$key]['sType']==1 && $result[$key]['sFileName']=="")
	{
		$errorMsg='Empty or invalid image dimensions';
		$error=true;
		error($errorMsg);
	}
	if($result[$key]['sType']==2 && !validYoutubeVideoUrl($result[$key]['sVideoUrl']) && !validVimeoVideoUrl($result[$key]['sVideoUrl']) && !validDailymotionVideoUrl($result[$key]['sVideoUrl']) && !validVineVideoUrl($result[$key]['sVideoUrl']) && !validInstagramVideoUrl($result[$key]['sVideoUrl']) && !validFacebookVideoUrl($result[$key]['sVideoUrl']))
	{
		$errorMsg='Invalid video url';
		$error=true;
		error($errorMsg);
	}
	else if($result[$key]['sType']==3 && !validMixcloudUrl($result[$key]['sAudioUrl']) && !validSoundcloudUrl($result[$key]['sAudioUrl']) && !validReverbnationUrl($result[$key]['sAudioUrl']))
	{
		$errorMsg='Invalid audio url';
		$error=true;
		error($errorMsg);
	}
	else if($result[$key]['sType']==4 && !validFacebookPostUrl($result[$key]['sEmbedUrl']) && !validTwitterPostUrl($result[$key]['sEmbedUrl'])  && !validGooglePostUrl($result[$key]['sEmbedUrl']) && !validPinterestPostUrl($result[$key]['sEmbedUrl']) && !validInstagramPostUrl($result[$key]['sEmbedUrl']) && !validFlickerPostUrl($result[$key]['sEmbedUrl']) && !validImgurPostUrl($result[$key]['sEmbedUrl']) && !validTwitchPostUrl($result[$key]['sEmbedUrl']) && !validDeviantartPostUrl($result[$key]['sEmbedUrl']))
	{
		$errorMsg='Invalid embed url';
		$error=true;
		error($errorMsg);
	}
	else if($result[$key]['sType']==5 && !validGoogleMapUrl($result[$key]['sMapUrl']) && !validBingMapUrl($result[$key]['sMapUrl']))
	{
		$errorMsg='Invalid map url';
		$error=true;
		error($errorMsg);
	}
	else if($result[$key]['sType']==6 && (substr_count($result[$key]['sIframeUrl'],'<iframe')==0 || substr_count($result[$key]['sIframeUrl'],'src=')==0 || substr_count($result[$key]['sIframeUrl'],'</iframe>')==0))
	{
		$errorMsg='Invalid iframe';
		$error=true;
		error($errorMsg);
	}
	else if($result[$key]['sType']==7)
	{
		if($result[$key]['sPollFileName']=="")
		{
			$errorMsg='Empty or invalid poll image dimensions';
			$error=true;
			error($errorMsg);
		}
		$hasOptions=count($result[$key]['sPollOptions']);
		if($hasOptions < 2)
		{
			$errorMsg='Poll minimum 2 options required';
			$error=true;
			error($errorMsg);
		}
		$pollOptionArray=array_values($result[$key]['sPollOptions']);
		$optionNumber=1;
		foreach($pollOptionArray as $option)
		{
			if(strlen($option) < 3)
			{
				$errorMsg='Poll option#'.$optionNumber.' minimum length should be 3 chars';
				$error=true;
				error($errorMsg);
			}
			$optionNumber++;
		}
	}
	else if($result[$key]['sType']==8)
	{
		//Questions validation
		$hasQuestions=count($result[$key]['sQuizQuestion']);
		if($hasQuestions < 1)
		{
			$errorMsg='Minimum 1 question required';
			$error=true;
			error($errorMsg);
		}
		//Answers validation minimum two options required
		$questionFileNamesArray=array_values($result[$key]['sQuizQuestionFileName']);
		$questionNumber=1;
		for($q=0; $q<$hasQuestions; $q++)
		{
			if($questionFileNamesArray[$q][0]=="")
			{
				$errorMsg='Q#'.$questionNumber.' Empty or invalid question image dimensions';
				$error=true;
				error($errorMsg);
			}
			$quizAnswerResultArray=array_values($result[$key]['sQuizAnswersResult']);
			$quizAnswerFileNameArray=array_values($result[$key]['sQuizAnswerFileName']);
			$hasOptions=count($quizAnswerResultArray[$q]);
			if($hasOptions >= 2)
			{
				$quizAnsResultArray=array_values($quizAnswerResultArray[$q]);
				$quizAnsFileNameArray=array_values($quizAnswerFileNameArray[$q]);
				$answerNumber=1;
				for($opt=0; $opt < count($quizAnsResultArray); $opt++)
				{
					if($quizAnsResultArray[$opt]=="")
					{
						$errorMsg='Q#'.$questionNumber .'Answer'.'#'.$answerNumber.' result required';
						$error=true;
						error($errorMsg);
					}
					if($quizAnsFileNameArray[$opt]=="")
					{
						$errorMsg='Q#'.$questionNumber .'Answer'.'#'.$answerNumber.' Empty or invalid image dimensions';
						$error=true;
						error($errorMsg);
					}
					$answerNumber++;
				}
			}
			else
			{
				$errorMsg='Q#'.$questionNumber.' minimum 2 answers required';
				$error=true;
				error($errorMsg);
			}
			$questionNumber++;
		}
		//Results validation minimum 2 results required
		$hasResults=count($result[$key]['sQuizResultTitle']);
		$quizResultTitleArray=array_values($result[$key]['sQuizResultTitle']);
		$quizResultDescriptionArray=array_values($result[$key]['sQuizResultDescription']);
		$quizResultFileArray=array_values($result[$key]['sQuizResultFileName']);
		if($hasResults <2)
		{
			$errorMsg='Minimum 2 results required';
			$error=true;
			error($errorMsg);
		}
		else
		{
			$resultNumber=1;
			for($r=0; $r<$hasResults; $r++)
			{
				if(strlen($quizResultTitleArray[$r]) < 10)
				{
					$errorMsg='Result#'.$resultNumber.' Title minimum length should be 10 chars';
					$error=true;
					error($errorMsg);
				}
				if($quizResultFileArray[$r]=="")
				{
					$errorMsg='Result #'.$resultNumber.' Empty or invalid result image dimensions';
					$error=true;
					error($errorMsg);
				}
				$resultNumber++;
			}
		}
	}
	$result='';
}
if(!$error)
{
	foreach ($keys as $id => $key)
	{
		$key=str_replace('/','',$key);
		
		$result[$key] = array('sFileName'  => $slFileName[$id],'sTitle'  => $slTitle[$id],'sVideoUrl' => $slVideoUrl[$id],'sAudioUrl' => $slAudioUrl[$id],'sEmbedUrl' => $slEmbedUrl[$id],'sMapUrl' => $slMapUrl[$id],'sIframeUrl' => $slIframeUrl[$id],'sPollOptions' => $slPollOptions[$id],'sPollFileName'  => $slPollFileName[$id],'sDescription' => $slDescription[$id],'sType' => $slType[$id],'sQuizResultTitle' =>$slQuizResultTitle[$id],'sQuizResultDescription' =>$slQuizResultDescription[$id],'sQuizResultFileName' =>$slQuizResultFileName[$id],'sQuizQuestion' =>$slQuizQuestion[$id],'sQuizQuestionFileName' =>$slQuizQuestionFileName[$id],'sQuizAnswersDescription' =>$slQuizAnswersDescription[$id],'sQuizAnswerFileName' =>$slQuizAnswerFileName[$id],'sQuizAnswersResult' => $slQuizAnswerResult[$id]);
		if($result[$key]['sType']==7)
		{
			$sImage=$result[$key]['sPollFileName'];
			$hasOptions=count($result[$key]['sPollOptions']);
			if(!$hasOptions)
			{
				$error=true;
			}
		}
		if(($result[$key]['sFileName'] && $result[$key]['sType']==1) || ($result[$key]['sPollFileName'] && $result[$key]['sType']==7))
		{
			if($result[$key]['sType']==7)
			{
				$sImage=$result[$key]['sPollFileName'];
			}
			else
			{
				$sImage=$result[$key]['sFileName'];
			}
			if($watermarkSettings['enable'] && $plugin['watermark'])
			{
				$watermarkType=$watermarkSettings['watermarkType'];
				if($sImage!="" && !is_animated(getFilesPath().'/images/slidesImages/'.$sImage))
				{
					//watermark image or text
					$path = '../../images/slidesImages/';
					$image_path = '../includes/watermark/'.$watermarkSettings['watermarkImage'];
					if($watermarkType=='image' && $watermarkSettings['watermarkImage'])
					{
						$newext = pathinfo($sImage, PATHINFO_EXTENSION);
						$new_name = $path.uniqId().'.'.$newext;
						if(watermark_image($path.$sImage, $new_name,$image_path))
							$watermarkImage = $path.$sImage;
					}
					else if($watermarkType=='text' && $watermarkSettings['watermarkText']!="")
					{
						define('WATERMARK_MARGIN_ADJUST', 5);
						define('WATERMARK_FONT_REALPATH', '../includes/watermark/');
						define('WATERMARK_OUTPUT_QUALITY', 90);
						$water_mark_text = $watermarkSettings['watermarkText'];
						$color = $watermarkSettings['color'];
						$fontStyle = 'arial.ttf';
						$fontSize = $watermarkSettings['fontSize'];
						$filename=$path.$sImage;
						textWatermark($filename,$water_mark_text,$fontStyle,$fontSize,$color);
					}
				}
			}
		}
		else if($result[$key]['sType']==2)
		{
			$sUrl=$result[$key]['sVideoUrl'];
			$sEmbed=generateEmbedLink($result[$key]['sVideoUrl']);
		}
		else if($result[$key]['sType']==3 &&  getDomain($result[$key]['sAudioUrl'])=='soundcloud.com')
		{
			$sUrl=$result[$key]['sAudioUrl'];
			$sEmbed=genSoundCloudEmbedLink($result[$key]['sAudioUrl']);
		}
		else if($result[$key]['sType']==3 && getDomain($result[$key]['sAudioUrl'])=='mixcloud.com')
		{
			$sUrl=$result[$key]['sAudioUrl'];
			$sEmbed=genMixCloudEmbedLink($result[$key]['sAudioUrl']);
		}
		else if($result[$key]['sType']==3 && getDomain($result[$key]['sAudioUrl'])=='reverbnation.com')
		{
			$sUrl=$result[$key]['sAudioUrl'];
			$sEmbed=genReverbnationEmbedLink($result[$key]['sAudioUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='facebook.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genFacebookEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='twitter.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genTwitterEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='plus.google.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genGoogleEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='pinterest.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genPinterestEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='instagram.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genInstagramEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='flickr.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genFlickerEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='deviantart.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genDavianArtEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='imgur.com')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genImgurEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='twitch.tv')
		{
			$sUrl=$result[$key]['sEmbedUrl'];
			$sEmbed=genTwitchEmbedLink($result[$key]['sEmbedUrl']);
		}
		else if($result[$key]['sType']==5 &&  getDomain($result[$key]['sMapUrl'])=='google.com')
		{
			$sUrl=$result[$key]['sMapUrl'];
			$sEmbed=genGoogleMapEmbedLink($result[$key]['sMapUrl']);
		}
		else if($result[$key]['sType']==5 &&  getDomain($result[$key]['sMapUrl'])=='bing.com')
		{
			$sUrl=$result[$key]['sMapUrl'];
			$sEmbed=genBingMapEmbedLink($result[$key]['sMapUrl']);
		}
		else if($result[$key]['sType']==6)
		{
			$sUrl='';
			$sEmbed=$result[$key]['sIframeUrl'];
			$sImage='';
		}
		$slideTitle=ucfirst(mres(strip_tags(trim($result[$key]['sTitle']))));
		$slideDescription=ucfirst(mysql_real_escape_string((strip_tags(trim($result[$key]['sDescription']), $allowedTags))));
		$sEmbed=preg_replace('/[^(\x20-\x7F)]*/','', $sEmbed);
		mysql_query("INSERT INTO `slides` (`pid`,`title`,`description`,`url`,`image`,`embedCode`,`type`) VALUES('$pid','$slideTitle','$slideDescription','$sUrl','$sImage','$sEmbed','".$result[$key]['sType']."')") or die(mysql_error());
		$parentSlideId=mysql_insert_id();
		if($result[$key]['sType']==7)
		{
			$pollOptionArray=array_values($result[$key]['sPollOptions']);
			foreach($pollOptionArray as $index)
			{
				$option=ucfirst(mysql_real_escape_string($index));
				mysql_query("INSERT INTO `polls` (`parentSlideId`,`option`) VALUES('$parentSlideId','$option')") or die(mysql_error());
				$option='';
			}
		}
		if($result[$key]['sType']==8)
		{
			//Results
			$hasResults=count($result[$key]['sQuizResultTitle']);
			$quizResultTitleArray=array_values($result[$key]['sQuizResultTitle']);
			$quizResultDescriptionArray=array_values($result[$key]['sQuizResultDescription']);
			$quizResultFileArray=array_values($result[$key]['sQuizResultFileName']);
			$value=1;
			for($r=0; $r<$hasResults; $r++)
			{
				$resultImg=$quizResultFileArray[$r];
				$resultTitle=ucfirst(mysql_real_escape_string($quizResultTitleArray[$r]));
				$resultDescription=ucfirst(mysql_real_escape_string($quizResultDescriptionArray[$r]));
				mysql_query("INSERT INTO `quizResults`(`parentSlideId`,`title`,`description`,`image`,`value`) VALUES('$parentSlideId','$resultTitle','$resultDescription','$resultImg','$value')");
				$value=$value+1;
			}
			//Questions
			$hasQuestions=count($result[$key]['sQuizQuestion']);
			$questionFileNamesArray=array_values($result[$key]['sQuizQuestionFileName']);
			$questionTitleArray=array_values($result[$key]['sQuizQuestion']);
			//Answers
			for($q=0; $q<$hasQuestions; $q++)
			{
				$questionImg=$questionFileNamesArray[$q][0];
				if($watermarkSettings['enable'] && $plugin['watermark'])
				{
					$watermarkType=$watermarkSettings['watermarkType'];
					if($questionImg!="" && !is_animated(getFilesPath().'/images/slidesImages/questionsImages/'.$questionImg))
					{
						//watermark image or text
						$path = '../../images/slidesImages/questionsImages/';
						$image_path = '../includes/watermark/'.$watermarkSettings['watermarkImage'];
						if($watermarkType=='image' && $watermarkSettings['watermarkImage'])
						{
							$newext = pathinfo($questionImg, PATHINFO_EXTENSION);
							$new_name = $path.uniqId().'.'.$newext;
							if(watermark_image($path.$questionImg, $new_name,$image_path))
								$watermarkImage = $path.$questionImg;
						}
						else if($watermarkType=='text' && $watermarkSettings['watermarkText']!="")
						{
							define('WATERMARK_MARGIN_ADJUST', 5);
							define('WATERMARK_FONT_REALPATH', '../includes/watermark/');
							define('WATERMARK_OUTPUT_QUALITY', 90);
							$water_mark_text = $watermarkSettings['watermarkText'];
							$color = $watermarkSettings['color'];
							$fontStyle = 'arial.ttf';
							$fontSize = $watermarkSettings['fontSize'];
							$filename=$path.$questionImg;
							textWatermark($filename,$water_mark_text,$fontStyle,$fontSize,$color);
						}
					}
				}
				$questionTitle=mysql_real_escape_string(ucfirst($questionTitleArray[$q][0]));
				//insert questions
				mysql_query("INSERT INTO `quizQuestions`(`parentSlideId`,`title`,`image`) VALUES('$parentSlideId','$questionTitle','$questionImg')");
				$qid=mysql_insert_id();
				//Sort answer array indexes
				$quizAnswerResultArray=array_values($result[$key]['sQuizAnswersResult']);
				$quizAnsResultArray=array_values($quizAnswerResultArray[$q]);
				
				$quizAnswerDescriptionArray=array_values($result[$key]['sQuizAnswersDescription']);
				$quizAnsDescriptionArray=array_values($quizAnswerDescriptionArray[$q]);
				
				$quizAnswerFileNameArray=array_values($result[$key]['sQuizAnswerFileName']);
				$quizAnsFileNameArray=array_values($quizAnswerFileNameArray[$q]);
				
				for($opt=0; $opt<count($quizAnswerResultArray[$q]); $opt++)
				{
					$optionImg=$quizAnsFileNameArray[$opt];
					$optTitle=ucfirst(mysql_real_escape_string($quizAnsDescriptionArray[$opt]));
					mysql_query("INSERT INTO `quizOptions` (`qid`,`image`,`title`,`result`) VALUES('$qid','$optionImg','$optTitle','".$quizAnsResultArray[$opt]."')");
					$optionImg='';
					$optTitle='';
				}
				
			}
		}
		$i++;
	}
	$jsonArr = array("error" => 0, "url" => '');
	echo json_encode( $jsonArr );
}
?>