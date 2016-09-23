/**
 * Created by luizfernandosanches on 19/09/16.
 */

$(function () {


    $('#editQS').submit(function () {
        var form = $(this).serialize();

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
            var request = $.ajax({
                url: 'alterar-quem-somos',
                method: 'POST',
                data: form,
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
                $('#error').append('<li>Verifique sua conexão com a internet e tente novamente</li>');
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
                console.log('done');
                if(e.status)
                {
                    $('#newsletterSuccess').html('Seu email foi inserido com sucesso');
                }else{
                    $('#newsletterSuccess').html('Este Email já existe na nossa base de dados');
                }

            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);
                $('#newsletterSuccess').html('Insira um email válido');
            })
        }
        return false;
    });




    //var form;


    //$('#imgEmployee').change(function (e) {
    //    form = new FormData();
    //
    //    form.append('img', this.files[0], 'teste.jpg');
    //});
    //
    //
    //$('#formTeam').submit(function(e){
    //    var file = $('#imgEmployee');
    //
    //    var request = $.ajax({
    //        url: 'uploadTeamInfo/'+file, // Url do lado server que vai receber o arquivo
    //        data: form,
    //        processData: false,
    //        contentType: false,
    //        method: 'POST'
    //    });
    //
    //    request.done(function (e) {
    //       console.log('done');
    //    });
    //
    //    request.fail(function(e){
    //        console.log('fail');
    //        console.log(e);
    //    });
    //
    //    return false;
    //
    //    //alert('form');
    //
    //    //var img = $('#imgEmployee');
    //
    //    //var file = img.file;
    //
    //    //// Set up the request.
    //    //var xhr = new XMLHttpRequest();
    //    //
    //    //// Open the connection.
    //    //xhr.open('POST', 'uploadTeamInfo/'+file, true);
    //    //
    //    //// Set up a handler for when the request finishes.
    //    //xhr.onload = function () {
    //    //    if (xhr.status === 200) {
    //    //        // File(s) uploaded.
    //    //        alert('OK!');
    //    //    } else {
    //    //        alert('An error occurred!');
    //    //    }
    //    //};
    //    //
    //    //// Send the Data.
    //    //xhr.send(formData);
    //});
});
