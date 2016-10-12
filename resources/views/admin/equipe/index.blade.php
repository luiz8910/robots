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
                    <h2><i class="fa fa-users" aria-hidden="true"></i> Pagina Quem Somos</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.html">Dashbord</a></li>
                        <li><a href="listar-equipe.html">Pagina Quem Somos</a></li>
                        <li class="active">Quem Somos </li>
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
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Ops!</strong>
                        Algo deu errado, volte e arrume os campos abaixo!
                        <strong>:(</strong>
                    </div><!-- fim div .alert.alert-danger.alert-dismissible -->


                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <a href="{{ route('admin.equipe.create') }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Adicionar Novo funcionário
                                    </button>
                                </a>
                            </div> <!-- fim div .form-group -->
                        </div> <!-- div class .col-md-3 .col-sm-12 -->
                    </div><!-- fim div .row -->

                    <div class="row">
                        @foreach($team as $t)
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="uploads/equipe/{{ $t->nome }}.png" alt="Imagem responsiva" style="max-width:205px;max-height:246px;"
                                    >
                                    <div class="caption">
                                        <h4>{{ $t->nome }}</h4>
                                        <p>
                                            <strong>Cargo:</strong> {{ $t->cargo }}
                                        </p>
                                        <p>
                                            <strong><i class="fa fa-facebook-official" aria-hidden="true"></i></strong>
                                            <a href="" target="_blank"> www.facebook.com/funcionario</a>
                                        </p>
                                        <p>
                                            <strong><i class="fa fa-envelope" aria-hidden="true"></i></strong>
                                            <a href="mailto:{{ $t->email }}">{{ $t->email }}</a>
                                        </p>
                                        <p>
                                            <strong><i class="fa fa-skype fa-lg" aria-hidden="true"></i></strong>
                                            <a href="skype:Nome.funcionario"> Nome.funcionario</a>
                                        </p>
                                        <p id="btn">
                                            <button type="button" class="btn btn-primary" id="btn{{ $t->id }}" data-toggle="modal" data-target="#myModal{{ $t->id }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                {{--data-toggle="modal" data-target="#myModal1">--}}
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                Excluir
                                            </button>
                                        </p>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">Editar Funcionario "Nome funcionário"</h4>
                                                    </div><!-- fim div .modal-header -->
                                                    {!! Form::open(['route' => ['admin.equipe.update' , $t->id], 'enctype' => 'multipart/form-data', 'method' => 'post']) !!}
                                                    {{--<form id="formTeam" method="post" action="{{ url('uploadTeamInfo') }}" enctype="multipart/form-data">--}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">Imagem (Foto do funcionário)</label>
                                                                <input type="file" id="imgEmployee" name="img">
                                                                <p class="text-info">
                                                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                    A foto para o funcionário deve conter o tamanho minímo de 205px x 246px!
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Nome do funciário</label>
                                                                <input type="text" class="form-control" name="nome" id="exampleInputEmail1" value="{{ $t->nome }}"
                                                                       placeholder="Nome do funciário">
                                                                <p class="text-info">
                                                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                    O campo acima deve conter o nome do funciário!
                                                                </p>
                                                            </div><!-- fim div .input-group -->
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Cargo do funciário</label>
                                                                <input type="text" class="form-control" name="cargo" id="exampleInputEmail1" value="{{ $t->cargo }}"
                                                                       placeholder="Cargo do seu funciário">
                                                                <p class="text-info">
                                                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                    O campo acima deve conter o Cargo do funciário!
                                                                </p>
                                                            </div><!-- fim div .input-group -->
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Facebook do Funcionario</label>
                                                                <input type="text" class="form-control" name="facebook" id="exampleInputEmail1"
                                                                       placeholder="Facebook do seu Funcionario">
                                                                <p class="text-info">
                                                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                    O campo acima deve conter o url do Facebook do seu Funcionario!
                                                                </p>
                                                            </div><!-- fim div .input-group -->

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email do Funcionário</label>
                                                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ $t->email }}"
                                                                       placeholder="Email do seu Funcionário">
                                                                <p class="text-info">
                                                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                    O campo acima deve conter o Email do Funcionário!
                                                                </p>
                                                            </div><!-- fim div .input-group -->

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Skype do Funcionario</label>
                                                                <input type="text" class="form-control" name="skype" id="exampleInputEmail1"
                                                                       placeholder="Skype do seu Funcionário">
                                                                <p class="text-info">
                                                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                    O campo acima deve conter o Nickname do Skype do seu Funcionário!
                                                                </p>
                                                            </div><!-- fim div .input-group -->

                                                        </div><!-- fim div .modal-body -->


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger">Excluir</button>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-check-square-o"></i>
                                                                Salvar
                                                            </button>
                                                        </div><!-- fim div .modal-footer -->
                                                    {!! Form::close() !!}
                                                </div><!-- fim div .modal-content -->
                                            </div><!-- fim div .modal-dialog -->
                                        </div><!-- fim div .modal .fade -->
                                    </div><!-- fim div .Capition -->
                                </div><!-- fim div .thumbnail -->
                            </div><!-- fim  div .col-sm-6 col-md-3 -->
                        @endforeach

                        <div class="clearfix"></div> <!-- fim  div .col-sm-6 col-md-3 -->






                    </div> <!-- div fim .row -->
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