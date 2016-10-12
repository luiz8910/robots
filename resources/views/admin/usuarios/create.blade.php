<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.head')
</head>
<body>
<header>
    @include('admin.include.header')
</header>

<div id="wrapper">
    @include('admin.include.menu-lateral')

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2><i class="fa fa-user" aria-hidden="true"></i> Add Usuário </h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.html">Dashbord</a></li>
                        <li><a href="listar-usuarios.html">Usuário</a></li>
                        <li class="active">Add Usuário </li>
                    </ol>
                    <div class="separador-1"></div> <!-- fim div .separador-1 -->

                    <!-- Alertas da pagina -->
                    <div class="alert alert-success alert-dismissible" role="alert" hidden>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Tudo certo!</strong>
                        Suas alterações foram salvas!
                        <strong>:)</strong>
                    </div><!-- fim div .alert.alert-success.alert-dismissible -->
                    <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Ops!</strong>
                        Algo deu errado, volte e arrume os campos abaixo!
                        <strong>:(</strong>
                    </div><!-- fim div .alert.alert-danger.alert-dismissible -->

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Revise os campos abaixo.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <?php $error = str_replace('name', 'nome', $error); ?>
                                    <?php $error = str_replace('password', 'senha', $error); ?>
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    <!-- FIM Alertas da pagina -->

                    <div class="row">

                        <div class="col-md-6 col-sm-12">

                            {!! Form::open(['route' => 'admin.usuarios.store', 'method' => 'post', 'role' => 'form']) !!}

                                {{--<div class="form-group">--}}

                                    {{--<label for="exampleInputFile">Imagem (Foto do Usuário)</label>--}}

                                    {{--<input type="file" id="exampleInputFile">--}}

                                    {{--<p class="text-info">--}}

                                        {{--<i class="fa fa-question-circle " aria-hidden="true"></i>--}}

                                        {{--A foto para o Usuário deve conter o tamanho de 500px X 600px!--}}
                                    {{--</p>--}}

                                {{--</div>--}}

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Nome do Usuário</label>

                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nome do Usuário" value="{{ old('name') }}">

                                    <p class="text-info">

                                        <i class="fa fa-question-circle " aria-hidden="true"></i>

                                        O campo acima deve conter o nome do funcionário!

                                    </p>

                                </div><!-- fim div .input-group -->

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Email</label>

                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}">

                                    <p class="text-info">

                                        <i class="fa fa-question-circle " aria-hidden="true"></i>

                                        O campo acima deve conter o email do funcionário!

                                    </p>

                                </div><!-- fim div .input-group -->

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Senha</label>

                                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Entre com a senha">

                                    <p class="text-info">

                                        <i class="fa fa-question-circle " aria-hidden="true"></i>

                                        O campo acima deve conter a senha do funcionário!

                                    </p>

                                </div><!-- fim div .input-group -->

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Confirmar Senha</label>

                                    <input type="password" class="form-control" name="password_confirmation" id="exampleInputEmail1" placeholder="Confirme a senha">

                                    <p class="text-info">

                                        <i class="fa fa-question-circle " aria-hidden="true"></i>

                                        Confirme a senha do funcionário!

                                    </p>

                                </div><!-- fim div .input-group -->

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Função do Usuário</label>

                                    <select class="form-control" name="role" required>

                                        <option value="">Selecione</option>

                                        <option value="Administrador">Administrador</option>

                                        <option value="Editor">Editor</option>

                                        <option value="Operador">Operador</option>

                                    </select>

                                    <p class="text-info">

                                        <i class="fa fa-question-circle " aria-hidden="true"></i>

                                        O campo acima você deve selecionar a função administrativa dentro do site!
                                    </p>

                                </div><!-- fim div .input-group -->

                                <br>

                                <button type="submit" class="btn btn-success" id="subir">

                                    <i class="fa fa-check-square-o"></i>

                                    Salvar

                                </button>

                            {!! Form::close() !!}

                        </div><!-- fim div .col-md-12 -->

                    </div><!-- fim div .row -->

                </div> <!-- fim div .col-lg-12 -->

            </div>  <!-- fim div .row -->

        </div> <!-- fim div .container-fluid -->

    </div> <!-- fim div #page-content-wrapper -->
    <!-- fim Page Content -->
</div>  <!-- fim div #wrapper -->

<!-- footer -->
<footer class="bg-footer">
    <div class="container">
        <div class="row">

        </div> <!-- fim div row -->
    </div> <!-- fim div .container -->
</footer>
<!-- fim footer -->
</body>
</html>