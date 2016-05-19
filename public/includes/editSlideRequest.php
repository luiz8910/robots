<?php
if(!isset($_SESSION))
	session_start();
include '../../config/config.php';
include '../../includes/lib/aws/aws-autoloader.php';
include '../../includes/lib/verbalExpressions.php';
include '../../includes/functions.php';
$watermarkSettings=watermarkSettings();
$plugin=plugins();
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
{
	$error = false;
	$pid   = trim($_POST['pid']);
	//All Slides Data
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
	//print_r($slQuizResultTitle);
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
	//already exists ids
	$slAid = array_values($_POST['sAid']);
	$slPreviousImage=array_values($_POST['sPreviousImage']);
	$slPollOptionId = array_values($_POST['sPollOptionId']);
	$slResultId = array_values($_POST['sResultId']);
	$slQuestionId = array_values($_POST['sQuestionId']);
	//print_r($slQuestionId);
	$slAnswerId = array_values($_POST['sAnswerId']);
	//print_r($slAnswerId);
	$result = array();
	foreach ($keys as $id => $key)
	{
		$key=str_replace('/','',$key);
		$result[$key] = array('sAid' => $slAid[$id],'sFileName'  => $slFileName[$id],'sTitle'  => $slTitle[$id],'previousImage' => $slPreviousImage[$id],'sVideoUrl' => $slVideoUrl[$id],'sAudioUrl' => $slAudioUrl[$id],'sEmbedUrl' => $slEmbedUrl[$id],'sMapUrl' => $slMapUrl[$id],'sIframeUrl' => $slIframeUrl[$id],'sPollOptions' => $slPollOptions[$id],'sPollFileName'  => $slPollFileName[$id],'sPollOptionId' => $slPollOptionId[$id],'sDescription' => $slDescription[$id],'sType' => $slType[$id],'sResultId' => $slResultId[$id],'sQuizResultTitle' =>$slQuizResultTitle[$id],'sQquestionId' => $slQuestionId[$id],'sQuizResultDescription' =>$slQuizResultDescription[$id],'sQuizResultFileName' =>$slQuizResultFileName[$id],'sQuizQuestion' =>$slQuizQuestion[$id],'sQuizQuestionFileName' =>$slQuizQuestionFileName[$id],'sAnswerId' => $slAnswerId[$id],'sQuizAnswersDescription' =>$slQuizAnswersDescription[$id],'sQuizAnswerFileName' =>$slQuizAnswerFileName[$id],'sQuizAnswersResult' => $slQuizAnswerResult[$id]);
		
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
		else if($result[$key]['sType']==2 && !validYoutubeVideoUrl($result[$key]['sVideoUrl']) && !validVimeoVideoUrl($result[$key]['sVideoUrl']) && !validDailymotionVideoUrl($result[$key]['sVideoUrl']) && !validVineVideoUrl($result[$key]['sVideoUrl']) && !validInstagramVideoUrl($result[$key]['sVideoUrl']) && !validFacebookVideoUrl($result[$key]['sVideoUrl']))
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
						$errorMsg='Result#'.$resultNumber.' Empty or invalid result image dimensions';
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
		$i=0;
		foreach ($keys as $id => $key)
		{
			$key=str_replace('/','',$key);
			$result[$key] = array('sAid' => $slAid[$id],'sFileName'  => $slFileName[$id],'sTitle'  => $slTitle[$id],'previousImage' => $slPreviousImage[$id],'sVideoUrl' => $slVideoUrl[$id],'sAudioUrl' => $slAudioUrl[$id],'sEmbedUrl' => $slEmbedUrl[$id],'sMapUrl' => $slMapUrl[$id],'sIframeUrl' => $slIframeUrl[$id],'sPollOptions' => $slPollOptions[$id],'sPollFileName'  => $slPollFileName[$id],'sPollOptionId' => $slPollOptionId[$id],'sDescription' => $slDescription[$id],'sType' => $slType[$id],'sResultId' => $slResultId[$id],'sQuizResultTitle' =>$slQuizResultTitle[$id],'sQuestionId' => $slQuestionId[$id],'sQuizResultDescription' =>$slQuizResultDescription[$id],'sQuizResultFileName' =>$slQuizResultFileName[$id],'sQuizQuestion' =>$slQuizQuestion[$id],'sQuizQuestionFileName' =>$slQuizQuestionFileName[$id],'sAnswerId' => $slAnswerId[$id],'sQuizAnswersDescription' =>$slQuizAnswersDescription[$id],'sQuizAnswerFileName' =>$slQuizAnswerFileName[$id],'sQuizAnswersResult' => $slQuizAnswerResult[$id]);
			
			if(($result[$key]['sFileName'] && $result[$key]['sType']==1) || ($result[$key]['sPollFileName'] && $result[$key]['sType']==7))
			{
				if($result[$key]['sType']==7)
				{
					$sImage=$result[$key]['sPollFileName'];
					$sUrl='';
					$sEmbed='';
				}
				else
				{
					$sImage=$result[$key]['sFileName'];
					$sUrl='';
					$sEmbed='';
				}
			}
			else if($result[$key]['sType']==2)
			{
				$sUrl=$result[$key]['sVideoUrl'];
				$sEmbed=generateEmbedLink($result[$key]['sVideoUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==3 &&  getDomain($result[$key]['sAudioUrl'])=='soundcloud.com')
			{
				$sUrl=$result[$key]['sAudioUrl'];
				$sEmbed=genSoundCloudEmbedLink($result[$key]['sAudioUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==3 && getDomain($result[$key]['sAudioUrl'])=='mixcloud.com')
			{
				$sUrl=$result[$key]['sAudioUrl'];
				$sEmbed=genMixCloudEmbedLink($result[$key]['sAudioUrl']);
				$sImage='';
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
				$sImage='';
			}
			else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='twitter.com')
			{
				$sUrl=$result[$key]['sEmbedUrl'];
				$sEmbed=genTwitterEmbedLink($result[$key]['sEmbedUrl']);
				$sImage='';
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
				$sImage='';
			}
			else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='instagram.com')
			{
				$sUrl=$result[$key]['sEmbedUrl'];
				$sEmbed=genInstagramEmbedLink($result[$key]['sEmbedUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='flickr.com')
			{
				$sUrl=$result[$key]['sEmbedUrl'];
				$sEmbed=genFlickerEmbedLink($result[$key]['sEmbedUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='deviantart.com')
			{
				$sUrl=$result[$key]['sEmbedUrl'];
				$sEmbed=genDavianArtEmbedLink($result[$key]['sEmbedUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='imgur.com')
			{
				$sUrl=$result[$key]['sEmbedUrl'];
				$sEmbed=genImgurEmbedLink($result[$key]['sEmbedUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==4 &&  getDomain($result[$key]['sEmbedUrl'])=='twitch.tv')
			{
				$sUrl=$result[$key]['sEmbedUrl'];
				$sEmbed=genTwitchEmbedLink($result[$key]['sEmbedUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==5 &&  getDomain($result[$key]['sMapUrl'])=='google.com')
			{
				$sUrl=$result[$key]['sMapUrl'];
				$sEmbed=genGoogleMapEmbedLink($result[$key]['sMapUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==5 &&  getDomain($result[$key]['sMapUrl'])=='bing.com')
			{
				$sUrl=$result[$key]['sMapUrl'];
				$sEmbed=genBingMapEmbedLink($result[$key]['sMapUrl']);
				$sImage='';
			}
			else if($result[$key]['sType']==6)
			{
				$sUrl='';
				$sEmbed=$result[$key]['sIframeUrl'];
				$sImage='';
			}
			else if($result[$key]['sType']==8)
			{
				$sUrl='';
				$sImage='';
				$sEmbed='';
			}
			
			$slideTitle=ucfirst(mres(strip_tags(trim($result[$key]['sTitle']))));
			
			$slideDescription=ucfirst(mysql_real_escape_string((strip_tags(trim($result[$key]['sDescription']), $allowedTags))));
			$sEmbed=preg_replace('/[^(\x20-\x7F)]*/','', $sEmbed);
			if(($result[$key]['sType']==1 || $result[$key]['sType']==7) && getSlidePreviousImage($result[$key]['sAid'])!=$sImage)
			{
				if($watermarkSettings['enable'] && $plugin['watermark'])
				{
					$watermarkType=$watermarkSettings['watermarkType'];
					if($sImage!="" && !is_animated(getFilesPath().'/images/slidesImages/'.$sImage))
					{
						//watermark image or text
						$path = '../../images/slidesImages/';
						$image_path = '../../includes/watermark/'.$watermarkSettings['watermarkImage'];
						if($watermarkType=='image' && $watermarkSettings['watermarkImage'] && file_exists($image_path))
						{
							$newext = pathinfo($sImage, PATHINFO_EXTENSION);
							$new_name = $path.uniqId().'.'.$newext;
							if(watermark_image($path.$sImage, $new_name,$image_path))
								$watermarkImage = $path.$sImage;
						}
						else if($watermarkType=='text' && $watermarkSettings['watermarkText']!="")
						{
							define('WATERMARK_MARGIN_ADJUST', 5);
							define('WATERMARK_FONT_REALPATH', '../../includes/watermark/');
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
			if($result[$key]['sAid'])
			{
				$parentSlideId=$result[$key]['sAid'];
				if(getSlidePreviousType($parentSlideId)!=$result[$key]['sType'])
				{
					$fetchSlide=mysql_fetch_array(mysql_query("SELECT * FROM `slides` WHERE `id`='$parentSlideId' AND `pid`='$pid'"));
					if(getSlidePreviousType($parentSlideId)==1)
					{
						unlink('../../images/slidesImages/'.$fetchSlide['image']);
						deleteFromBucket('images/slidesImages/'.$fetchSlide['image']);
					}
					else if(getSlidePreviousType($parentSlideId)==7)
					{
						unlink('../../images/slidesImages/'.$fetchSlide['image']);
						deleteFromBucket('images/slidesImages/'.$fetchSlide['image']);
						mysql_query("DELETE FROM `polls` WHERE `parentSlideId`='$parentSlideId'");
						mysql_query("DELETE FROM `pollsVotes` WHERE `parentSlideId`='$parentSlideId'");
					}
					else if(getSlidePreviousType($parentSlideId)==8)
					{
						//Remove Results
						$resultsQuery=mysql_query("SELECT * FROM `quizResults` WHERE `parentSlideId`='$parentSlideId'");
						while($fetchResult=mysql_fetch_array($resultsQuery))
						{
							unlink('../../images/slidesImages/resultsImages/'.$fetchResult['image']);
							deleteFromBucket('images/slidesImages/resultsImages/'.$fetchResult['image']);
							mysql_query("DELETE FROM `quizResults` WHERE `parentSlideId`='$parentSlideId'");
						}
						//Remove Questions
						$questionsQuery=mysql_query("SELECT * FROM `quizQuestions` WHERE `parentSlideId`='$parentSlideId'");
						while($fetchQuestion=mysql_fetch_array($questionsQuery))
						{
							//Remove Answers
							$answersQuery=mysql_query("SELECT * FROM `quizOptions` WHERE `qid`='".$fetchQuestion['id']."'");
							while($fetchAnswer=mysql_fetch_array($answersQuery))
							{
								unlink('../../images/slidesImages/optionsImages/'.$fetchAnswer['image']);
								deleteFromBucket('images/slidesImages/optionsImages/'.$fetchAnswer['image']);
								mysql_query("DELETE FROM `quizOptions` WHERE `qid`='".$fetchQuestion['id']."'");
							}
							unlink('../../images/slidesImages/questionsImages/'.$fetchQuestion['image']);
							deleteFromBucket('images/slidesImages/questionsImages/'.$fetchQuestion['image']);
							mysql_query("DELETE FROM `quizQuestions` WHERE `parentSlideId`='$parentSlideId'");
						}
					}
					
				}
				mysql_query("UPDATE `slides` SET `title`='$slideTitle',`description`='$slideDescription',`url`='$sUrl',`image`='$sImage',`embedCode`='$sEmbed',`displayOrder`='$i',`type`='".$result[$key]['sType']."' WHERE `id`='$parentSlideId'") or die(mysql_error());
			}
			else
			{
				mysql_query("INSERT INTO `slides` (`pid`,`title`,`description`,`url`,`image`,`embedCode`,`displayOrder`,`type`) VALUES('$pid','$slideTitle','$slideDescription','$sUrl','$sImage','$sEmbed','$i','".$result[$key]['sType']."')") or die(mysql_error());
				$parentSlideId=mysql_insert_id();
			}
			if($result[$key]['sType']==7)
			{
				$pollOptionArray=array_values($result[$key]['sPollOptions']);
				$pollPrevIdArray=array_values($result[$key]['sPollOptionId']);
				$pIndex=0;
				foreach($pollOptionArray as $index)
				{
					$option=ucfirst(mysql_real_escape_string($index));
					if($pollPrevIdArray[$pIndex]!=0)
					{
						mysql_query("UPDATE `polls` SET `option`='$option' WHERE `id`='".$pollPrevIdArray[$pIndex]."'") or die(mysql_error());
					}
					else
					{
						mysql_query("INSERT INTO `polls` (`parentSlideId`,`option`) VALUES('$parentSlideId','$option')") or die(mysql_error());
					}
					$pIndex++;
				}
			}
			if($result[$key]['sType']==8)
			{
				//Results
				$hasResults=count($result[$key]['sQuizResultTitle']);
				$quizResultTitleArray=array_values($result[$key]['sQuizResultTitle']);
				$quizResultDescriptionArray=array_values($result[$key]['sQuizResultDescription']);
				$quizResultFileArray=array_values($result[$key]['sQuizResultFileName']);
				$quizResultIdArray=array_values($result[$key]['sResultId']);
				$value=1;
				for($r=0; $r<$hasResults; $r++)
				{
					$resultImg=$quizResultFileArray[$r];
					$resultTitle=ucfirst(mysql_real_escape_string($quizResultTitleArray[$r]));
					$resultDescription=ucfirst(mysql_real_escape_string($quizResultDescriptionArray[$r]));
					if($quizResultIdArray[$r]!=0)
					{
						mysql_query("UPDATE `quizResults` SET `title`='$resultTitle',`description`='$resultDescription',`image`='$resultImg',`value`='$value' WHERE `id`='".$quizResultIdArray[$r]."'");
					}
					else
					{
						mysql_query("INSERT INTO `quizResults`(`parentSlideId`,`title`,`description`,`image`,`value`) VALUES('$parentSlideId','$resultTitle','$resultDescription','".$resultImg."','$value')");
					}
					$resultImg='';
					$resultTitle='';
					$resultDescription='';
					$value=$value+1;
				}
				//Questions
				$hasQuestions=count($result[$key]['sQuizQuestion']);
				//Answers
				$questionFileNamesArray=array_values($result[$key]['sQuizQuestionFileName']);
				$questionTitleArray=array_values($result[$key]['sQuizQuestion']);
				for($q=0; $q<$hasQuestions; $q++)
				{
					$questionImg=$questionFileNamesArray[$q][0];
					//watermark image or text
					if($watermarkSettings['enable'] && $plugin['watermark'])
					{
						$watermarkType=$watermarkSettings['watermarkType'];
						if($questionImg!="" && !is_animated(getFilesPath().'/images/slidesImages/questionsImages/'.$questionImg))
						{
							//watermark image or text
							$path = '../../images/slidesImages/questionsImages/';
							$image_path = '../../includes/watermark/'.$watermarkSettings['watermarkImage'];
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
								define('WATERMARK_FONT_REALPATH', '../../includes/watermark/');
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
					//insert questions
					$questionTitle=ucfirst(mysql_real_escape_string($questionTitleArray[$q][0]));
					if($result[$key]['sQuestionId'][$q] !=0)
					{
						mysql_query("UPDATE `quizQuestions` SET `title`='$questionTitle',`image`='$questionImg' WHERE `id`='".$result[$key]['sQuestionId'][$q]."'");
						$qid=$result[$key]['sQuestionId'][$q];
					}
					else
					{
						mysql_query("INSERT INTO `quizQuestions`(`parentSlideId`,`title`,`image`) VALUES('$parentSlideId','$questionTitle','".$questionImg."')");
						$qid=mysql_insert_id();
					}
					$questionImg='';
					$questionTitle='';
					//Sort answer array indexes
					$quizAnswerResultArray=array_values($result[$key]['sQuizAnswersResult']);
					$quizAnsResultArray=array_values($quizAnswerResultArray[$q]);
					
					$quizAnswerDescriptionArray=array_values($result[$key]['sQuizAnswersDescription']);
					$quizAnsDescriptionArray=array_values($quizAnswerDescriptionArray[$q]);
					
					$quizAnswerFileNameArray=array_values($result[$key]['sQuizAnswerFileName']);
					$quizAnsFileNameArray=array_values($quizAnswerFileNameArray[$q]);
					
					$quizAnswerPrevIdArray=array_values($result[$key]['sAnswerId']);
					$quizAnswerPreviousIdArray=array_values($quizAnswerPrevIdArray[$q]);
					
					for($opt=0; $opt<count($quizAnswerResultArray[$q]); $opt++)
					{
						$optionImg=$quizAnsFileNameArray[$opt];
						$optTitle=ucfirst(mysql_real_escape_string($quizAnsDescriptionArray[$opt]));
						if($quizAnswerPreviousIdArray[$opt]!=0)
						{
							$quizAnswerPreviousIdArray[$opt];
							mysql_query("UPDATE `quizOptions` SET `image`='$optionImg',`title`='$optTitle',`result`='".$quizAnsResultArray[$opt]."' WHERE `id`='".$quizAnswerPreviousIdArray[$opt]."' AND `qid`='$qid'") or die(mysql_error());
						}
						else
						{
							mysql_query("INSERT INTO `quizOptions` (`qid`,`image`,`title`,`result`) VALUES('$qid','$optionImg','$optTitle','".$quizAnsResultArray[$opt]."')");
						}
						$optionImg='';
						$optTitle='';
					}
					
				}
			}
			$i++;
		}
		//Remove options
		$removedOptions=trim($_POST['removedOptions']);
		$options = explode(",", $removedOptions);
		foreach($options as $optId)
		{
			$fetchPoll=mysql_fetch_array(mysql_query("SELECT * FROM `polls` WHERE `id`='$optId'"));
			if($fetchPoll['id'])
			{
				mysql_query("DELETE FROM `polls` WHERE id='$optId'");
				mysql_query("DELETE FROM `pollsVotes` WHERE `optionId`='$optId'");
			}
		}
		//Remove results
		$removedResults=trim($_POST['removedResults']);
		$results = explode(",", $removedResults);
		foreach($results as $rid)
		{
			$fetchResult=mysql_fetch_array(mysql_query("SELECT * FROM `quizResults` WHERE `id`='$rid'"));
			unlink('../../images/slidesImages/resultsImages/'.$fetchResult['image']);
			deleteFromBucket('images/slidesImages/resultsImages/'.$fetchResult['image']);
			mysql_query("DELETE FROM `quizResults` WHERE id='$rid'");
		}
		//Remove questions
		$removedQuestions=trim($_POST['removedQuestions']);
		$questions = explode(",", $removedQuestions);
		foreach($questions as $qid)
		{
			$answersQuery=mysql_query("SELECT * FROM `quizOptions` WHERE `qid`='$qid'");
			while($fetchAnsers=mysql_fetch_array($answersQuery))
			{
				unlink('../../images/slidesImages/optionsImages/'.$fetchAnsers['image']);
				deleteFromBucket('images/slidesImages/optionsImages/'.$fetchAnsers['image']);
				mysql_query("DELETE FROM `quizOptions` WHERE `id`='".$fetchAnsers['id']."'");
			}
			$fetchQuestion=mysql_fetch_array(mysql_query("SELECT * FROM `quizQuestions` WHERE `id`='$qid'"));
			unlink('../../images/slidesImages/questionsImages/'.$fetchQuestion['image']);
			deleteFromBucket('images/slidesImages/questionsImages/'.$fetchQuestion['image']);
			mysql_query("DELETE FROM `quizQuestions` WHERE `id`='$qid'");
		}
		//Remove answers
		$removedAnswers=trim($_POST['removedAnswers']);
		$answers = explode(",", $removedAnswers);
		foreach($answers as $aid)
		{
			$fetchAnswer=mysql_fetch_array(mysql_query("SELECT * FROM `quizOptions` WHERE `id`='$aid'"));
			unlink('../../images/slidesImages/optionsImages/'.$fetchAnswer['image']);
			deleteFromBucket('images/slidesImages/optionsImages/'.$fetchAnswer['image']);
			mysql_query("DELETE FROM `quizOptions` WHERE `id`='$aid'");
		}
		//Remove Slides
		$removedSlides=trim($_POST['removedSlides']);
		$slideId = explode(",", $removedSlides);
		foreach($slideId as $sid)
		{
			$fetchSlide=mysql_fetch_array(mysql_query("SELECT * FROM `slides` WHERE `id`='$sid' AND `pid`='$pid'"));
			if($fetchSlide['type']==1)
			{
				unlink('../../images/slidesImages/'.$fetchSlide['image']);
				deleteFromBucket('images/slidesImages/'.$fetchSlide['image']);
			}
			else if($fetchSlide['type']==7)
			{
				unlink('../../images/slidesImages/'.$fetchSlide['image']);
				deleteFromBucket('images/slidesImages/'.$fetchSlide['image']);
				mysql_query("DELETE FROM `polls` WHERE `parentSlideId`='$sid'");
				mysql_query("DELETE FROM `pollsVotes` WHERE `parentSlideId`='$sid'");
			}
			else if($fetchSlide['type']==8)
			{
				//Remove Results
				$resultsQuery=mysql_query("SELECT * FROM `quizResults` WHERE `parentSlideId`='$sid'");
				while($fetchResult=mysql_fetch_array($resultsQuery))
				{
					unlink('../../images/slidesImages/resultsImages/'.$fetchResult['image']);
					deleteFromBucket('images/slidesImages/resultsImages/'.$fetchResult['image']);
					mysql_query("DELETE FROM `quizResults` WHERE `parentSlideId`='$sid'");
				}
				//Remove Questions
				$questionsQuery=mysql_query("SELECT * FROM `quizQuestions` WHERE `parentSlideId`='$sid'");
				while($fetchQuestion=mysql_fetch_array($questionsQuery))
				{
					//Remove Answers
					$answersQuery=mysql_query("SELECT * FROM `quizOptions` WHERE `qid`='".$fetchQuestion['id']."'");
					while($fetchAnswer=mysql_fetch_array($answersQuery))
					{
						unlink('../../images/slidesImages/optionsImages/'.$fetchAnswer['image']);
						deleteFromBucket('images/slidesImages/optionsImages/'.$fetchAnswer['image']);
						mysql_query("DELETE FROM `quizOptions` WHERE `qid`='".$fetchQuestion['id']."'");
					}
					unlink('../../images/slidesImages/questionsImages/'.$fetchQuestion['image']);
					deleteFromBucket('images/slidesImages/questionsImages/'.$fetchQuestion['image']);
					mysql_query("DELETE FROM `quizQuestions` WHERE `parentSlideId`='$sid'");
				}
			}
			mysql_query("DELETE FROM `slides` WHERE `id`='$sid' AND `pid`='$pid'");
		}
		//Unlink Previous Images
		foreach ($_SESSION['unlinkAdminSlideImages'] as $image)
		{
			unlink('../'.$image);
			deleteFromBucket(ltrim($image,"../../"));
		}
		$jsonArr = array("error" => 0, "url" => '');
		echo json_encode( $jsonArr );
		$_SESSION['update']=1;
	}
}
?>