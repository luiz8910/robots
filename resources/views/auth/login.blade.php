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
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </head>

    <body class="bg-body">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0 div-central bg-area">
                    <div class="ajust-tela ">
                        <h1 class="color-text-header ajuste-text-header">Login</h1>

                        <form role="form" method="POST" action="{{ url('/auth/login') }}">
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <span class="input-group-addon">Email</span>
                                    <input type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
                                </div>
                                {{--<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>--}}
                                {{--<span id="inputGroupSuccess1Status" class="sr-only">(successo)</span>--}}
                            </div> <!-- div /.form-group.has-success.has-feedback -->

                            <div class="form-group has-feedback">
                                <div class="input-group" id="div-password">
                                    <span class="input-group-addon">Senha</span>
                                    <input type="password" class="form-control" name="password" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
                                </div>
                                {{--<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>--}}
                                {{--<span id="inputGroupSuccess1Status" class="sr-only">(Erro)</span>--}}
                            </div>
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkboxSuccess" name="remember">
                                        Manter-me conectado.
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <a type="button" class="btn btn-link" href="{{ url('/password/email') }}">Perdeu Sua Senha? clique aqui</a>
                            </div><!-- div /.row -->
                            <br>
                            <button type="submit" class="btn btn-success btn-block" style="margin-bottom: 10px;">Login</button>

                            @if($errors->any)
                                @foreach($errors->all() as $e)
                                    <?php $e = str_replace('These credentials do not match our records.',
                                            'Os dados informados não correspondem a nossa base de dados', $e); ?>
                                    <p>{{ str_replace('password', 'senha', $e) }}</p>
                                @endforeach
                            @endif
                        </form>

                    </div><!-- div /.ajust-tela -->
                </div> <!-- div/.col-md-12.col-sm-12.col-xs-12  -->
            </div> <!-- div /.row -->
        </div><!-- /.container -->
    </body>

</html>












{{--<div class="container-fluid">--}}
	{{--<div class="row">--}}
		{{--<div class="col-md-8 col-md-offset-2">--}}
			{{--<div class="panel panel-default">--}}
				{{--<div class="panel-heading">Login</div>--}}
				{{--<div class="panel-body">--}}
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

					{{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">--}}
						{{--{!! csrf_field() !!}--}}

						{{--<div class="form-group">--}}
							{{--<label class="col-md-4 control-label">E-Mail Address</label>--}}
							{{--<div class="col-md-6">--}}
								{{--<input type="email" class="form-control" name="email" value="{{ old('email') }}">--}}
							{{--</div>--}}
						{{--</div>--}}

						{{--<div class="form-group">--}}
							{{--<label class="col-md-4 control-label">Password</label>--}}
							{{--<div class="col-md-6">--}}
								{{--<input type="password" class="form-control" name="password">--}}
							{{--</div>--}}
						{{--</div>--}}

						{{--<div class="form-group">--}}
							{{--<div class="col-md-6 col-md-offset-4">--}}
								{{--<div class="checkbox">--}}
									{{--<label>--}}
										{{--<input type="checkbox" name="remember"> Remember Me--}}
									{{--</label>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}

						{{--<div class="form-group">--}}
							{{--<div class="col-md-6 col-md-offset-4">--}}
								{{--<button type="submit" class="btn btn-primary">Login</button>--}}

								{{--<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</form>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

