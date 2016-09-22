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
                    <h2><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Funcionário </h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashbord</a></li>
                        <li><a href="#">Pagina Quem Somos</a></li>
                        <li><a href="#">Quem Somos</a></li>
                        <li class="active">Add Funcionário</li>
                    </ol>
                    <div class="separador-1"></div> <!-- fim div .separador-1 -->

                    <!-- Alertas da pagina -->
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Tudo certo!</strong>
                        Suas alterações foram salvas!
                        <strong>:)</strong>
                    </div><!-- fim div .alert.alert-success.alert-dismissible -->


                        @if($errors->any())
                            {{--<div class="alert alert-danger alert-dismissible" role="alert">--}}
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            {{--</div><!-- fim div .alert.alert-danger.alert-dismissible -->--}}
                        @endif
                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                            {{--<span aria-hidden="true">&times;</span>--}}
                        {{--</button>--}}
                        {{--<strong>Ops!</strong>--}}
                        {{--Algo deu errado, volte e arrume os campos abaixo!--}}
                        {{--<strong>:(</strong>--}}


                    <!-- FIM Alertas da pagina -->

                    <div class="row">
                        {!! Form::open(['route' => 'admin.equipe.store']) !!}
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputFile">Imagem (Foto do funcionário)</label>
                                    <input type="file" name="img" id="exampleInputFile">
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        A foto para o funcionário deve conter o tamanho de 500PX x 600PX!
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome do funcionário</label>
                                    <input type="text" name="nome" class="form-control" id="exampleInputEmail1" value="{{ old('nome') }}"
                                           placeholder="Nome do funciário">
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        O campo acima deve conter o nome do funcionário!
                                    </p>
                                </div><!-- fim div .input-group -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cargo do funcionário</label>
                                    <input type="text" name="cargo" class="form-control" id="exampleInputEmail1" value="{{ old('cargo') }}"
                                           placeholder="Cargo do seu funciário">
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        O campo acima deve conter o Cargo do funcionário!
                                    </p>
                                </div><!-- fim div .input-group -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook do Funcionario</label>
                                    <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" value="{{ old('facebook') }}"
                                           placeholder="Facebook do seu Funcionario">
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        O campo acima deve conter o url do Facebook do seu Funcionario!
                                    </p>
                                </div><!-- fim div .input-group -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email do Funcionário</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}"
                                           placeholder="Email do seu Funcionário">
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        O campo acima deve conter o Email do Funcionário!
                                    </p>
                                </div><!-- fim div .input-group -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Skype do Funcionario</label>
                                    <input type="text" name="skype" class="form-control" id="exampleInputEmail1" value="{{ old('skype') }}"
                                           placeholder="Skype do seu Funcionário">
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        O campo acima deve conter o Nickname do Skype do seu Funcionário!
                                    </p>
                                </div><!-- fim div .input-group -->

                                <br>
                                <button type="submit" class="btn btn-success" id="subir">
                                    <i class="fa fa-check-square-o"></i>
                                    Salvar
                                </button>
                            </div><!-- fim div .col-md-12 -->
                        {!! Form::close() !!}
                    </div><!-- fim div .row -->
                </div> <!-- fim div .col-lg-12 -->
            </div>  <!-- fim div .row -->
        </div> <!-- fim div .container-fluid -->
    </div> <!-- fim div #page-content-wrapper -->
    <!-- fim Page Content -->
</div>  <!-- fim div #wrapper -->

@include('admin.include.scripts')
</body>
</html>