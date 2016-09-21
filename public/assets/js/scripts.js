/**
 * Created by luizfernandosanches on 19/09/16.
 */

$(function () {


    $('#editQS').submit(function () {
        $('#error li').remove();
        $('#alert-danger').css('display', 'none');
        $('#alert-success').css('display', 'none');

        var description = $('#description').val();
        var whyUS = $('#whyUS').val();
        var vision = $('#vision').val();
        var ourValues = $('#ourValues').val();
        var linkVideo = $('#linkVideo').val();
        var scr = false; //usado para controlar o scroll
        var fail = false;

        if(!description)
        {
            $('#alert-danger').css('display', 'block');
            $('#error').append('<li>O Campo descrição não foi preenchido</li>');
            fail = true;

            if (!scr)
            {
                scr = true;
                scroll();
            }

        }

        if(!whyUS)
        {
            $('#alert-danger').css('display', 'block');
            $('#error').append('<li>O Campo Por que nos escolher não foi preenchido</li>');
            fail = true;

            if (!scr)
            {
                scr = true;
                scroll();
            }
        }

        if(!vision)
        {
            $('#alert-danger').css('display', 'block');
            $('#error').append('<li>O Campo Visão não foi preenchido</li>');
            fail = true;

            if (!scr)
            {
                scr = true;
                scroll();
            }
        }

        if (!ourValues)
        {
            $('#alert-danger').css('display', 'block');
            $('#error').append('<li>O Campo Nossos valores não foi preenchido</li>');
            fail = true;

            if (!scr)
            {
                scr = true;
                scroll();
            }
        }

        if (!linkVideo)
        {
            $('#alert-danger').css('display', 'block');
            $('#error').append('<li>O Campo link do video não foi preenchido</li>');
            fail = true;

            if (!scr)
            {
                scr = true;
                scroll();
            }
        }

        if(!fail)
        {
            id = 1;


            linkVideo = linkVideo.replace(/\?/g, ';');
            linkVideo = linkVideo.replace(/watch;v=/g, 'v/');
            linkVideo = linkVideo.replace(/\//g, '-');

            var form = [];

            form[0] = description;
            form[1] = whyUS;
            form[2] = ourValues;
            form[3] = vision;
            form[4] = linkVideo;

            var jObj = {};

            for(i in form)
            {
                jObj['index'+i] =  form[i];
            }

            jObj = JSON.stringify(jObj);

            var request = $.ajax({
                url: 'alterar-quem-somos/'+jObj,
                method: 'POST',
                data: {jObj: jObj},
                dataType: 'json'
            });

            request.done(function(e){
                console.log('done');

                $('#alert-success').css('display', 'block');
                scroll();
            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);
                $('#alert-danger').css('display', 'block');
                $('#error').append('<li>Os campos não aceitam ? (ponto de interrogação)</li>');
                scroll();
            })
        }

        return false;
   });

    function scroll()
    {
        $('html, body').animate({
            scrollTop: 100
        }, 1000);
    }
    
    $('#closeAlert').click(function () {
        $('#alert-danger').fadeOut(1000);
    });

    $('#closeAlertSuccess').click(function(){
        $('#alert-success').fadeOut(1000);
    });

    $('#newsletter').submit(function () {
       var email = $('#email').val();

        if(!email)
        {
            $('#newsletterSuccess').html('Insira um email válido');
        }
        else{
            var request = $.ajax({
                url: 'newsletter/'+email,
                method: 'POST',
                data: email,
                dataType: 'json'
            });

            request.done(function (e) {
                $('#newsletterSuccess').html('Seu email foi inserido com sucesso');
            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);
                $('#newsletterSuccess').html('Insira um email válido');
            })
        }
        return false;
    });
});
