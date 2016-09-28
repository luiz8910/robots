<!DOCTYPE html>
<html lang="en">
<head>
    @include('site.include.head')
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img alt="Brand" src="">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>

<!-- Section Header-->
<section class="bg-section-header-contato header-size-contato">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 text-center ajuste-bloco-header-page-contato ">
                <h1 class="text-color-white size-fonte-header"> Contato</h1>
                <p class=" text-color-white ">Home <strong>/</strong> Contato</p>
            </div><!-- /.col-md-12.col-xs-12.col-sm-12.text-center.ajuste-bloco-header-page-contato  -->
        </div><!-- /.row -->
    </div><!--/.container -->
</section>
<!-- fim Section Header -->


<!-- Section header formularios -->
<section>
    <div class="container">
        <div class="row text-center">
            <div class="divisor-default"></div> <!-- /.divisor-default-->
            <div class="col-md-12 col-xs-12 col-sm-12 text-center ajust-margin-subheader">
                <h2 class="text-color-1 size-fonte-header-form-contato">{{ $detalhes->topic }}</h2>
                <div class="col-md-4 col-md-offset-4 col-xl-4 col-xl-offset-4 col-sm-4 col-sm-offset-4">
                    <ul class="list-inline">
                        <li class="linha-header"></li>
                        <i class="fa fa-lg fa-envelope ajust-icone-header" aria-hidden="true"></i>
                        <li class="linha-header"></li>
                    </ul>
                </div><!-- /.col-md-4 col-md-offset-4 col-xl-4 col-xl-offset-4 col-sm-4 col-sm-offset-4 -->
            </div><!-- /.col-md-21.col-xs-12.col-sm-12.text-center.ajuste-bloco-header-page-contato -->
            <p class="text-color-2">{{ $detalhes->description }}</p>
        </div><!-- /.row -->
    </div><!--/.container -->
</section>
<!-- fim Section header formularios -->


<!-- Section formularios -->
<section>
    <div class="container">
        <div class="row">
            {!! Form::open(['route' => 'site.contato.store', 'method' => 'post', 'id' => 'gravarContato']) !!}

                <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12">

                    <div class="form-group form-group-lg col-md-6 col-sm-6 col-xs-12 ">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome Completo">
                    </div> <!-- /.form-group-lg.col-md-6.col-sm-6.col-xs-12 -->

                    <div class="form-group form-group-lg col-md-6 col-sm-6 col-xs-12 ">
                        <label for="exampleInputEmail1">Fone</label>
                        <input type="text" class="form-control" name="tel" id="tel" placeholder="Fone">
                    </div><!-- /.form-group-lg.col-md-6.col-sm-6.col-xs-12 -->

                    <div class="form-group form-group-lg col-md-12 col-sm-12 col-xs-12">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div><!-- /.form-group-lg.col-md-6.col-sm-6.col-xs-12 -->

                    <div class="form-group form-group-lg col-md-12 col-sm-12 col-xs-12">
                        <label for="exampleInputEmail1">Mensagem</label>
                        <textarea class="form-control" name="msg" id="msg" placeholder="Digite aqui sua mensagem" rows="5"></textarea>
                    </div><!-- /.form-group-lg.col-md-6.col-sm-6.col-xs-12 -->
                </div><!-- /.col-md-21.col-xs-12.col-sm-12.text-center.ajuste-bloco-header-page-contato -->

                <div class="col-md-4 col-md-offset-4 col-xl-4 col-xl-offset-4 col-sm-4 col-sm-offset-4">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Enviar</button>
                </div><!-- /.col-md-4 col-md-offset-4 col-xl-4 col-xl-offset-4 col-sm-4 col-sm-offset-4 -->

            {!! Form::close() !!}
        </div><!-- /.row -->
    </div><!--/.container -->
</section>
<!-- fim Section formularios -->

<!-- The actual snackbar -->
<div id="snackbar"></div>

<div class="divisor-default"></div> <!-- /.divisor-default-->

<!-- Section localização -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 text-color-1">

                <div class="col-md-3 col-xs-12 col-sm-6 border-box-contato text-left">
                    <div class="ajuste-espaçamento-box-contato ">
                        <i class="fa fa-4x fa-envelope ajust-icone-header-contato " aria-hidden="true"></i>
                        <p class="">rua dos Bobos - 0</p>
                        <p class="">sorocity - SP</p>
                    </div>
                </div><!-- /.col-md-21.col-xs-12.col-sm-12 -->

                <div class="col-md-3 col-xs-12 col-sm-6 border-box-contato text-left ">
                    <div class="ajuste-espaçamento-box-contato ">
                        <i class="fa fa-4x fa-envelope ajust-icone-header-contato " aria-hidden="true"></i>
                        <p class="">rua dos Bobos - 0</p>
                        <p class="">sorocity - SP</p>
                    </div>
                </div><!-- /.col-md-21.col-xs-12.col-sm-12 -->

                <div class="col-md-3 col-xs-12 col-sm-6 border-box-contato text-left ">
                    <div class="ajuste-espaçamento-box-contato ">
                        <i class="fa fa-4x fa-envelope ajust-icone-header-contato " aria-hidden="true"></i>
                        <p class="">rua dos Bobos - 0</p>
                        <p class="">sorocity - SP</p>
                    </div>
                </div><!-- /.col-md-21.col-xs-12.col-sm-12 -->

                <div class="col-md-3 col-xs-12 col-sm-6 text-left ">
                    <div class="ajuste-espaçamento-box-contato ">
                        <i class="fa fa-4x fa-envelope ajust-icone-header-contato " aria-hidden="true"></i>
                        <p class="">rua dos Bobos - 0</p>
                        <p class="">sorocity - SP</p>
                    </div>
                </div><!-- /.col-md-21.col-xs-12.col-sm-12 -->

            </div><!-- /.col-md-21.col-xs-12.col-sm-12 -->
        </div><!-- /.row -->
    </div><!--/.container -->
</section>
<!-- fim Section localização -->

<div class="divisor-default"></div> <!-- /.divisor-default-->

<!-- Section mapas -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 maps">

            </div><!-- /.col-md-21.col-xs-12.col-sm-12 -->
        </div><!-- /.row -->
    </div><!--/.container -->
</section>
<!-- fim Section localização -->

<!-- Section carrosel -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 bg-carrosel carrosel-contato">

            </div><!-- /.col-md-21.col-xs-12.col-sm-12 -->
        </div><!-- /.row -->
    </div><!--/.container -->
</section>
<!-- fim Section carrosel -->

@include('site.include.footer')

</body>
</html>