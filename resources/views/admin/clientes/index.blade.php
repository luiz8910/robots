<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootoption.css" rel="stylesheet" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="css/theme-orangeblue.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.js"></script>
    <link href="css/preloader.css" rel="stylesheet">
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="cssload-container">
                    <div class="cssload-speeding-wheel"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#loading').fadeOut('slow', function () {
                $(this).remove();
            });
        });
    </script>
    <div id="submitLoader"></div>
</head>
<title>Dashboard | Clientes </title>
<link href="plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css"/>
<body class="skin-blue">
<header class="header">
    <a target="_blank" href="" class="logo secondary-bg-color">
        <img src="images/logo-h2o-painel.png">
    </a>
    <nav class="navbar navbar-static-top primary-bg-color" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" target="_blank"><i class="fa fa-globe"></i> Visualizar Site</a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>administrador <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <a href="#">
                                <i class="fa fa-user"></i> Meu Perfil</a>
                            <a href="#">
                                <i class="fa fa-sign-out"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    @include("admin.menu.menu-lateral")
    <aside class="right-side">
        <section class="content-header">
            <h1>
                <i class="fa fa-newspaper-o"></i> Clientes
            </h1>
        </section>
        <section class="content">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-newspaper-o"></i> Clientes
                </h3>
            </div>
            <div class="col-xs-12">
                <a href="{{ route("admin.clientes.create") }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add Clientes
                </a>
                <div class="box box-primary box-solid">

                    <div class="box-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <th>Link</th>
                                    <th>Imagem (1000 x 1000)</th>
                                    <th width="100px">A&ccedil;&otilde;es</th>
                                </tr>

                                @foreach($clientes as $c)
                                    <tr>
                                        <td>
                                            {{ $c->nome }}
                                        </td>
                                        <td>
                                            {{ $c->site }}
                                        </td>
                                        <td>
                                            <img width="200" src="{{ url("uploads/cli".$c->imagem) }}"/>
                                        </td>
                                        <td>
                                            <a href="edit-cliente.html">
                                                <button class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a data-toggle="modal" id="2" href="#deleteModal" class="deleteEmoticon">
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                                <div id="deleteModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header mod-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><i class="fa fa-close"></i></button>
                                                <h4 class="modal-title" id="myModalLabel">Excluir Imagem?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12 mod-text">
                                                        <p class="modalSingleLineText"><i
                                                                    class="fa fa-exclamation-triangle fa-lg fa-fw"></i>
                                                            Você deseja excluir esta Imagem?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <a href="" class="adp btn-danger btn btn-md">Excluir</a>
                                                <button type="button" class="btn-default btn btn-md"
                                                        data-dismiss="modal">Fechar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </aside>
</div>


<script src="plugins/typeahead/typeahead.js" type="text/javascript"></script>
<script>
    $(".deleteEmoticon").click(function () {
        var id = $(this).attr('id');
        $(".adp").attr('href', 'emoticons.php?delete=' + id);
    });
</script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/bootoption.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>

<script>
    $('.selectpicker').selectpicker();
    $(".alert:not(.no-fadeOut):not(.alert-demo)").delay(3000).fadeOut("slow");
    $(".alert-demo").delay(7000).fadeOut("slow");
</script>
</body>
</html>