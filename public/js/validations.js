
function validFacebookVideoUrl(url)
{
	if(url.indexOf("/videos/")!=-1)
	{
		var tester = VerEx()
		.startOfLine()
		.maybe('http')
		.maybe('s')
		.maybe('://')
		.maybe('www.')
		.then('facebook.com')
		.then('/')
		.anythingBut(' ')
		.then('/')
		.then('videos')
		.then('/')
		.anythingBut(' ')
		.endOfLine();
	}
	else
	{
		var tester = VerEx()
		.startOfLine()
		.maybe('http')
		.maybe('s')
		.maybe('://')
		.maybe('www.')
		.then('facebook.com')
		.then('/')
		.then('video.php?v')
		.then('=')
		.anythingBut(' ')
		.endOfLine();
	}

	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validVimeoVideoUrl(url)
{
	if(url.length!=0)
	{
		if(url.indexOf("player.vimeo.com")!=-1)
		{
			var tester = VerEx()
			.startOfLine()
			.maybe('http')
			.maybe('s')
			.maybe('://')
			.maybe('//')
			.maybe('www.')
			.then('player.vimeo.com')
			.then('/')
			.then('video')
			.then('/')
			.anythingBut(' ')
			.endOfLine();
		}
		else
		{
			var tester = VerEx()
			.startOfLine()
			.maybe('http')
			.maybe('s')
			.maybe('://')
			.maybe('www.')
			.then('vimeo.com')
			.then('/')
			.anythingBut(' ')
			.endOfLine();
		}

		if (tester.test(url)) {
			return 1;
		} else {
			return 0;
		}
	}
	else
	{return 0}
}
function validDailymotionVideoUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('dailymotion.com')
	.then('/')
	.then('video')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validVineVideoUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('vine.co')
	.then('/')
	.then('v')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validInstagramVideoUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('instagram.com')
	.then('/')
	.then('p')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validGoogleMapUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('google.com')
	.then('/')
	.then('maps')
	.then('/')
	.then('place')
	.then('/')
	.anythingBut(' ')
	.then('/@')
	.anythingBut(' ')
	.then(',')
	.anythingBut(' ')
	.then(',')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validBingMapUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('bing.com')
	.then('/')
	.then('maps')
	.then('/')
	.then('?v=')
	.anythingBut(' ')
	.then('&cp=')
	.anythingBut(' ')
	.then('~')
	.anythingBut(' ')
	.then('&lvl=')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validSoundcloudUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('soundcloud.com')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validMixcloudUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('mixcloud.com')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validReverbnationUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('reverbnation.com')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.then('song')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validGooglePostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('plus.google.com')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.then('posts')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validTwitterPostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('twitter.com')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.then('status')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validPinterestPostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('pinterest.com')
	.then('/')
	.then('pin')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validInstagramPostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('instagram.com')
	.then('/')
	.then('p')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validFacebookPostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('facebook.com')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.then('posts')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validImgurPostUrl(url)
{
	if(url.indexOf("/gallery/")!=-1)
	{
		var tester = VerEx()
		.startOfLine()
		.maybe('http')
		.maybe('s')
		.maybe('://')
		.maybe('www.')
		.then('imgur.com')
		.then('/')
		.maybe('gallary')
		.maybe('/')
		.anythingBut(' ')
		.endOfLine();
	}
	else
	{
		var tester = VerEx()
		.startOfLine()
		.maybe('http')
		.maybe('s')
		.maybe('://')
		.maybe('www.')
		.then('imgur.com')
		.then('/')
		.anythingBut(' ')
		.endOfLine();
	}
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validTwitchPostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('twitch.tv')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validFlickerPostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('flickr.com')
	.then('/')
	.then('photos')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validYoutubeVideoUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('youtube.com')
	.then('/')
	.then('watch?v')
	.then('=')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}
function validDeviantartPostUrl(url)
{
	var tester = VerEx()
	.startOfLine()
	.maybe('http')
	.maybe('s')
	.maybe('://')
	.maybe('www.')
	.then('deviantart.com')
	.then('/')
	.anythingBut(' ')
	.then('/')
	.anythingBut(' ')
	.endOfLine();
	
	if (tester.test(url)) {
		return 1;
	} else {
		return 0;
	}
}