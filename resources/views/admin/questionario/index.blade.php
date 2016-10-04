<!DOCTYPE html>
<html lang="en">
<head>
    <link href="assets/css/table.css" rel="stylesheet">
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
                    <h2><i class="fa fa-commenting" aria-hidden="true"></i> Lista de Respostas</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                        <li class="active">Lista de Respostas</li>
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




                <div class="border-table-compra ">
                    <div class="table-responsive ajust-table-produtos bg-table-produtos">
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <tr class="active">
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Experiência Anterior</th>
                                    <th>O que é software?</th>
                                    <th>O que é site?</th>
                                    <th>Primeira Ação de vendedor</th>
                                    <th>Estudo de Caso</th>
                                    <th>Ação de marketing</th>
                                    <th>Data de Envio</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($lista as $l)
                                    <div class="modal fade" id="myModalp1{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Sua Mensagem</h4>
                                                </div>
                                                <div class="modal-body" id="modalText">
                                                    {{ $l->pergunta1 }}
                                                </div>
                                                <div class="modal-footer">
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Modal -->

                                    <div class="modal fade" id="myModalp2{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Sua Mensagem</h4>
                                                </div>
                                                <div class="modal-body" id="modalText">
                                                    {{ $l->pergunta2 }}
                                                </div>
                                                <div class="modal-footer">
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Modal -->

                                    <div class="modal fade" id="myModalp3{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Sua Mensagem</h4>
                                                </div>
                                                <div class="modal-body" id="modalText">
                                                    {{ $l->pergunta3 }}
                                                </div>
                                                <div class="modal-footer">
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Modal -->

                                    <div class="modal fade" id="myModalp4{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Sua Mensagem</h4>
                                                </div>
                                                <div class="modal-body" id="modalText">
                                                    {{ $l->pergunta4 }}
                                                </div>
                                                <div class="modal-footer">
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Modal -->

                                    <div class="modal fade" id="myModalp5{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Sua Mensagem</h4>
                                                </div>
                                                <div class="modal-body" id="modalText">
                                                    {{ $l->pergunta5 }}
                                                </div>
                                                <div class="modal-footer">
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Modal -->

                                    <div class="modal fade" id="myModalp6{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Sua Mensagem</h4>
                                                </div>
                                                <div class="modal-body" id="modalText">
                                                    {{ $l->pergunta6 }}
                                                </div>
                                                <div class="modal-footer">
                                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Modal -->

                                    <tr>
                                        <td>{{ $l->name }}</td>
                                        <td>{{ $l->email }}</td>
                                        <td id="td-modal">
                                            <a href="#" type="button" data-toggle="modal" data-target="#myModalp1{{ $l->id }}">
                                                <i class="fa fa-comments" aria-hidden="true"
                                                   title="Clique para ver a Mensagem">
                                                </i>
                                            </a>
                                        </td>
                                        {{--<td hidden id="msg-{{ $l->id }}">{{ $l->msg }}</td>--}}
                                        <td id="td-modal">
                                            <a href="#" type="button" data-toggle="modal" data-target="#myModalp2{{ $l->id }}">
                                                <i class="fa fa-comments" aria-hidden="true"
                                               title="Clique para ver a Mensagem">
                                                </i>
                                            </a>
                                        </td>

                                        <td id="td-modal">
                                            <a href="#" type="button" data-toggle="modal" data-target="#myModalp3{{ $l->id }}">
                                                <i class="fa fa-comments" aria-hidden="true"
                                                   title="Clique para ver a Mensagem">
                                                </i>
                                            </a>
                                        </td>

                                        <td id="td-modal">
                                            <a href="#" type="button" data-toggle="modal" data-target="#myModalp4{{ $l->id }}">
                                                <i class="fa fa-comments" aria-hidden="true"
                                                   title="Clique para ver a Mensagem">
                                                </i>
                                            </a>
                                        </td>

                                        <td id="td-modal">
                                            <a href="#" type="button" data-toggle="modal" data-target="#myModalp5{{ $l->id }}">
                                                <i class="fa fa-comments" aria-hidden="true"
                                                   title="Clique para ver a Mensagem">
                                                </i>
                                            </a>
                                        </td>

                                        <td id="td-modal">
                                            <a href="#" type="button" data-toggle="modal" data-target="#myModalp6{{ $l->id }}">
                                                <i class="fa fa-comments" aria-hidden="true"
                                                   title="Clique para ver a Mensagem">
                                                </i>
                                            </a>
                                        </td>

                                        <td>
                                            <? $date = date_create($l->created_at);
                                            echo date_format($date, "d/m/Y"); ?>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- FIM DIV .table-responsive.ajust-table-produtos -->
                </div> <!-- fim div border-table-compra -->

                </div> <!-- fim div .col-lg-12 -->
            </div>  <!-- fim div .row -->
        </div> <!-- fim div .container-fluid -->
    </div> <!-- fim div #page-content-wrapper -->
    <!-- fim Page Content -->
</div>  <!-- fim div #wrapper -->

@include('admin.include.scripts')
</body>
</html>