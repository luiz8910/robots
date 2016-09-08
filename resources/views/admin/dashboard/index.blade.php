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
                jQuery(document).ready(function($) {
                    $('#loading').fadeOut('slow',function(){$(this).remove();});
                });
            </script>
        <div id="submitLoader"></div>
    </head><title>Dashboard | Home</title>
    <script src="plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
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
                                <a href="l#">
                                <i class="fa fa-sign-out"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header> 
    <script type="text/javascript">
	$(function() 
	{
		$("#pages ul").sortable
		({ 
			opacity: 0.8, 
			cursor: 'move',
			axis: "y",
			containment: ".box",
			update: function() 
			{
				var order = $(this).sortable("serialize") + '&update=update';
				$.post("pages.php", order); 															 
			}								  
		});
	});
	</script>
<div class="wrapper row-offcanvas row-offcanvas-left">
@include("admin.menu.menu-lateral")
    
    
<aside class="right-side">
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Dashboard
        </h1>
    </section>
    <div class="content" style="padding:15px !important;">
        <section class="themeStats">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-dashboard"></i> Dashboard</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel b-a">
                        <div class="row m-n">
                            <div class="col-xs-6 b-b b-r">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="red hexagon hover-rotate">
                                            <i class="fa fa-pie-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-danger">392</span>
                                        <small class="text-muted text-u-c">Today Unique Hits</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="green hexagon hover-rotate">
                                            <i class="fa fa-bar-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-success">4,814</span>
                                        <small class="text-muted text-u-c">Weekly Unique Hits</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b b-r">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="red hexagon hover-rotate">
                                            <i class="fa fa-pie-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-danger">2,470</span>
                                        <small class="text-muted text-u-c">Today Pageviews</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="green hexagon hover-rotate">
                                            <i class="fa fa-bar-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-success">22,635</span>
                                        <small class="text-muted text-u-c">Weekly Pageviews</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel b-a">
                        <div class="row m-n">
                            <div class="col-xs-6 b-b b-r">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="sky hexagon hover-rotate">
                                        <i class="fa fa-area-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-info">10,793
                                        </span>
                                        <small class="text-muted text-u-c">Monthly Unique Hits</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="blue hexagon hover-rotate">
                                        <i class="fa fa-line-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-primary">10,793</span>
                                        <small class="text-muted text-u-c">All Time Unique Hits</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b b-r">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="sky hexagon hover-rotate">
                                            <i class="fa fa-area-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-info">56,186
                                        </span>
                                        <small class="text-muted text-u-c">Monthly Pageviews</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="blue hexagon hover-rotate">
                                            <i class="fa fa-line-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-primary">56,186</span>
                                        <small class="text-muted text-u-c">All Time Pageviews</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel b-a">
                        <div class="row m-n">
                            <div class="col-xs-6 b-b b-r">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="red hexagon hover-rotate">
                                        <i class="fa fa-pie-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-danger">769</span>
                                        <small class="text-muted text-u-c">Today Post Clicks</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="green hexagon hover-rotate">
                                            <i class="fa fa-bar-chart"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-success">6,252</span>
                                        <small class="text-muted text-u-c">Weekly Post Clicks</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b b-r">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="red hexagon hover-rotate">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                        <span class="h3 block m-t-xs text-danger">14</span>
                                        <small class="text-muted text-u-c">Pending Posts</small>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-6 b-b">
                                <a href="#" class="block padder-v hover">
                                    <span class="i-s i-s-2x pull-left m-r-sm">
                                        <div class="green hexagon hover-rotate">
                                            <i class="fa fa-columns"></i>
                                        </div>
                                    </span>
                                    <span class="clear">
                                    <span class="h3 block m-t-xs text-success">10</span>
                                    <small class="text-muted text-u-c">Today's Posts</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div><br> 
        
        
        </div>
    </aside>

</div>
        <script>
            $(".deletePage").click(function(){
                var id = $(this).attr('id');
                $(".adp").attr('href','pages.php?delete='+id);
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
