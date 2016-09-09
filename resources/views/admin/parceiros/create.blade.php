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
                    <h2><i class="fa fa-plus" aria-hidden="true"></i> Add Parceiros </h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Dashbord</a></li>
                        <li><a href="">Pagina Parceiros</a></li>
                        <li><a href="listar-parceiro.html">Parceiros</a></li>
                        <li class="active">Add Parceiros </li>
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
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputFile">Imagem (Logo Parceiro)</label>
                                <input type="file" id="exampleInputFile">
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    A imagem para o box Parceiros deve conter o tamanho de 500PX x 600PX!
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do Parceiro</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    O campo acima deve conter o nome do Parceiros!
                                </p>
                            </div><!-- fim div .input-group -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Url do Site</label>
                                <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    O campo acima deve conter o url do site do seu Parceiros!
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

@include('admin.include.scripts')
</body>
</html>