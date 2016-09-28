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


                <div class="border-table-compra ">
                    <div class="table-responsive ajust-table-produtos bg-table-produtos">
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                            <tr class="active">
                                <th>Nome</th>
                                <th>Fone</th>
                                <th>Email</th>
                                <th>Mensagem</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($lista as $l)
                                    <tr>
                                        <td>{{ $l->name }}</td>
                                        <td>{{ $l->tel }}</td>
                                        <td>{{ $l->email }}</td>
                                        <td>{{ $l->msg }}</td>
                                        <td>
                                            {{ $l->created_at }}
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