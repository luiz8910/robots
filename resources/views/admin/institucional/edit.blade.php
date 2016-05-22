<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link rel="shortcut icon" href="">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootoption.css" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="css/theme-orangeblue.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.js"></script>
<link href="css/preloader.css" rel="stylesheet">
<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="cssload-container">
<div class="cssload-speeding-wheel"></div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#loading').fadeOut('slow',function(){$(this).remove();});
		});
	</script>
<div id="submitLoader"></div>
</head><body class="skin-blue">
<header class="header">
        <a target="_blank" href="" class="logo secondary-bg-color">
            <img src="images/logo-h2o-painel.png">
        </a>
        <nav class="navbar navbar-static-top primary-bg-color" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" target="_blank"><i class="fa fa-globe"></i> Visualizar Site</a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>administrador <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <a href="#">
                                <i class="fa fa-user"></i> Meu Perfil</a>
                                <a href="l#">
                                <i class="fa fa-sign-out"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <script>
var maxSize=104857600;
var slideImageWidth=650;
var slideImageHeight=370;
var resultImageWidth=600;
var resultImageHeight=300;
var questionImageWidth=600;
var questionImageHeight=370;
var answerImageWidth=215;
var answerImageHeight=215;
var page='';
var ROOTPATH='';
</script>
    
<link href="css/fileUpload.css" rel="stylesheet" type="text/css"/>
<script src="js/fileUpload.js"></script>
<script src="js/verbalExpressions.js"></script>
<script src="js/validations.js"></script>
<title>Dashboard | Add Slide Quem Somos</title>
<div class="wrapper row-offcanvas row-offcanvas-left">
@include("admin.menu.menu-lateral")
    
