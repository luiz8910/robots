!function ($) {

  "use strict"; // jshint ;_

 /* FILEUPLOAD PUBLIC CLASS DEFINITION
  * ================================= */

  var Fileupload = function (element, options) {
    this.$element = $(element)
    this.type = this.$element.data('uploadtype') || (this.$element.find('.quizImg').length > 0 ? "image" : "file")
      
    this.$input = this.$element.find(':file')
    if (this.$input.length === 0) return

    this.name = this.$input.attr('name') || options.name

    this.$hidden = this.$element.find('input[type=hidden][name="'+this.name+'"]')
    if (this.$hidden.length === 0) {
      this.$hidden = $('<input type="hidden" />')
      this.$element.prepend(this.$hidden)
    }

    this.$preview = this.$element.find('.fileupload-preview')
    var height = this.$preview.css('height')
    if (this.$preview.css('display') != 'inline' && height != '0px' && height != 'none') this.$preview.css('line-height', height)

    this.original = {
      'exists': this.$element.hasClass('fileupload-exists'),
      'preview': this.$preview.html(),
      'hiddenVal': this.$hidden.val()
    }
    
    this.$remove = this.$element.find('[data-dismiss="fileupload"]')

    this.$element.find('[data-trigger="fileupload"]').on('click.fileupload', $.proxy(this.trigger, this))

    this.listen()
  }
  
  Fileupload.prototype = {
    
    listen: function() {
      this.$input.on('change.fileupload', $.proxy(this.change, this))
      $(this.$input[0].form).on('reset.fileupload', $.proxy(this.reset, this))
      if (this.$remove) this.$remove.on('click.fileupload', $.proxy(this.clear, this))
    },
    
    change: function(e, invoked) {
      var file = e.target.files !== undefined ? e.target.files[0] : (e.target.value ? { name: e.target.value.replace(/^.+\\/, '') } : null)
      if (invoked === 'clear') return
      
      if (!file) {
        this.clear()
        return
      }
      
      this.$hidden.val('')
      this.$hidden.attr('name', '')
      this.$input.attr('name', this.name)

      if (this.type === "image" && this.$preview.length > 0 && (typeof file.type !== "undefined" ? file.type.match('image.*') : file.name.match('\\.(gif|png|jpe?g)$')) && typeof FileReader !== "undefined") {
        var reader = new FileReader()
        var preview = this.$preview
        var element = this.$element
		var imageSize=file.size;
        reader.onload = function(e) {
			var image = new Image();
			image.src = e.target.result;

			image.onload = function()
			{
				//Upload Article File
				if(preview.hasClass('articleImg') && image.width >= articleImageWidth && image.height >= articleImageHeight && imageSize < maxSize)
				{
					var articleImg='';
					preview.html('<img src="' + e.target.result + '" ' + (preview.css('max-height') != 'none' ? 'style="max-height: ' + preview.css('max-height') + ';"' : '') + ' />');
					element.addClass('fileupload-exists').removeClass('fileupload-new');
					//Show progressbar
					preview.next('.articleImgParent').after('<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					//Hide error msg
					preview.next('.articleImgParent').find('.articleImageError').addClass('hide');
					articleImg=e.target.result;
					$.ajax({
						type:"POST",    	
						url: ROOTPATH+"/uploadImage.php",	
						data: {'articleImg':articleImg},			
						success: function(ajaxresult)
						{
							//Assign value
							var previousUploadedImage=$('input[name="articleImage"]').val();
							//unlink previous
							if(page=='edit')
							{
								pushInArray(previousUploadedImage,'articlesImages');
							}
							else
							{
								unlinkImage(previousUploadedImage,'');
							}
							$('input[name="articleImage"]').val(ajaxresult);
							//Remove Progressbar
							preview.next().next('.progress').remove();
						},
						xhr: function()
						{
							var xhr = $.ajaxSettings.xhr() ;
							xhr.upload.onprogress = function(evt)
							{
								var  width = (evt.loaded/evt.total)*100;
								$(".progress-bar").css("width",width+'%');
							};
							return xhr ;
						}		
					});
				}
				else if(preview.hasClass('articleImg'))
				{
					//Show error msg
					preview.next('.articleImgParent').find('.articleImageError').removeClass('hide');
				}
				//Upload Slide File
				if(preview.hasClass('slideImg') && image.width >= slideImageWidth && image.height >= slideImageHeight && imageSize < maxSize)
				{
					var slideFeildName='';
					var slideImg='';
					preview.html('<img src="' + e.target.result + '" ' + (preview.css('max-height') != 'none' ? 'style="max-height: ' + preview.css('max-height') + ';"' : '') + ' />');
					element.addClass('fileupload-exists').removeClass('fileupload-new');
					//Show progressbar
					preview.next('.slideImgParent').after('<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					//Hide error msg
					preview.next('.slideImgParent').find('.sFileError').addClass('hide');
					slideImg=e.target.result;
					$.ajax({
						type:"POST",    	
						url: ROOTPATH+"/uploadImage.php",	
						data: {'slideImg':slideImg},			
						success: function(ajaxresult)
						{
							//Assign value
							slideFeildName=preview.next('.slideImgParent').find('.sFile').attr('name');
							var previousUploadedImage=$('input[name="'+slideFeildName+'"]').val();
							//unlink previous
							if(page=='edit')
							{
								pushInArray(previousUploadedImage,'');
							}
							else
							{
								unlinkImage(previousUploadedImage,'');
							}
							$('input[name="'+slideFeildName+'"]').val(ajaxresult);
							//Remove Progressbar
							preview.next().next('.progress').remove();
						},
						xhr: function()
						{
							var xhr = $.ajaxSettings.xhr() ;
							xhr.upload.onprogress = function(evt)
							{
								var  width = (evt.loaded/evt.total)*100;
								$(".progress-bar").css("width",width+'%');
							};
							return xhr ;
						}		
					});
				}
				else if(preview.hasClass('slideImg'))
				{
					//Show error msg
					preview.next('.slideImgParent').find('.sFileError').removeClass('hide');
				}
				//Upload Poll File
				if(preview.hasClass('pollImg') && image.width >= slideImageWidth && image.height >= slideImageHeight && imageSize < maxSize)
				{
					var pollFeildName='';
					var pollImg='';
					preview.html('<img src="' + e.target.result + '" ' + (preview.css('max-height') != 'none' ? 'style="max-height: ' + preview.css('max-height') + ';"' : '') + ' />');
					element.addClass('fileupload-exists').removeClass('fileupload-new');
					//Show progressbar
					preview.next('.pollImgParent').after('<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					//Hide error msg
					preview.next('.pollImgParent').find('.sPollFileError').addClass('hide');
					pollImg=e.target.result;
					$.ajax({
						type:"POST",    	
						url: ROOTPATH+"/uploadImage.php",	
						data: {'pollImg':pollImg},			
						success: function(ajaxresult)
						{
							//Assign value
							pollFeildName=preview.next('.pollImgParent').find('.sPollFile').attr('name');
							var previousUploadedImage=$('input[name="'+pollFeildName+'"]').val();
							//unlink previous
							if(page=='edit')
							{
								pushInArray(previousUploadedImage,'');
							}
							else
							{
								unlinkImage(previousUploadedImage,'');
							}
							$('input[name="'+pollFeildName+'"]').val(ajaxresult);
							//Remove Progressbar
							preview.next().next('.progress').remove();
						},
						xhr: function()
						{
							var xhr = $.ajaxSettings.xhr() ;
							xhr.upload.onprogress = function(evt)
							{
								var  width = (evt.loaded/evt.total)*100;
								$(".progress-bar").css("width",width+'%');
							};
							return xhr ;
						}		
					});
				}
				else if(preview.hasClass('pollImg'))
				{
					//Show error msg
					preview.next('.pollImgParent').find('.sPollFileError').removeClass('hide');
				}
				if(preview.hasClass('quizResultImg') && image.width >= resultImageWidth && image.height >= resultImageHeight && imageSize < maxSize)
				{
					var resultFeildName='';
					var resultImg='';
					preview.html('<img src="' + e.target.result + '" ' + (preview.css('max-height') != 'none' ? 'style="max-height: ' + preview.css('max-height') + ';"' : '') + ' />');
					element.addClass('fileupload-exists').removeClass('fileupload-new');
					//Show progressbar
					preview.next('.resultImgParent').after('<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					//Hide error msg
					preview.next('.resultImgParent').find('.sQuizResultFileError').addClass('hide');
					resultImg=e.target.result;
					$.ajax(
					{
						type:"POST",    	
						url: ROOTPATH+"/uploadImage.php",	
						data: {'resultImg':resultImg},			
						success: function(ajaxresult)
						{
							//Assign value
							var previousUploadedImage=preview.next('.resultImgParent').find('.sQuizResultFile').attr('value');
							//unlink previous
							if(page=='edit')
							{
								pushInArray(previousUploadedImage,'resultsImages');
							}
							else
							{
								unlinkImage(previousUploadedImage,'resultsImages');
							}
							preview.next('.resultImgParent').find('.sQuizResultFile').attr('value',ajaxresult);
							//Remove Progressbar
							preview.next().next('.progress').remove();
						},
						xhr: function()
						{
							var xhr = $.ajaxSettings.xhr() ;
							xhr.upload.onprogress = function(evt)
							{
								var  width = (evt.loaded/evt.total)*100;
								$(".progress-bar").css("width",width+'%');
							};
							return xhr ;
						}
					});
				}
				else if(preview.hasClass('quizResultImg'))
				{
					//Show error msg
					preview.next('.resultImgParent').find('.sQuizResultFileError').removeClass('hide');
				}
				if(preview.hasClass('quizQuestionImg') && image.width >= questionImageWidth && image.height >= questionImageHeight && imageSize < maxSize)
				{
					var questionFeildName='';
					var questionImg='';
					preview.html('<img src="' + e.target.result + '" ' + (preview.css('max-height') != 'none' ? 'style="max-height: ' + preview.css('max-height') + ';"' : '') + ' />');
					element.addClass('fileupload-exists').removeClass('fileupload-new');
					//Show progressbar
					preview.next('.questionImgParent').after('<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					//Hide error msg
					preview.next('.questionImgParent').find('.sQuizQuestionFileError').addClass('hide');
					questionImg=e.target.result;
					$.ajax(
					{
						type:"POST",    	
						url: ROOTPATH+"/uploadImage.php",	
						data: {'questionImg':questionImg},			
						success: function(ajaxresult)
						{
							//Assign value
							questionFeildName=preview.next('.questionImgParent').find('.sQuizQuestionFile').attr('name');
							var previousUploadedImage=$('input[name="'+questionFeildName+'"]').val();
							//unlink previous
							if(page=='edit')
							{
								pushInArray(previousUploadedImage,'questionsImages');
							}
							else
							{
								unlinkImage(previousUploadedImage,'questionsImages');
							}
							//Asign new value
							$('input[name="'+questionFeildName+'"]').val(ajaxresult);
							//Remove Progressbar
							preview.next().next('.progress').remove();
						},
						xhr: function()
						{
							var xhr = $.ajaxSettings.xhr() ;
							xhr.upload.onprogress = function(evt)
							{
								var  width = (evt.loaded/evt.total)*100;
								$(".progress-bar").css("width",width+'%');
							};
							return xhr ;
						}
					});
				}
				else if(preview.hasClass('quizQuestionImg'))
				{
					//Show error msg
					preview.next('.questionImgParent').find('.sQuizQuestionFileError').removeClass('hide');
				}
				if(preview.hasClass('quizAnswerImg') && image.width >= answerImageWidth && image.height >= answerImageHeight && imageSize < maxSize)
				{
					var answerFeildName='';
					var answerImg='';
					preview.html('<img src="' + e.target.result + '" ' + (preview.css('max-height') != 'none' ? 'style="max-height: ' + preview.css('max-height') + ';"' : '') + ' />');
					element.addClass('fileupload-exists').removeClass('fileupload-new');
					preview.next('.answerImgParent').after('<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					//Hide error msg
					preview.next('.answerImgParent').find('.sQuizAnswerFileError').addClass('hide');
					answerImg=e.target.result;
					$.ajax(
					{
						type:"POST",    	
						url: ROOTPATH+"/uploadImage.php",	
						data: {'answerImg':answerImg},			
						success: function(ajaxresult)
						{
							//Assign value
							answerFeildName=preview.next('.answerImgParent').find('.sQuizAnswerFile').attr('name');
							var previousUploadedImage=$('input[name="'+answerFeildName+'"]').val();
							//unlink previous
							if(page=='edit')
							{
								pushInArray(previousUploadedImage,'optionsImages');
							}
							else
							{
								unlinkImage(previousUploadedImage,'optionsImages');
							}
							$('input[name="'+answerFeildName+'"]').val(ajaxresult);
							//Remove Progressbar
							preview.next().next('.progress').remove();
						},
						xhr: function()
						{
							var xhr = $.ajaxSettings.xhr() ;
							xhr.upload.onprogress = function(evt)
							{
								var  width = (evt.loaded/evt.total)*100;
								$(".progress-bar").css("width",width+'%');
							};
							return xhr ;
						}
					});
				}
				else if(preview.hasClass('quizAnswerImg'))
				{
					//Show error msg
					preview.next('.answerImgParent').find('.sQuizAnswerFileError').removeClass('hide');
				}
			};
        }

        reader.readAsDataURL(file)
      } else {
        this.$preview.text(file.name)
        this.$element.addClass('fileupload-exists').removeClass('fileupload-new')
      }
    },

    clear: function(e) {
      this.$hidden.val('')
      this.$hidden.attr('name', this.name)
      this.$input.attr('name', '')

      //ie8+ doesn't support changing the value of input with type=file so clone instead
      if($.browser.msie){
          var inputClone = this.$input.clone(true);
          this.$input.after(inputClone);
          this.$input.remove();
          this.$input = inputClone;
      }else{
          this.$input.val('')
      }

      this.$preview.html('')
      this.$element.addClass('fileupload-new').removeClass('fileupload-exists')

      if (e) {
        this.$input.trigger('change', [ 'clear' ])
        e.preventDefault()
      }
    },
    
    reset: function(e) {
      this.clear()
      this.$hidden.val(this.original.hiddenVal)
      this.$preview.html(this.original.preview)
      
      if (this.original.exists) this.$element.addClass('fileupload-exists').removeClass('fileupload-new')
       else this.$element.addClass('fileupload-new').removeClass('fileupload-exists')
    },
    
    trigger: function(e) {
      this.$input.trigger('click')
      e.preventDefault()
    }
  }

  
 /* FILEUPLOAD PLUGIN DEFINITION
  * =========================== */

  $.fn.fileupload = function (options) {
    return this.each(function () {
      var $this = $(this)
      , data = $this.data('fileupload')
      if (!data) $this.data('fileupload', (data = new Fileupload(this, options)))
      if (typeof options == 'string') data[options]()
    })
  }

  $.fn.fileupload.Constructor = Fileupload


 /* FILEUPLOAD DATA-API
  * ================== */

  $(function () {
    $('body').on('click.fileupload.data-api', '[data-provides="fileupload"]', function (e) {
      var $this = $(this)
      if ($this.data('fileupload')) return
      $this.fileupload($this.data())
      
      var $target = $(e.target).is('[data-dismiss=fileupload],[data-trigger=fileupload]') ?
        $(e.target) : $(e.target).parents('[data-dismiss=fileupload],[data-trigger=fileupload]').first()
      if ($target.length > 0) {
          $target.trigger('click.fileupload')
          e.preventDefault()
      }
    })
  })
}(window.jQuery);
function unlinkImage(filename,foldername)
{
	$.post(ROOTPATH+"/uploadImage.php",{ unlink:'1',file:filename,folder:foldername},function(ajaxresult){
	});
}
function pushInArray(filename,foldername)
{
	$.post(ROOTPATH+"/uploadImage.php",{ push:'1',file:filename,folder:foldername},function(ajaxresult){
	});
}