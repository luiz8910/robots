<!DOCTYPE html>
<html>
<head>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="../login/assets/js/jasny-bootstrap.min.js"></script>


    <!-- Bootstrap -->
    <link href="../login/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../login/assets/css/color.css" rel="stylesheet">
    <link href="../login/assets/css/jasny-bootstrap.css" rel="stylesheet">

    <!-- folha de estilo customizado -->
    <link href="../login/assets/css/style.css" rel="stylesheet">

    <!-- folha de estilo FontAwesome -->
    <link rel="stylesheet" href="../assets/font/font-awesome-4.6.3/css/font-awesome.min.css">

    <script src="../assets/js/scripts.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</head>

<body class="bg-body">
<div class="bg-body">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0 div-central bg-area">
                <div class="ajust-tela ">
                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                        <h1 class="color-text-header ajuste-text-header">Recuperar Senha</h1>
                        <br>
                        <div class="form-group has-success has-feedback">
                            <label class="control-label" for="inputSuccess2">Digite abaixo seu email</label>
                            <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input type="email" class="form-control" id="inputGroupSuccess1"
                                       name="email" value="{{ old('email') }}" aria-describedby="inputGroupSuccess1Status">
                            </div>
                            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                            <span id="inputGroupSuccess1Status" class="sr-only">(successo)</span>
                        </div>

                        <div class="row">
                            <a type="button" class="btn btn-link" href="{{ url('auth/login') }}">Voltar para tela de
                                login.</a>
                        </div><!-- div /.row -->
                        <br>
                        <button type="submit" class="btn btn-success btn-block" style="margin-bottom: 10px;">Enviar</button>

                        @if($errors->any)
                            @foreach($errors->all() as $e)
                                <?php
                                    $e = str_replace("We can't find a user with that e-mail address.",
                                        'O email informado não existe', $e);

                                    $e = str_replace('The email must be a valid email address.',
                                            'O email informado não está num formato válido', $e);
                                ?>
                                <p>{{ $e }}</p>
                            @endforeach
                        @endif
                    </form>
                </div><!-- div /.ajust-tela -->
            </div> <!-- div/.col-md-12.col-sm-12.col-xs-12  -->
        </div> <!-- div /.row -->
    </div><!-- /.container -->
</div>
</body>
</html>

{{--<div class="container-fluid">--}}
{{--<div class="row">--}}
{{--<div class="col-md-8 col-md-offset-2">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Reset Password</div>--}}
{{--<div class="panel-body">--}}
{{--@if (session('status'))--}}
{{--<div class="alert alert-success">--}}
{{--{{ session('status') }}--}}
{{--</div>--}}
{{--@endif--}}

{{--@if (count($errors) > 0)--}}
{{--<div class="alert alert-danger">--}}
{{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--<ul>--}}
{{--@foreach ($errors->all() as $error)--}}
{{--<li>{{ $error }}</li>--}}
{{--@endforeach--}}
{{--</ul>--}}
{{--</div>--}}
{{--@endif--}}

{{--form aqui--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


{{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">--}}
{{--{!! csrf_field() !!}--}}

{{--<div class="form-group">--}}
{{--<label class="col-md-4 control-label">E-Mail Address</label>--}}
{{--<div class="col-md-6">--}}
{{--<input type="email" class="form-control" name="email" value="{{ old('email') }}">--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-6 col-md-offset-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Send Password Reset Link--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
