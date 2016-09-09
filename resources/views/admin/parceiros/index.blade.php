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
                    <h2><i class="fa fa-users" aria-hidden="true"></i> Pagina Parceiros</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashbord</a></li>
                        <li><a href="page-parceiro.html">Pagina Parceiros</a></li>
                        <li class="active">Parceiros </li>
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
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <a href="add-clientes.html">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Adicionar Novo Parceiros
                                    </button>
                                </a>
                            </div> <!-- fim div .form-group -->
                        </div> <!-- Div class .col-md-3 .col-sm-12 -->


                    </div><!-- fim div .row -->

                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img class="img-responsive" src="assets/upload/banner/banner-1.svg" alt="Imagem responsiva">
                                <div class="caption">
                                    <h4>Nome do Parceiro</h4>
                                    <p>
                                        <strong>url:</strong><a href="www.google.com" target="_blank"> www.google.com</a>
                                    </p>
                                    <p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar
                                        </button>
                                    </p>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Editar logo CLiente "Nome-image.png"</h4>
                                                </div><!-- fim div .modal-header -->
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Imagem (Logo Cliente)</label>
                                                        <input type="file" id="exampleInputFile">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            A imagem para este cliente deve conter o tamanho de 500PX x 600PX!
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome do Cliente</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o nome do cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Url do Site</label>
                                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o url do site do seu cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->

                                                </div><!-- fim div .modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger">Excluir</button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                                        <i class="fa fa-check-square-o"></i>
                                                        Salvar
                                                    </button>
                                                </div><!-- fim div .modal-footer -->
                                            </div><!-- fim div .modal-content -->
                                        </div><!-- fim div .modal-dialog -->
                                    </div><!-- fim div .modal .fade -->
                                </div><!-- fim div .Capition -->
                            </div><!-- fim div .thumbnail -->
                        </div><!-- fim  div .col-sm-6 col-md-3 -->

                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img class="img-responsive" src="assets/upload/banner/banner-1.svg" alt="Imagem responsiva">
                                <div class="caption">
                                    <h4>Nome do Parceiro</h4>
                                    <p>
                                        <strong>url:</strong><a href="www.google.com" target="_blank"> www.google.com</a>
                                    </p>
                                    <p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar
                                        </button>
                                    </p>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Editar logo CLiente "Nome-image.png"</h4>
                                                </div><!-- fim div .modal-header -->
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Imagem (Logo Cliente)</label>
                                                        <input type="file" id="exampleInputFile">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            A imagem para este cliente deve conter o tamanho de 500PX x 600PX!
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome do Cliente</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o nome do cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Url do Site</label>
                                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o url do site do seu cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->

                                                </div><!-- fim div .modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger">Excluir</button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                                        <i class="fa fa-check-square-o"></i>
                                                        Salvar
                                                    </button>
                                                </div><!-- fim div .modal-footer -->
                                            </div><!-- fim div .modal-content -->
                                        </div><!-- fim div .modal-dialog -->
                                    </div><!-- fim div .modal .fade -->
                                </div><!-- fim div .Capition -->
                            </div><!-- fim div .thumbnail -->
                        </div><!-- fim  div .col-sm-6 col-md-3 -->

                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img class="img-responsive" src="assets/upload/banner/banner-1.svg" alt="Imagem responsiva">
                                <div class="caption">
                                    <h4>Nome do Parceiro</h4>
                                    <p>
                                        <strong>url:</strong><a href="www.google.com" target="_blank"> www.google.com</a>
                                    </p>
                                    <p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar
                                        </button>
                                    </p>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Editar logo CLiente "Nome-image.png"</h4>
                                                </div><!-- fim div .modal-header -->
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Imagem (Logo Cliente)</label>
                                                        <input type="file" id="exampleInputFile">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            A imagem para este cliente deve conter o tamanho de 500PX x 600PX!
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome do Cliente</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o nome do cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Url do Site</label>
                                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o url do site do seu cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->

                                                </div><!-- fim div .modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger">Excluir</button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                                        <i class="fa fa-check-square-o"></i>
                                                        Salvar
                                                    </button>
                                                </div><!-- fim div .modal-footer -->
                                            </div><!-- fim div .modal-content -->
                                        </div><!-- fim div .modal-dialog -->
                                    </div><!-- fim div .modal .fade -->
                                </div><!-- fim div .Capition -->
                            </div><!-- fim div .thumbnail -->
                        </div><!-- fim  div .col-sm-6 col-md-3 -->

                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img class="img-responsive" src="assets/upload/banner/banner-1.svg" alt="Imagem responsiva">
                                <div class="caption">
                                    <h4>Nome do Parceiro</h4>
                                    <p>
                                        <strong>url:</strong><a href="www.google.com" target="_blank"> www.google.com</a>
                                    </p>
                                    <p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar
                                        </button>
                                    </p>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Editar logo CLiente "Nome-image.png"</h4>
                                                </div><!-- fim div .modal-header -->
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Imagem (Logo Cliente)</label>
                                                        <input type="file" id="exampleInputFile">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            A imagem para este cliente deve conter o tamanho de 500PX x 600PX!
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome do Cliente</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o nome do cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Url do Site</label>
                                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Nome da Imagem">
                                                        <p class="text-info">
                                                            <i class="fa fa-question-circle " aria-hidden="true"></i>
                                                            O campo acima deve conter o url do site do seu cliente!
                                                        </p>
                                                    </div><!-- fim div .input-group -->

                                                </div><!-- fim div .modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger">Excluir</button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                                        <i class="fa fa-check-square-o"></i>
                                                        Salvar
                                                    </button>
                                                </div><!-- fim div .modal-footer -->
                                            </div><!-- fim div .modal-content -->
                                        </div><!-- fim div .modal-dialog -->
                                    </div><!-- fim div .modal .fade -->
                                </div><!-- fim div .Capition -->
                            </div><!-- fim div .thumbnail -->
                        </div><!-- fim  div .col-sm-6 col-md-3 -->
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

@include('admin.include.scripts')
</body>
</html>