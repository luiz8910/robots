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
                    <h2><i class="fa fa-envelope" aria-hidden="true"></i> Configurar pagina contato </h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.html">Dashbord</a></li>
                        <li><a href="conf-page-contato.html">Pagina Contato</a></li>
                        <li class="active">Configurar pagina contato </li>
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

                    <!-- FIM Alertas da pagina -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email que chegara para voce as mensagens</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email que chegara para voce as mensagens">
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    O campo acima deve conter o email da sua empresa que chegara as mensagens!
                                </p>
                            </div><!-- fim div .input-group -->
                            <br>
                            <button type="submit" class="btn btn-success" id="subir">
                                <i class="fa fa-check-square-o"></i>
                                Salvar
                            </button>
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

@include('admin.include.scripts')
</body>
</html>