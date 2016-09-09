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
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li class="active">Perfil Usuário</li>
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

                    <div class="col-md-3 col-sm-12 col-sm-12 ">
                        <div class="thumbnail">
                            <img src="assets/upload/banner/banner-1.svg" alt="...">
                            <h3>Steve Zoe</h3>
                            <div class="list-group" style="border-radius:none;">
                                <a href="#visao" class="list-group-item a-style-menu-inline" aria-controls="visao" role="tab" data-toggle="tab" style="border-radius: 0px !important;">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Visão geral
                                </a>
                                <a href="#conta" class="list-group-item a-style-menu-inline" aria-controls="messages" role="tab" data-toggle="tab">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                    Minha Conta
                                </a>
                                <a href="#perfil-blog" class="list-group-item a-style-menu-inline" aria-controls="messages" role="tab" data-toggle="tab" style="border-radius: 0px !important;">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                    Perfil Blog
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
                                            <th class="col-md-2">User Name</th>
                                            <td>SteveZ</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-2">Nome</th>
                                            <td>Steve</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-2">Aniversario</th>
                                            <td>Daniel</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-2">Profissão</th>
                                            <td>Designer</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-2">Email</th>
                                            <td><a href="mailto:a@a.com">a@a.com</a></td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-2">Quem sou eu</th>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In quo laboriosam, fugiat provident, alias quos adipisci nobis vitae saepe recusandae distinctio quae earum deserunt maxime voluptatibus quaerat iusto expedita totam.</td>
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
                                                Informações
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

                                                <div class="form-group text-color-1">
                                                    <label for="">User Name </label>
                                                    <input type="text" class="form-control" id="" placeholder="User Name" value="SteveZ" >
                                                </div> <!-- fim div .form-group -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Nome </label>
                                                    <input type="text" class="form-control" id="" placeholder="Nome" value="Steve Zoe" >
                                                </div> <!-- fim div .form-group -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Data do Nascimento </label>
                                                    <input type="date" class="form-control" id="" placeholder="" value="" >
                                                </div> <!-- fim div .form-group -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Profissão </label>
                                                    <input type="text" class="form-control" id="" placeholder="Profissão" value="Designer" >
                                                </div> <!-- fim div .form-group -->

                                                <div class="form-group text-color-1">
                                                    <label for="">Email </label>
                                                    <input type="email" class="form-control" id="" placeholder="Email" value="A@a.com" >
                                                </div> <!-- fim div .form-group -->
                                                <br>
                                                <button type="submit" class="btn btn-success" id="subir">
                                                    <i class="fa fa-check-square-o"></i>
                                                    Salvar
                                                </button>
                                            </div> <!-- fim div .tab-pane.fade.in.active#info -->

                                            <!-- Fim tab #info -->

                                            <div role="tabpanel" class="tab-pane fade" id="avatar">
                                                <h4 class="text-center">
                                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                                    Trocar avatar
                                                </h4>
                                                <div class="separador-2"></div> <!-- fim div.separador-2 -->
                                                <br>
                                                <button type="submit" class="btn btn-success" id="subir">
                                                    <i class="fa fa-check-square-o"></i>
                                                    Salvar
                                                </button>
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
                                                    <input type="Password" class="form-control" id="exampleInputPassword1" placeholder="**********">
                                                </div> <!-- fim div .form-group -->
                                                <div class="form-group text-color-1">
                                                    <label for="">Nova Senha</label>
                                                    <input type="Password" class="form-control" id="exampleInputPassword1" placeholder="**********">
                                                </div> <!-- fim div .form-group -->
                                                <div class="form-group text-color-1">
                                                    <label for="">Redigite a nova Senha</label>
                                                    <input type="Password" class="form-control" id="exampleInputPassword1" placeholder="**********">
                                                </div> <!-- fim div .form-group -->
                                                <br>
                                                <button type="submit" class="btn btn-success" id="subir">
                                                    <i class="fa fa-check-square-o"></i>
                                                    Salvar
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

@include('admin.include.scripts')
</body>
</html>