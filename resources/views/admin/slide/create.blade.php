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
                    <h2><i class="fa fa-plus" aria-hidden="true"></i> ADD Imagem Slide </h2>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.html">Dashbord</a></li>
                        <li><a href="">Pagina Home</a></li>
                        <li><a href="slide-home.html">Slide</a></li>
                        <li class="active">Add Imagem Slide </li>
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
                                <label for="exampleInputFile">Imagem (Banner)</label>
                                <input type="file" id="exampleInputFile">
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    A imagem para este banner de contaer o tamanho de 500 X 600px
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome da Imagem</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    Nome da imagem
                                </p>
                            </div><!-- fim div .input-group -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Url da imagem</label>
                                <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    A imagem vai Conter um url? Entao adicione acima
                                </p>
                            </div><!-- fim div .input-group -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descrição da Imagem</label>
                                <textarea class="form-control" rows="3"></textarea>
                                <p class="text-info">
                                    <i class="fa fa-question-circle " aria-hidden="true"></i>
                                    Descrição da Imagem!
                                </p>
                            </div><!-- fim div .input-group -->
                        </div><!-- fim div .col-md-12 -->
                    </div><!-- fim div .row -->


                    <br>
                    <button type="submit" class="btn btn-success" id="subir">
                        <i class="fa fa-check-square-o"></i>
                        Salvar
                    </button>
                </div> <!-- fim div .col-lg-12 -->
            </div>  <!-- fim div .row -->
        </div> <!-- fim div .container-fluid -->
    </div> <!-- fim div #page-content-wrapper -->
    <!-- fim Page Content -->
</div>  <!-- fim div #wrapper -->

@include('admin.include.scripts')
</body>
</html>