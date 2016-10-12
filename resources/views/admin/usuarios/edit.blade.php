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
                    <h2><i class="fa fa-user" aria-hidden="true"></i> Perfil Usuário</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                        <li class="active">Perfil Usuário</li>
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

                    <div class="col-md-3 col-sm-12 col-sm-12 ">
                        <div class="thumbnail">
                            <img src="uploads/users/{{ Auth::user()->id }}.png" alt="...">

                            <h3>{{ Auth::user()->name }}</h3>

                            <div class="list-group" style="border-radius:none;">

                                <a href="#visao" class="list-group-item a-style-menu-inline" aria-controls="visao" role="tab" data-toggle="tab" style="border-radius: 0px !important;">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Visão geral
                                </a>

                                <a href="#conta" class="list-group-item a-style-menu-inline" aria-controls="messages" role="tab" data-toggle="tab">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                    Minha Conta
                                </a>

                            </div> <!-- Fim div .list-group -->

                        </div> <!-- fim div .thumbnail -->

                    </div> <!-- Fim div .col-md-3 .col-sm-3 -->

                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="tab-content">
                            <div role="tabpanel" class="panel panel-info tab-pane fade in active" id="visao">
                                <div class="panel-heading">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Visão Geral
                                </div> <!-- fim div .painel-heading -->
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th class="col-md-2">Nome</th>
                                                <td>{{ Auth::user()->name }}</td>
                                            </tr>

                                            <tr>
                                                <th class="col-md-2">Email</th>
                                                <td><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></td>
                                            </tr>

                                            <tr>
                                                <th class="col-md-2">Cargo</th>
                                                <td>{{ Auth::user()->role }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- fim div .panel-body -->
                            </div> <!-- fim div .tabpanel #visao -->

                            <!-- Fim tab #visao -->

                            <div role="tabpanel" class="panel panel-info tab-pane fade" id="conta">
                                <div class="panel-heading">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                    Minha Conta
                                </div> <!-- fim div .painel-heading -->
                                <div class="panel-body">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="list-group" style="border-radius:none;">
                                            <a href="#info" class="list-group-item a-style-menu-inline" aria-controls="info" role="tab" data-toggle="tab" style="border-radius: 0px !important;">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                Info
                                            </a>
                                            <a href="#avatar" class="list-group-item a-style-menu-inline" aria-controls="avatar" role="tab" data-toggle="tab">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                Avatar
                                            </a>
                                            <a href="#Senha" class="list-group-item a-style-menu-inline" aria-controls="Senha" role="tab" data-toggle="tab">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                Senha
                                            </a>
                                        </div> <!-- Fim div .list-group -->
                                    </div> <!-- fim div .col-md-3.col-sm-12.col-xs-12 -->

                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                <h4 class="text-center">
                                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                                    Informaçoes Pessoais
                                                </h4>
                                                <div class="separador-2"></div> <!-- fim div.separador-2 -->

                                                {!! Form::open(['route' => ['admin.usuarios.update', Auth::user()->id], 'method' => 'post']) !!}

                                                <div class="form-group text-color-1">
                                                    <label for="">Nome </label>

                                                    <input type="text" class="form-control" id="name"
                                                           name="name" placeholder="Nome" value="{{ Auth::user()->name }}" >

                                                </div> <!-- fim div .form-group -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Cargo </label>

                                                    <input type="text" class="form-control" id="role"
                                                           name="role" placeholder="Cargo" readonly value="{{ Auth::user()->role }}" >

                                                </div> <!-- fim div .form-group -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Email </label>

                                                    <input type="email" class="form-control" id="email"
                                                          name="email" placeholder="Email" value="{{ Auth::user()->email }}" >

                                                </div> <!-- fim div .form-group -->

                                                <br>

                                                <button type="submit" class="btn btn-success" id="subir">

                                                    <i class="fa fa-check-square-o"></i>

                                                    Alterar

                                                </button>

                                                {!! Form::close() !!}

                                            </div> <!-- fim div .tab-pane.fade.in.active#info -->

                                            <!-- Fim tab #info -->

                                            <div role="tabpanel" class="tab-pane fade" id="avatar">
                                                {!! Form::open(['route' => 'admin.usuarios.update-img', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                                <h4 class="text-center">
                                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                                    Trocar avatar
                                                </h4>
                                                <div class="separador-2"></div> <!-- fim div.separador-2 -->
                                                <br>

                                                <div class="form-group">

                                                    <label for="exampleInputFile" style="margin-bottom: 10px;">Imagem (Foto do Usuário)</label>

                                                    <input type="file" name="img" id="exampleInputFile" style="margin-bottom: 10px;">

                                                    <p class="text-info">

                                                    <i class="fa fa-question-circle " aria-hidden="true"></i>

                                                    A foto para o Usuário deve conter o tamanho de 500px X 600px!
                                                    </p>

                                                </div>
                                                <br>

                                                <button type="submit" class="btn btn-success" id="subir">
                                                    <i class="fa fa-check-square-o"></i>
                                                    Alterar
                                                </button>
                                                {!! Form::close() !!}
                                            </div> <!-- fim div .tab-pane.fade.in.active#avatar -->

                                            <!-- Fim tab #avatar -->

                                            <div role="tabpanel" class="tab-pane fade" id="Senha">
                                                <h4 class="text-center">
                                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                                    Senha
                                                </h4>
                                                <div class="separador-2"></div> <!-- fim div.separador-2 -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Senha atual</label>
                                                    <input type="Password" class="form-control"
                                                           name="actual_password" id="exampleInputPassword1" placeholder="**********">
                                                </div> <!-- fim div .form-group -->
                                                <div class="form-group text-color-1">
                                                    <label for="">Nova Senha</label>
                                                    <input type="Password" class="form-control"
                                                           name="password" id="exampleInputPassword1" placeholder="**********">
                                                </div> <!-- fim div .form-group -->
                                                <div class="form-group text-color-1">
                                                    <label for="">Redigite a nova Senha</label>
                                                    <input type="Password" class="form-control"
                                                           name="password_confirmation" id="exampleInputPassword1" placeholder="**********">
                                                </div> <!-- fim div .form-group -->
                                                <br>
                                                <button type="submit" class="btn btn-success" id="subir">
                                                    <i class="fa fa-check-square-o"></i>
                                                    Alterar
                                                </button>
                                            </div> <!-- fim div .tab-pane.fade.in.active#Senha -->
                                            <!-- Fim tab #Senha -->
                                        </div> <!-- fim div .tab-content -->
                                    </div> <!-- fim div .col-md-9 .col-sm-12 .col-xs-12 -->
                                </div> <!-- fim div .panel-body -->
                            </div> <!-- fim div .tabpanel #conta -->

                            <!-- Fim tab #conta -->

                            <div role="tabpanel" class="panel panel-info tab-pane fade" id="perfil-blog">
                                <div class="panel-heading">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                    Perfil Blog
                                </div> <!-- fim div .painel-heading -->
                                <div class="panel-body">

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="list-group">
                                            <a href="#info-blog" class="list-group-item a-style-menu-inline " aria-controls="info-blog" role="tab" data-toggle="tab" style="border-radius: 0px !important;">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                Informações
                                            </a>
                                            <a href="#avatar-blog" class="list-group-item a-style-menu-inline" aria-controls="avatar-blog" role="tab" data-toggle="tab" style="border-radius: 0px !important;" >
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                Avatar
                                            </a>
                                        </div> <!-- Fim div .list-group -->
                                    </div> <!-- fim div .col-md-3.col-sm-12.col-xs-12 -->

                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="info-blog">
                                                <h4 class="text-center">
                                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                                    Informaçoes do Perfil do blog
                                                </h4>
                                                <div class="separador-2"></div> <!-- fim div.separador-2 -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Postar como :</label>
                                                    <input type="text" class="form-control" id="" placeholder="User Name" value="ADM" >
                                                </div> <!-- fim div .form-group -->

                                                <br>
                                                <button type="submit" class="btn btn-success" id="subir">
                                                    <i class="fa fa-check-square-o"></i>
                                                    Salvar
                                                </button>
                                            </div> <!-- fim div .tab-pane.fade.in.active#info -->

                                            <!-- Fim tab #info -->

                                            <div role="tabpanel" class="tab-pane fade" id="avatar-blog">
                                                <h4 class="text-center">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    Trocar avatar
                                                </h4>
                                                <div class="separador-2"></div> <!-- fim div.separador-2 -->




                                                <br>
                                                <button type="submit" class="btn btn-success" id="subir">
                                                    <i class="fa fa-check-square-o"></i>
                                                    Salvar
                                                </button>
                                            </div> <!-- fim div .tab-pane.fade.in.active #avatar-blog -->

                                            <!-- Fim tab #avatar-blog -->

                                        </div> <!-- fim div .tab-content -->
                                    </div> <!-- fim div .col-md-9 .col-sm-12 .col-xs-12 -->
                                </div> <!-- fim div .panel-body -->
                            </div><!-- fim div .tabpanel #perfil-blog -->

                            <!-- Fim tab #perfil-blog -->

                        </div> <!-- fim div .tabcontent -->
                    </div> <!-- Fim div .col-md-9 .col-sm-12 .col-xs-12-->
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