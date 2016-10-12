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
                    <h2><i class="fa fa-key" aria-hidden="true"></i> Usuários</h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.html">Dashbord</a></li>
                        <li><a href="listar-usuarios.html">Usuários</a></li>
                        <li class="active">Usuários</li>
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
                    <!-- FIM Alertas da pagina -->

                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <a href="{{ route('admin.usuarios.create') }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Adicionar Novo Usuário
                                    </button>
                                </a>
                            </div> <!-- fim div .form-group -->
                        </div> <!-- Div class .col-md-3 .col-sm-12 -->
                    </div><!-- fim div .row -->

                    <!-- separador de função -->
                    <ol class="breadcrumb text-center label-warning">
                        <span class="text-color-white"><strong>Administrador</strong></span>
                    </ol>
                    <!-- Fim separador de função -->

                    @foreach($user as $u)

                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="thumbnail">
                                <img class="img-responsive" src="uploads/users/{{ $u->id }}.png" alt="{{ $u->name }}">
                                <div class="caption">
                                    <h4>{{ $u->name }}</h4>
                                    <p>
                                        <strong>Cargo:</strong> {{ $u->role}}
                                    </p>
                                        <p>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AdminModal{{ $u->id }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                Editar
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AdminModalDel{{ $u->id }}">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                                Excluir
                                            </button>
                                        </p>

                                        <p>
                                            <button type="button" class="btn btn-info form-control" data-toggle="modal" data-target="#myModal1">
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                                Alterar Imagem
                                            </button>
                                        </p>

                                    <!-- Modal -->
                                    <div class="modal fade" id="AdminModal{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                {!! Form::open(['route' => ['admin.usuarios.update', $u->id], 'method' => 'post']) !!}

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Editar Funcionario - {{ $u->name }}</h4>
                                                    </div><!-- fim div .modal-header -->
                                                    <div class="modal-body">
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
                                                            <input type="text" name="name" class="form-control" id="name-{{ $u->id }}"
                                                                   value="{{ $u->name }}" placeholder="Nome do Usuário" required>
                                                            <p class="text-info">
                                                                <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                O campo acima deve conter o nome do funcionário!
                                                            </p>
                                                        </div><!-- fim div .input-group -->
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Função do Usuário</label>
                                                            <select class="form-control" name="role" id="role-{{ $u->id }}" required>
                                                                <option value="">Selecione</option>
                                                                <option value="Administrador" selected>Administrador</option>
                                                                <option value="Editor">Editor</option>
                                                                <option value="Operador">Operador</option>
                                                            </select>
                                                            <p class="text-info">
                                                                <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                No campo acima você deve selecionar a função administrativa dentro do site!
                                                            </p>
                                                        </div><!-- fim div .input-group -->


                                                    </div><!-- fim div .modal-body -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-check-square-o"></i>
                                                            Salvar
                                                        </button>
                                                    </div><!-- fim div .modal-footer -->
                                                {!! Form::close() !!}
                                            </div><!-- fim div .modal-content -->
                                        </div><!-- fim div .modal-dialog -->
                                    </div><!-- fim div .modal .fade -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="AdminModalDel{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                {!! Form::open(['route' => ['admin.usuarios.destroy', $u->id], 'method' => 'post']) !!}

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Excluir Funcionario - {{ $u->name }}</h4>
                                                </div><!-- fim div .modal-header -->
                                                <div class="modal-body">
                                                    {{--<div class="form-group">--}}
                                                    {{--<label for="exampleInputFile">Imagem (Foto do Usuário)</label>--}}
                                                    {{--<input type="file" id="exampleInputFile">--}}
                                                    {{--<p class="text-info">--}}
                                                    {{--<i class="fa fa-question-circle " aria-hidden="true"></i>--}}
                                                    {{--A foto para o Usuário deve conter o tamanho de 500px X 600px!--}}
                                                    {{--</p>--}}
                                                    {{--</div>--}}
                                                    <div class="form-group">
                                                        <p>Deseja excluir o usuário {{ $u->name }}?</p>
                                                    </div><!-- fim div .input-group -->


                                                </div><!-- fim div .modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default">
                                                        Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-ban"></i>
                                                        Excluir
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


                    <!-- div de separação alinhada -->
                    <div class="clearfix"></div> <!-- fim  div .col-sm-6 col-md-3 -->
                    <!-- fim div de separação alinhada -->

                    <!-- separador de função -->
                    <ol class="breadcrumb text-center label-warning">
                        <span class="text-color-white"><strong>Editor</strong></span>
                    </ol>
                    <!-- Fim separador de função -->

                    @foreach($editor as $e)
                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="thumbnail">
                                <img class="img-responsive" src="uploads/users/{{ $e->id }}.png" alt="Imagem responsiva">
                                <div class="caption">
                                    <h4>{{ $e->name }}</h4>
                                    <p>
                                        <strong>Função:</strong> {{ $e->role }}
                                    </p>
                                    <p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $e->id }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar
                                        </button>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editModalDel{{ $e->id }}">
                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                            Excluir
                                        </button>
                                    </p>

                                    <p>
                                        <button type="button" class="btn btn-info form-control" data-toggle="modal" data-target="#myModal1">
                                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            Alterar Imagem
                                        </button>
                                    </p>


                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $e->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                {!! Form::open(['route' => ['admin.usuarios.update', $e->id], 'method' => 'post']) !!}

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Editar Funcionario - {{ $e->name }}</h4>
                                                </div><!-- fim div .modal-header -->

                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome do Usuário</label>
                                                        <input type="text" class="form-control" id="name"
                                                               name="name" value="{{ $e->name }}" placeholder="Nome do Usuário" required>
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o nome do funcionário!
                                                        </p>
                                                    </div><!-- fim div .input-group -->

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Função do Usuário</label>
                                                        <select class="form-control" name="role" required>
                                                            <option value="">Selecione</option>
                                                            <option value="Administrador">Administrador</option>
                                                            <option value="Editor" selected>Editor</option>
                                                            <option value="Operador">Operador</option>
                                                        </select>
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo você deve selecionar a função administrativa dentro do admin do site!
                                                        </p>
                                                    </div><!-- fim div .input-group -->


                                                </div><!-- fim div .modal-body -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-check-square-o"></i>
                                                        Salvar
                                                    </button>
                                                </div><!-- fim div .modal-footer -->

                                                {!! Form::close() !!}
                                            </div><!-- fim div .modal-content -->
                                        </div><!-- fim div .modal-dialog -->
                                    </div><!-- fim div .modal .fade -->


                                    <!-- Modal -->
                                    <div class="modal fade" id="editModalDel{{ $e->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                {!! Form::open(['route' => ['admin.usuarios.destroy', $e->id], 'method' => 'post']) !!}

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Excluir Funcionario - {{ $e->name }}</h4>
                                                </div><!-- fim div .modal-header -->
                                                <div class="modal-body">
                                                    {{--<div class="form-group">--}}
                                                    {{--<label for="exampleInputFile">Imagem (Foto do Usuário)</label>--}}
                                                    {{--<input type="file" id="exampleInputFile">--}}
                                                    {{--<p class="text-info">--}}
                                                    {{--<i class="fa fa-question-circle " aria-hidden="true"></i>--}}
                                                    {{--A foto para o Usuário deve conter o tamanho de 500px X 600px!--}}
                                                    {{--</p>--}}
                                                    {{--</div>--}}
                                                    <div class="form-group">
                                                        <p>Deseja excluir o usuário {{ $e->name }}?</p>
                                                    </div><!-- fim div .input-group -->


                                                </div><!-- fim div .modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default">
                                                        Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-ban"></i>
                                                        Excluir
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


                    <!-- div de separação alinhada -->
                    <div class="clearfix"></div> <!-- fim  div .col-sm-6 col-md-3 -->
                    <!-- fim div de separação alinhada -->

                    <!-- separador de função -->
                    <ol class="breadcrumb text-center label-warning">
                        <span class="text-color-white"><strong>Operador</strong></span>
                    </ol>
                    <!-- Fim separador de função -->

                        @foreach($operador as $o)

                            <div class="col-sm-6 col-md-3 col-xs-12">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="uploads/users/{{ $o->id }}.png" alt="Imagem responsiva">
                                    <div class="caption">
                                        <h4>{{ $o->name }}</h4>
                                        <p>
                                            <strong>Função:</strong> {{ $o->role }}
                                        </p>
                                        <p>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#operModal{{ $o->id }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                Editar
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#operModalDel{{ $o->id }}">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                                Excluir
                                            </button>
                                        </p>

                                        <p>
                                            <button type="button" class="btn btn-info form-control" data-toggle="modal" data-target="#myModal1">
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                                Alterar Imagem
                                            </button>
                                        </p>


                                        <!-- Modal -->
                                        <div class="modal fade" id="operModal{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    {!! Form::open(['route' => ['admin.usuarios.update', $o->id], 'method' => 'post']) !!}

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">Editar Funcionario - {{ $o->name }}</h4>
                                                    </div><!-- fim div .modal-header -->

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nome do Usuário</label>
                                                            <input type="text" class="form-control" id="name"
                                                                   name="name" value="{{ $o->name }}" placeholder="Nome do Usuário" required>
                                                            <p class="text-info">
                                                                <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                O campo acima deve conter o nome do funcionário!
                                                            </p>
                                                        </div><!-- fim div .input-group -->

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Função do Usuário</label>
                                                            <select class="form-control" name="role" required>
                                                                <option value="">Selecione</option>
                                                                <option value="Administrador">Administrador</option>
                                                                <option value="Editor">Editor</option>
                                                                <option value="Operador" selected>Operador</option>
                                                            </select>
                                                            <p class="text-info">
                                                                <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                                O campo você deve selecionar a função administrativa dentro do admin do site!
                                                            </p>
                                                        </div><!-- fim div .input-group -->


                                                    </div><!-- fim div .modal-body -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-check-square-o"></i>
                                                            Salvar
                                                        </button>
                                                    </div><!-- fim div .modal-footer -->

                                                    {!! Form::close() !!}
                                                </div><!-- fim div .modal-content -->
                                            </div><!-- fim div .modal-dialog -->
                                        </div><!-- fim div .modal .fade -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="operModalDel{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    {!! Form::open(['route' => ['admin.usuarios.destroy', $o->id], 'method' => 'post']) !!}

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Excluir Funcionario - {{ $o->name }}</h4>
                                                    </div><!-- fim div .modal-header -->
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <p>Deseja excluir o usuário {{ $o->name }}?</p>
                                                        </div><!-- fim div .input-group -->


                                                    </div><!-- fim div .modal-body -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default">
                                                            Cancelar
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-ban"></i>
                                                            Excluir
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

                    <!-- div de separação alinhada -->
                    <div class="clearfix"></div> <!-- fim  div .col-sm-6 col-md-3 -->
                    <!-- fim div de separação alinhada -->


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