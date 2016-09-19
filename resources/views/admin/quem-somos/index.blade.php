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
                    <h2 id="subir"><i class="fa fa-commenting" aria-hidden="true"></i> Descrição de Quem Somos</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pagina Quem Somos</a></li>
                        <li class="active">Descrição Quem Somos</li>
                    </ol>
                    <div class="separador-1"></div> <!-- fim div .separador-1 -->
                    <div class="alert alert-success alert-dismissible" role="alert" hidden>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                        <form action="" id="editQS">
                            <div class="col-md-8 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição da Empresa</label>
                                    <textarea class="form-control" rows="10" id="description">{{ $quemSomos->description }}</textarea>
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        No campo acima faça uma descrição detalhada de sua empresa!
                                    </p>
                                </div><!-- fim div .input-group -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição do Box "Por que nos escolher"</label>
                                    <textarea class="form-control" rows="10" id="whyUS">{{ $quemSomos->whyUs }}</textarea>
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        No campo acima faça uma descrição do por que o cliente deve nos escolher!
                                    </p>
                                </div><!-- fim div .input-group -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição do Box "Nossos Valores"</label>
                                    <textarea class="form-control" rows="10" id="ourValues">{{ $quemSomos->ourValues }}</textarea>
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        No campo acima faça uma descrição dos Valores da empresa!
                                    </p>
                                </div><!-- fim div .input-group -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição do Box "Visão"</label>
                                    <textarea class="form-control" rows="10" id="vision">{{ $quemSomos->vision }}</textarea>
                                    <p class="text-info">
                                        <i class="fa fa-question-circle " aria-hidden="true"></i>
                                        No campo acima faça uma descrição da visão da empresa!
                                    </p>
                                </div><!-- fim div .input-group -->

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i>
                                    Salvar
                                </button>



                            </div><!-- fim div .col-md-12 -->
                        </form>

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
</html>