<aside class="right-side">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-square-o"></i> Adicionar Slide Quem Somos
        </h1>
    </section>
    <section class="content">
        <div class="box-header">
            <h3 class="box-title">
                @include("errors._check")
            </h3>
        </div>
        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
            <div class="box box-warning">
                <div class="box-body">
                    <div id="dangerAlert" class="alert alert-danger alert-dismissable hide">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><i class="fa fa-exclamation-triangle"></i></b> <span class="errorMsg"></span>
                    </div>
                    {!! Form::model($inst, ["route" => "admin.institucional.update"]) !!}
                    {{--<form role="form" method="POST" id="submitPostForm" enctype="multipart/form-data">--}}
                    <input type="hidden" name="uid" value=""/>
                        <input type="hidden" name="id[]" value="0"/>
                        <div class="slideHeader">

                            <div class="form-group ">
                                <label class="control-label">Missão</label>
                                {!! Form::textarea("missao", null, ["class" => "form-control slideDescription", "rows" => "10"]) !!}
                                {{--<textarea class="form-control slideDescription" rows="10"></textarea>--}}

                                <p class="error-msg label label-danger slideDescriptionError hide">
                                    <i class="fa fa-times-circle"></i>
                                    Descri&ccedil;&atilde;o comprimento m&iacute;nimo deve ser de 30 caracteres
                                </p>
                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="description">Valores</label>
                                {!! Form::textarea("valores", null, ["class" => "form-control slideDescription", "rows" => "10"]) !!}

                                <p class="error-msg label label-danger slideDescriptionError hide">
                                    <i class="fa fa-times-circle"></i>
                                    Descri&ccedil;&atilde;o comprimento m&iacute;nimo deve ser de 30 caracteres
                                </p>                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="description">Visão</label>
                                {!! Form::textarea("visao", null, ["class" => "form-control slideDescription", "rows" => "10"]) !!}

                                <p class="error-msg label label-danger slideDescriptionError hide">
                                    <i class="fa fa-times-circle"></i>
                                    Descri&ccedil;&atilde;o comprimento m&iacute;nimo deve ser de 30 caracteres
                                </p>
                            </div>
                        </div>

                                <div class="form-group">
                                    {!! Form::submit("Alterar", ["class" => "btn btn-success"]) !!}

                                </div>
                            {{--</form>--}}{!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </section>
	</aside>
</div>
<script>
var qIndex=0;
var question=0;
var answer=0;
//change global variable value;
function changeGlobalOptionCount()
{
option=2;
count=1;
k=0;
return option,count,k;
}
//change global question index
function incrementQuestionIndexes()
{
qIndex=qIndex+1;
question=0;
answer=0;
return qIndex,question,answer;
}
function resetQuestionIndexes()
{
qIndex=0;
}
var allOptions='';
//*********************************************************Add,Remove Poll************************************************\\
//add poll option
$(document).on('click','.addOptions',function(){
var slideIndex=$(this).attr('id');
var optionIndex=$(this).attr('data-id');
optionIndex=parseInt(optionIndex)+1
$(this).attr('data-id',optionIndex);
var option=$(this).parent().parent().prev('.embedPollSlide').find('.pollOptions').length + 1;
if(option > 1)
{
	$(this).parent().parent().prev('.embedPollSlide').find('.pollsLimitError').addClass('hide')
}
$(this).parent().parent().prev().append('<div class="form-group row"><label class="col-xs-12  primaryText pollOptions">Option '+option+'</label><div class="col-sm-7"><input type="text" class="form-control pollOptionsFeild" name="sPollOptions[0]['+optionIndex+']"><p class="error-msg  label label-danger slidePolloptionError hide"><i class="fa fa-times-circle"></i> Option minimum length should be 3 chars</p></div><a class="col-xs-2 selectOption" style="position: relative; top: 11px;"><i class="fa fa-trash fa-lg" style="color:red"></i></a></div>');
option=option+1;
});
//remove poll option 
$(document).on('click','.selectOption',function(){
//after remove an option Reorder options
var count=1;
$(this).parents('.embedPollSlide').find(".pollOptions").not($(this).parent().find('.pollOptions')).each(function(){
	$(this).text("Option "+count);
	count++;
});
$(this).parent().remove();
});
//*****************************************************Add,Remove Results*************************************************\\
$(document).on('click','.addResults',function(){
var countResults=$(this).parents('.embedQuizSlide').find('.myResNo').length;
countResults=countResults+1;
$(this).parents('.slideHeader').find('.embedQuizSlide select').each(function (index, element)
{
	$(this).append('<option value="'+countResults+'">Result '+countResults+'</option>')
});
$(this).prev().append('<div><div class="removeResult text-right form-group"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div><div class="form-group myResNo"><div class="form-group"><div class="input-group"><div class="input-group-addon resultno">'+countResults+'</div><input type="text" class="form-control slideQuizresultTitle" name="sQuizResultTitle[0][]" placeholder="Result Title"></div><p class="error-msg label label-danger slideQuizresultTitleError hide"><i class="fa fa-times-circle"></i> Title minimum length should be 10 chars</p></div></div><div class="quizz row"><div class="col-sm-8"><div class="form-group"><textarea class="form-control slideQuizresultDescription" name="sQuizResultDescription[0][]" placeholder="Result Description"></textarea><p class="error-msg label label-danger slideQuizresultDescriptionError hide"><i class="fa fa-times-circle"></i> Description minimum length should be 30 chars</p></div></div><div class="col-sm-4"><div class="form-group last tile"><div class="fileupload fileupload-new" data-provides="fileupload"><div class="fileupload-new quizImg"></div><div class="fileupload-preview fileupload-exists quizResultImg quizImg" ></div><div class="resultImgParent"><span class="btn btn-white btn-file"><span class="fileupload-new"><i class="fa fa-camera"></i></span><p>Click to add image</p><span class="fileupload-exists"><i class="fa fa-undo"></i> Change image</span><input type="file" class="default" accept="image/jpg,image/png,image/jpeg,image/gif"/><input type="hidden" class="sQuizResultFile" name="sQuizResultFile[0][]"></span><p class="error-msg label label-danger imgCardAlert sQuizResultFileError hide"><i class="fa fa-times-circle"></i> Empty or invalid dimensions</p><p class="imgDimensions">600x300</p></div></div></div></div></div></div>');
var countResults=$(this).parents('.embedQuizSlide').find('.myResNo').length;
if(countResults > 1)
{
	$(this).parents(".embedQuizSlide").find('.resultsLimitError').addClass('hide');
}
});
$(document).on('click','.removeResult',function(){
var res=1;
$(this).parents('.slideHeader').find('.myResNo').not($(this).next('.myResNo')).each(function (index, element){
	$(this).find('.resultno').text(res)
	res=res+1;
})
//remove result from option dropdown
$(this).parents('.slideHeader').find('.embedQuizSlide select').each(function (index, element)
{
	$(this).html('');
	for(opt=1; opt < res; opt++)
	{
		$(this).append('<option value="'+opt+'">Result '+opt+'</option>');
	}
});
$(this).parent().remove();

});
//*****************************************************Add,Remove Answers*************************************************\\
$(document).on('click','.addAnswers',function(){
var answerIndex=$(this).attr('data-id');
answerIndex=parseInt(answerIndex)+1;
$(this).attr('data-id',answerIndex)
allOptions='';
var questionIndex=$(this).attr('id');
var countResults=$(this).parents('.slideHeader').find(".embedQuizSlide").find('.myResNo').length;
for(i=1; i<=countResults; i++)
{
	allOptions +='<option value="'+i+'">Result '+i+'</option>';
}
//closest(".divouter").after("<div>Foo</div>");
$(this).parent().before('<div class="col-sm-6 optParent"><h4></h4><div class="panel addans"><div class="panel-body"><div class="form-group last row"><div class="col-xs-12"><div class="fileupload fileupload-new" data-provides="fileupload"><div class="fileupload-new quizImg"></div><div class="fileupload-preview fileupload-exists quizAnswerImg quizImg" ></div><div class="answerImgParent"><span class="btn btn-white btn-file"><span class="fileupload-new"><i class="fa fa-camera"></i></span><p>Click to add image</p><span class="fileupload-exists"><i class="fa fa-undo"></i> Change image</span><input type="file" class="default" accept="image/jpg,image/png,image/jpeg,image/gif"/><input type="hidden" class="sQuizAnswerFile" name="sQuizAnswerFile[0]['+questionIndex+']['+answerIndex+']"></span><p class="error-msg label label-danger imgCardAlert sQuizAnswerFileError hide"><i class="fa fa-times-circle"></i> Empty or invalid dimensions</p><p class="imgDimensions">215x215</p></div></div></div></div><textarea class="form-control" placeholder="Your answer" name="sQuizAnswersDescription[0]['+questionIndex+']['+answerIndex+']"></textarea></div><div class="clearfix"></div><div class="panel-footer text-center"><div class="btn-group"><select class="selectpicker btn btn-default" name="sQuizAnswerResult[0]['+questionIndex+']['+answerIndex+']">'+allOptions+'</select><div class="removeOption pull-left">&nbsp;<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div></div></div>');
var countAnswers=$(this).parents(".embedQuizSlide").find('.optParent').length;
if(countAnswers > 1)
{
	$(this).parents(".embedQuizSlide").find('.answersLimitError').addClass('hide');
}
});
$(document).on('click','.removeOption',function(){
$(this).parents('.optParent').remove();
});
//******************************************************Add,Remove Question***********************************************\\
$(document).on('click','.addQuestions',function(){
incrementQuestionIndexes();
var questionIndex=$(this).attr('id');
questionIndex=parseInt(questionIndex)+1;
$(this).attr('id',questionIndex);
var countQuestions=$(this).parents('.slideHeader').find('.quizMain').length;
countQuestions=countQuestions+1;
allOptions='';
countResults=$(this).parents('.slideHeader').find('.myResNo').length;
for(i=1; i<=countResults; i++)
{
	allOptions +='<option value="'+i+'">Result '+i+'</option>';
}
$(this).parent().before('<div class="quizMain"><div class="removeQuestion text-right"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div><div class="clearfix"></div><h4>Question?</h4><div class="alert alert-danger answersLimitError hide"><i class="fa fa-times-circle"></i> Minimum 2 anwers required</div><div class="form-group"><div class=""><div class="input-group"><div class="input-group-addon questionno">Q '+countQuestions+'</div><input type="text" class="form-control" name="sQuizQuestion[0]['+questionIndex+']['+question+']" placeholder="Question Title(Optional)"></div></div></div><div class="quizz"><div class="form-group last row"><div class="col-xs-12"><div class="fileupload fileupload-new qpLarge" data-provides="fileupload"><div class="fileupload-new quizImg"></div><div class="fileupload-preview fileupload-exists quizQuestionImg quizImg" ></div><div class="questionImgParent"><span class="btn btn-white btn-file"><span class="fileupload-new"><i class="fa fa-camera"></i></span><p>Click to add image</p><span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span><input type="file" class="default" accept="image/jpg,image/png,image/jpeg,image/gif"/><input type="hidden" class="sQuizQuestionFile" name="sQuizQuestionFile[0]['+questionIndex+']['+question+']"></span><p class="error-msg label label-danger imgCardAlert sQuizQuestionFileError hide"><i class="fa fa-times-circle"></i> Empty or invalid dimensions</p><p class="imgDimensions">600x370</p></div></div></div></div></div><div class="clearfix"></div><div class="row"><div class="col-sm-6 optParent"><h4></h4><div class="panel addans"><div class="panel-body"><div class="form-group last row"><div class="col-xs-12"><div class="fileupload fileupload-new" data-provides="fileupload"><div class="fileupload-new quizImg"></div><div class="fileupload-preview fileupload-exists quizAnswerImg quizImg" ></div><div class="answerImgParent"><span class="btn btn-white btn-file"><span class="fileupload-new"><i class="fa fa-camera"></i></span><p>Click to add image</p><span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span><input type="file" class="default" accept="image/jpg,image/png,image/jpeg,image/gif"/><input type="hidden" class="sQuizAnswerFile" name="sQuizAnswerFile[0]['+questionIndex+']['+answer+']"></span><p class="error-msg label label-danger imgCardAlert sQuizAnswerFileError hide"><i class="fa fa-times-circle"></i> Empty or invalid dimensions</p><p class="imgDimensions">215x215</p></div></div></div></div><textarea class="form-control" placeholder="Your answer" name="sQuizAnswersDescription[0]['+questionIndex+']['+answer+']"></textarea></div><div class="clearfix"></div><div class="panel-footer text-center"><div class="btn-group"><select class="selectpicker btn btn-default" name="sQuizAnswerResult[0]['+questionIndex+']['+answer+']">'+allOptions+'</select><div class="removeOption pull-left">&nbsp;<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div></div></div><div class="col-xs-12"><button class="btn btn-success btn-block btn-lg addAnswers" id="'+questionIndex+'" data-id="0" type="button"><i class="fa fa-plus"></i> Add Answer</button></div></div></div>');
});
$(document).on('click','.removeQuestion',function(){
var ques=1;
$(this).parents('.slideHeader').find('.quizMain').not($(this).parent('.quizMain')).each(function (index, element){
	$(this).find('.questionno').text('Q '+ques)
	ques=ques+1;
})
$(this).parent().remove();
});
$(document).on('change','.slideType',function(){
var value=$(this).val();
if(value==1)
{
	$(this).parent().parent().next(".imageSlide").removeClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
else if(value==2)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").removeClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
else if(value==3)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").removeClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
else if(value==4)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").removeClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
else if(value==5)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").removeClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
else if(value==6)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").removeClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
else if(value==7)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").removeClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").removeClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
else if(value==8)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").removeClass('hide');
}
else if(value==0)
{
	$(this).parent().parent().next(".imageSlide").addClass('hide');
	$(this).parent().parent().next().next(".videoSlide").addClass('hide');
	$(this).parent().parent().next().next().next(".soundSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next(".embedSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next(".embedMapSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next(".embedIframeSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next(".embedPollSlide").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next(".optionsBtn").addClass('hide');
	$(this).parent().parent().next().next().next().next().next().next().next().next().next(".embedQuizSlide").addClass('hide');
}
});
</script>
    
<script>
function getDomainName(url) {
var match = url.match(/:\/\/(www[0-9]?\.)?(.[^/:]+)/i);
if (match != null && match.length > 2 && typeof match[2] === 'string' && match[2].length > 0) {
return match[2];
}
else {
	return null;
}
}
function submitFormValidation()
{
var isFormValid = true;
//Slide title validation
if ($.trim($('.slideTitle').val()).length < 10)
{
	isFormValid = false;
	$('.slideTitle').next('.slideTitleError').removeClass('hide').addClass('scrollToTarget');
}
else
{
	$('.slideTitle').next('.slideTitleError').addClass('hide').removeClass('scrollToTarget');
}
var slideType=$('.slideType').val();
//Slide image validation
if(slideType==1)
{
	if($('.sFile').val()=="")
	{
		isFormValid = false;
		$('.sFile').parent().next('.sFileError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.sFile').parent().next('.sFileError').addClass('hide').removeClass('scrollToTarget');
	}
}
//Slide videoUrl validation
if(slideType==2)
{
	var videoUrl=$.trim($('.slideVideourl').val());
	if(!validFacebookVideoUrl(videoUrl) && !validVimeoVideoUrl(videoUrl) && !validDailymotionVideoUrl(videoUrl) && !validVineVideoUrl(videoUrl) && !validInstagramVideoUrl(videoUrl) && !validYoutubeVideoUrl(videoUrl))
	{
		isFormValid = false;
		$('.slideVideourl').next().next('.slideVideourlError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.slideVideourl').next().next('.slideVideourlError').addClass('hide').removeClass('scrollToTarget');
	}
}
//Slide audioUrl validation
if($('.slideType').val()==3)
{
	var audioUrl=$.trim($('.slideAudiourl').val());
	if(!validSoundcloudUrl(audioUrl) && !validMixcloudUrl(audioUrl) && !validReverbnationUrl(audioUrl))
	{
		isFormValid = false;
		$('.slideAudiourl').next().next('.slideAudiourlError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.slideAudiourl').next().next('.slideAudiourlError').addClass('hide').removeClass('scrollToTarget');
	}
}
//Slide embedUrl validation
if(slideType==4)
{
	var embedUrl=$.trim($(this).find('.slideEmbedurl').val());
	if(!validGooglePostUrl(embedUrl) && !validTwitterPostUrl(embedUrl) && !validPinterestPostUrl(embedUrl) && !validInstagramPostUrl(embedUrl) && !validFacebookPostUrl(embedUrl) && !validImgurPostUrl(embedUrl) && !validFlickerPostUrl(embedUrl) && !validTwitchPostUrl(embedUrl) && !validDeviantartPostUrl(embedUrl))
	{
		isFormValid = false;
		$('.slideEmbedurl').next().next('.slideEmbedurlError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.slideEmbedurl').next().next('.slideEmbedurlError').addClass('hide').removeClass('scrollToTarget');
	}
}
//Slide embedMapUrl validation
if(slideType==5)
{
	var mapUrl=$.trim($('.slideMapurl').val());
	if(!validGoogleMapUrl(mapUrl) && !validBingMapUrl(mapUrl))
	{
		isFormValid = false;
		$('.slideMapurl').next().next('.slideMapurlError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.slideMapurl').next().next('.slideMapurlError').addClass('hide').removeClass('scrollToTarget');
	}
}
//Slide Iframe validation
if(slideType==6)
{
	var iframeValue=$.trim($('.slideIframe').val()).toLowerCase();
	if(iframeValue.indexOf("<iframe")==-1 || iframeValue.indexOf("src=")==-1 || iframeValue.indexOf("</iframe>")==-1)
	{
		isFormValid = false;
		$('.slideIframe').next('.slideIframurlError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.slideIframurlError').addClass('hide').removeClass('scrollToTarget');
	}
}
//Slide polls option count validation
if(slideType==7)
{
	if($('.embedPollSlide').find('.pollOptions').length < 2)
	{
		isFormValid = false;
		$('.embedPollSlide').find('.pollsLimitError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.embedPollSlide').find('.pollsLimitError').addClass('hide').removeClass('scrollToTarget');
	}
	$('.embedPollSlide').find('.pollOptionsFeild').each(function()
	{
		if($.trim($(this).val()).length < 3)
		{
			isFormValid = false;
			$(this).next('.slidePolloptionError').removeClass('hide').addClass('scrollToTarget');
		}
		else
		{
			$(this).next('.slidePolloptionError').addClass('hide').removeClass('scrollToTarget');
		}
	})
	//Slide pollimage validation
	if($.trim($('.embedPollSlide').find('.sPollFile').val())=="")
	{
		isFormValid = false;
		$('.embedPollSlide').find('.sPollFile').parent().next('.sPollFileError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.embedPollSlide').find('.sPollFile').parent().next('.sPollFileError').addClass('hide').removeClass('scrollToTarget');
	}
}
//Slide Quiz result title validation
if(slideType==8)
{
	if($('.slideHeader').find('.myResNo').length < 2)
	{
		isFormValid = false;
		$('.resultsLimitError').removeClass('hide');
	}
	else
	{
		$('.resultsLimitError').addClass('hide');
	}
	$('.embedQuizSlide').find(".slideQuizresultTitle").each(function()
	{
		if($.trim($(this).val()).length < 10)
		{
			isFormValid = false;
			$(this).parent().next('.slideQuizresultTitleError').removeClass('hide').addClass('scrollToTarget');
		}
		else
		{
			$(this).parent().next('.slideQuizresultTitleError').addClass('hide').removeClass('scrollToTarget');
		}
	});
	//Slide Quiz result description validation
	$('.embedQuizSlide').find(".slideQuizresultDescription").each(function()
	{
		if($.trim($(this).val()).length < 30)
		{
			isFormValid = false;
			$(this).next('.slideQuizresultDescriptionError').removeClass('hide').addClass('scrollToTarget');
		}
		else
		{
			$(this).next('.slideQuizresultDescriptionError').addClass('hide').removeClass('scrollToTarget');
		}
	});
	//Slide Quiz result image validation
	$('.embedQuizSlide').find(".sQuizResultFile").each(function()
	{
		if($.trim($(this).val())=="")
		{
			isFormValid = false;
			$(this).parent().next('.sQuizResultFileError').removeClass('hide').addClass('scrollToTarget');
		}
		else
		{
			$(this).parent().next('.sQuizResultFileError').addClass('hide').removeClass('scrollToTarget');
		}
	});
	//Slide Quiz result count validation
	if($('.embedQuizSlide').find('.myResNo').length < 2)
	{
		isFormValid = false;
		$(this).find('.resultsLimitError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$(this).find('.resultsLimitError').addClass('hide').removeClass('scrollToTarget');
	}
	//Slide Quiz question answers count validation
	$('.embedQuizSlide').find(".quizMain").each(function()
	{
		if($(this).find('.optParent').length < 2)
		{
			isFormValid = false;
			$(this).find('.answersLimitError').removeClass('hide').addClass('scrollToTarget');
		}
		else
		{
			$(this).find('.answersLimitError').addClass('hide').removeClass('scrollToTarget');
		}
	});
	//Slide Quiz question image validation
	$('.embedQuizSlide').find(".sQuizQuestionFile").each(function()
	{
		if($.trim($(this).val())=="")
		{
			isFormValid = false;
			$(this).parent().next('.sQuizQuestionFileError').removeClass('hide').addClass('scrollToTarget');
		}
		else
		{
			$(this).parent().next('.sQuizQuestionFileError').addClass('hide').removeClass('scrollToTarget');
		}
	});
	//Slide Quiz answers image validation
	$('.embedQuizSlide').find(".sQuizAnswerFile").each(function()
	{
		if($.trim($(this).val())=="")
		{
			isFormValid = false;
			$(this).parent().next('.sQuizAnswerFileError').removeClass('hide').addClass('scrollToTarget');
		}
		else
		{
			$(this).parent().next('.sQuizAnswerFileError').addClass('hide').removeClass('scrollToTarget');
		}
	});
}
//Slide title validation
if ($.trim($('.slideDescription').val()).length < 30)
{
	isFormValid = false;
	$('.slideDescription').next().next('.slideDescriptionError').removeClass('hide').addClass('scrollToTarget');
}
else
{
	$('.slideDescription').next().next('.slideDescriptionError').addClass('hide').removeClass('scrollToTarget');
}
if(isFormValid==false)
{
	if($(".scrollToTarget:first").parents('.slideTogglebox').css("display") == "none")
	{
		$(".scrollToTarget:first").parents('.slideTogglebox').prev().prev('.slideToggle').trigger("click");
	}
	
	$(".scrollToTarget:first").parents('.slideTogglebox').css("display", "block");
	$('html body').animate({scrollTop: $(".scrollToTarget:first").offset().top-200 }, 1000);
}
return isFormValid;
}
//***********************************************Each feild validation***************************************************\\
//Slide title validation
$(document).on("keyup",".slideTitle",function() {
if ($.trim($(this).val()).length < 10)
{
	$(this).next('.slideTitleError').removeClass('hide');
}
else
{
	$(this).next('.slideTitleError').addClass('hide');
}
});
//Slide description validation
$(document).on("keyup",".slideDescription",function() {
if ($.trim($(this).val()).length < 30)
{
	$(this).next().next('.slideDescriptionError').removeClass('hide');
}
else
{
	$(this).next().next('.slideDescriptionError').addClass('hide');
}
});
//Slide video url validation
$(document).on("blur",".slideVideourl",function() {
	var videoUrl=$(this).val();
	if(!validFacebookVideoUrl(videoUrl) && !validVimeoVideoUrl(videoUrl) && !validDailymotionVideoUrl(videoUrl) && !validVineVideoUrl(videoUrl) && !validInstagramVideoUrl(videoUrl) && !validYoutubeVideoUrl(videoUrl))
	{
		$(this).next().next('.slideVideourlError').removeClass('hide');
	}
	else
	{
		$(this).next().next('.slideVideourlError').addClass('hide');
	}
});
$(document).on("blur",".slideAudiourl",function() {
	var audioUrl=$(this).val();
	if(!validSoundcloudUrl(audioUrl) && !validMixcloudUrl(audioUrl) && !validReverbnationUrl(audioUrl))
	{
		$(this).next().next('.slideAudiourlError').removeClass('hide');
	}
	else
	{
		$(this).next().next('.slideAudiourlError').addClass('hide');
	}
});
//Slide embed url validation
$(document).on("blur",".slideEmbedurl",function() {
	var embedUrl=$(this).val();
	if(!validGooglePostUrl(embedUrl) && !validTwitterPostUrl(embedUrl) && !validPinterestPostUrl(embedUrl) && !validInstagramPostUrl(embedUrl) && !validFacebookPostUrl(embedUrl) && !validImgurPostUrl(embedUrl) && !validFlickerPostUrl(embedUrl) && !validTwitchPostUrl(embedUrl) && !validDeviantartPostUrl(embedUrl))
	{
		$(this).next().next('.slideEmbedurlError').removeClass('hide');
	}
	else
	{
		$(this).next().next('.slideEmbedurlError').addClass('hide');
	}
});
//Slide map url validation
$(document).on("blur",".slideMapurl",function() {
	var mapUrl=$(this).val();
	if(!validGoogleMapUrl(mapUrl) && !validBingMapUrl(mapUrl))
	{
		$(this).next().next('.slideMapurlError').removeClass('hide');
	}
	else
	{
		$(this).next().next('.slideMapurlError').addClass('hide');
	}
});
//Slide iframe validation
$(document).on("blur",".slideIframe",function() {
	var iframeValue=$.trim($('.slideIframe').val()).toLowerCase();
	if(iframeValue.indexOf("<iframe")==-1 || iframeValue.indexOf("src=")==-1 || iframeValue.indexOf("</iframe>")==-1)
	{
		isFormValid = false;
		$('.slideIframurlError').removeClass('hide').addClass('scrollToTarget');
	}
	else
	{
		$('.slideIframurlError').addClass('hide').removeClass('scrollToTarget');
	}
});
//Slide poll url validation
$(document).on("keyup",".pollOptionsFeild",function() {
if($.trim($(this).val()).length  < 3)
{
	$(this).next('.slidePolloptionError').removeClass('hide');
}
else
{
	$(this).next('.slidePolloptionError').addClass('hide');
}
});
//Slide quiz result validation
$(document).on("keyup",".slideQuizresultTitle",function() {
if($.trim($(this).val()).length < 10)
{
	$(this).parent().next('.slideQuizresultTitleError').removeClass('hide');
}
else
{
	$(this).parent().next('.slideQuizresultTitleError').addClass('hide');
}
});
//Slide quiz description validation
$(document).on("keyup",".slideQuizresultDescription",function() {
if($.trim($(this).val()).length < 30)
{
	$(this).next('.slideQuizresultDescriptionError').removeClass('hide');
}
else
{
	$(this).next('.slideQuizresultDescriptionError').addClass('hide');
}
});
//***************************************************Form Submission******************************************************\\
$("#submitPostForm").on("submit", function(event) {
event.preventDefault();
if(submitFormValidation()==true)
{
	$('#submitLoader').html('<div id="loading"><div id="loading-center"><div id="loading-center-absolute"><div class="cssload-container"><div class="cssload-speeding-wheel"></div></div></div></div></div>');
	/* $.ajax({
		url: "http://demo.nexthon.com/socialbuzz/admin/includes/submitSlideRequest.php",
		type: "POST",
		data: new FormData( this ),
		processData: false,
		contentType: false,
		dataType: "json",
		success: function(response) {
			if(response.error==1)
			{
				$('html body').animate({scrollTop: $("#dangerAlert").offset().top-500 }, 1000);
				$('#loading').fadeOut('slow',function(){$(this).remove();});
				$('#dangerAlert').removeClass('hide');
				$('.errorMsg').html(response.errorMsg);
			}
			else
			{
				window.location='slides.php?pid=151';
			}
		}
	}); */
}
});
</script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/bootoption.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>

<script>
	$('.selectpicker').selectpicker();
	$(".alert:not(.no-fadeOut):not(.alert-demo)").delay(3000).fadeOut("slow");
	$(".alert-demo").delay(7000).fadeOut("slow");
</script></body>
</html>