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
    <!-- Sidebar -->
    @include('admin.include.menu-lateral')
    <!-- fim Sidebar -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open(['route' => ['admin.contato.update', $contato->id], 'method' => 'post', 'id' => 'formContato']) !!}
                        <h2><i class="fa fa-commenting" aria-hidden="true"></i> Descrição Contato</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                            <li><a href="">Pagina Contato</a></li>
                            <li class="active">Descrição Contato</li>
                        </ol>
                        <div class="separador-1"></div> <!-- fim div .separador-1 -->

                    <div class="alert alert-success alert-dismissible" id="alert-success" role="alert" hidden>
                        <button type="button" class="close" id="closeAlertSuccess" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Tudo certo!</strong>
                        Suas alterações foram salvas!
                        <strong>:)</strong>
                    </div>

                    <div class="alert alert-danger alert-dismissible" id="alert-danger" role="alert" hidden>
                        <button type="button" class="close" id="closeAlert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Atenção</strong>
                        <p>Algo deu errado, volte e arrume os campos abaixo: </p><br>
                        <ul id="error"></ul>
                    </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição Tópico</label>
                                    <input type="text" class="form-control" name="topic" id="topic" value="{{ $contato->topic }}">
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        Esta descrição aparecerá acima dos Campos de contato na pagina Contato!
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição Contato</label>
                                    <textarea class="form-control" name="description" id="description" rows="10">{{ $contato->description }}</textarea>
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        Esta descrição aparecerá acima dos Campos de contato na pagina Contato!
                                    </p>
                                </div><!-- fim div .input-group -->
                            </div><!-- fim div .col-md-12 -->
                        </div><!-- fim div .row -->
                        <br>

                        <button type="submit" class="btn btn-success" id="">
                            <i class="fa fa-check-square-o"></i>
                            Salvar
                        </button>
                    {!! Form::close() !!}
                </div> <!-- fim div .col-lg-12 -->
            </div>  <!-- fim div .row -->
        </div> <!-- fim div .container-fluid -->
    </div> <!-- fim div #page-content-wrapper -->
    <!-- fim Page Content -->
</div>  <!-- fim div #wrapper -->

@include('admin.include.scripts')
</body>
</html>