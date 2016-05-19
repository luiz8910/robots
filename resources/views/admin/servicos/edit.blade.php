<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="../images/favicon.png?1458406499">
        <link href="/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="/css/bootoption.css" rel="stylesheet" type="text/css"/>
        <link href="/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="/css/theme-orangeblue.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="/js/jquery.js"></script>
        <link href="/css/preloader.css" rel="stylesheet">
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
                jQuery(document).ready(function($) {
                    $('#loading').fadeOut('slow',function(){$(this).remove();});
                });
            </script>
        <div id="submitLoader"></div>
    </head>
    
    <body class="skin-blue">
        <header class="header">
            <a target="_blank" href="" class="logo secondary-bg-color">
                <img src="/images/logo-h2o-painel.png">
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
                                    <a href="l#">
                                    <i class="fa fa-sign-out"></i> Sair</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <title>Dashboard | Add Servi&ccedil;os</title>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        @include("admin.menu.menu-lateral")

    <aside class="right-side">
        <section class="content-header">
            <h1>
                <i class="fa fa-briefcase"></i> Adicionar Servi&ccedil;os - {{ $servico->nome }}
            </h1>
        </section>
        <section class="content">
            <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                <div class="box-header">
                        @include("errors._check")
                    </div>
                <div class="box box-warning">
                    <div class="box-body">
                        {!! Form::model($servico, ["route" => ["admin.servicos.update", $servico->id]]) !!}
                        <!--<form role="form" method="POST">-->

                            @include("admin.servicos._form")

                            {{--<input type="hidden" name="csrf" value="2d091f728d9dab2effce82c7a467c317f95070f5"/>--}}
                            <div class="form-group">
                                {{--<button class="btn btn-success" id="sendEmail" name="submit">--}}
                                    {{--Atualizar <i class="fa fa-pencil-square-o"></i>--}}
                                {{--</button>--}}
                                {!! Form::submit("Alterar", ["class" => "btn btn-success", "id" => "sendEmail"]) !!}
                            </div>
                        <!--</form>-->{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </aside>
    </div>



        <link rel="stylesheet" type="text/css" href="/plugins/tagsInput/tagsinput.css"/>
        <script src="/plugins/tagsInput/tagsinput.js"></script>
        <script type="text/javascript">
            function onAddTag(tag)
            {
                alert("Added a tag: " + tag);
            }
            function onRemoveTag(tag)
            {
                alert("Removed a tag: " + tag);
            }
            function onChangeTag(input,tag)
            {
                alert("Changed a tag: " + tag);
            }
            $(function() {
                $('#keywords').tagsInput({width:'auto'});
            });
        </script>
        <script type="text/javascript" src="js/iconset-fontawesome-4.2.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-iconpicker.min.js"></script>
        <script src="/js/bootstrap.js" type="text/javascript"></script>
        <script src="/js/bootoption.js" type="text/javascript"></script>
        <script src="/js/app.js" type="text/javascript"></script>
        <script>
            $('.selectpicker').selectpicker();
            $(".alert:not(.no-fadeOut):not(.alert-demo)").delay(3000).fadeOut("slow");
            $(".alert-demo").delay(7000).fadeOut("slow");
        </script>
    </body>
</html>
