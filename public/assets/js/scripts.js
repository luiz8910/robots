/**
 * Created by luizfernandosanches on 19/09/16.
 */

$(function () {


    $('#editQS').submit(function () {
        $('#error li').remove();

        var description = $('#description').val();
        var whyUS = $('#whyUS').val();
        var vision = $('#vision').val();
        var ourValues = $('#ourValues').val();
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

        if(!fail)
        {
            id = 1;
            var form = [description, whyUS, ourValues, vision];

            var request = $.ajax({
                url: 'alterar-quem-somos/' + id + '-' + form,
                method: 'POST',
                data: form,
                dataType: 'json'
            });

            request.done(function(e){
                console.log('done');
            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);
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
    })
});
