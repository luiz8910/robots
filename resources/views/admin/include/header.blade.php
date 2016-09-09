<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
                <a href="#menu-toggle" id="menu-toggle">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </button>
            <a href="{{ route('admin.dashboard.index') }}">
                <img class="img-robots-header" src="assets/img/logo-robots.png" alt="image">
                <div class="font-logo-header"></div>
            </a>
        </div> <!-- fim div .navbar-header -->

        <div class="navbar-collapse collapse" id="">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" target="_blank">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        Visualizar site
                    </a>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Steve Zoe
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.usuarios.edit') }}"><i class="fa fa-user" aria-hidden="true"></i> Perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
                    </ul> <!-- fim ul .dropdown-menu -->
                </li> <!-- fim li .dropdown -->
            </ul> <!-- fim ul .nav .nav-bar .navbar-right -->
        </div> <!-- fim div .navbar-collapse .collapse #navbarCollapse -->
    </div> <!-- fim div .container -->
</nav> <!-- fim nav .navbar .navbar-inverse .navbar-fixed-top -->