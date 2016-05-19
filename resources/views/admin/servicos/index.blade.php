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
</head>
    <title>Dashboard | Servi&ccedil;os</title>
<link href="plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
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
                                <a href="#">
                                <i class="fa fa-sign-out"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <script>
$(function() {
	$(".connectedSortable")
	.sortable({
		connectWith:['.connectedSortable'],
		placeholder: "ui-sortable-placeholder", 
		forcePlaceholderSize: true,
		update : function () {
			serial = $(this).sortable('serialize');
			$.ajax({
				url: "categories.php",
				type: "post",
				data: serial,
				error: function(){
					alert("theres an error with AJAX");
				}
			});
		}
	})
	.droppable({
		accept: '.connectedSortable > div',
		drop: function(event,ui) {
			var categoryname=ui.draggable.attr('name');
			var parent=$(this).attr('id');
			set(parent,categoryname);
		}
	})
	.disableSelection();
	$(".edit").click(function(){
		 var url = $(this).attr("href");
		$(location).attr('href',url);
		return false;
	});
	$(".delete").click(function(){
		 var url = $(this).attr("href");
		$(location).attr('href',url);
		return false;
	});	 		
	var $tabs = $( "#tabs" ).accordion ({
		heightStyle: "content",
		collapsible: true,
		header: ".h3",
		active:false,
		beforeActivate: function(event, ui) {
			// The accordion believes a panel is being opened
			if (ui.newHeader[0]) {
				var currHeader  = ui.newHeader;
				var currContent = currHeader.next('.ui-accordion-content');
			// The accordion believes a panel is being closed
			}
			else {
				var currHeader  = ui.oldHeader;
				var currContent = currHeader.next('.ui-accordion-content');
			}
			// Since we've changed the default behavior, this detects the actual status
			var isPanelSelected = currHeader.attr('aria-selected') == 'true';

			// Toggle the panel's header
			currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));

			// Toggle the panel's icon
			currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e',isPanelSelected).toggleClass('ui-icon-triangle-1-s',!isPanelSelected);

			// Toggle the panel's content
			currContent.toggleClass('accordion-content-active',!isPanelSelected)    
			if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }

			return false; // Cancel the default action
		}
	})
});
function set(parent,categoryname){
	$.ajax({
		url: "categories.php",
		type: "post",
		data:  "parent="+parent+"&name="+categoryname,
	});
}
$(function() { 
	$( "#tabs" )
		.sortable({
			axis: "y",
			placeholder: "ui-sortable-placeholder", 
			forcePlaceholderSize: true,
			handle: ".h3",
			stop: function( event, ui ) {
				ui.item.children( ".h3" ).triggerHandler( "focusout" );
			},
			update : function () {
				serial = $('#tabs').sortable('serialize');
				$.ajax({
					url: "categories.php",
					type: "post",
					data: serial,
					error: function(){
						//alert("theres an error with AJAX");
					}
				});
			}
		});
});
</script>
    
    
<div class="wrapper row-offcanvas row-offcanvas-left">

    @include("admin.menu.menu-lateral")

    <aside class="right-side">
        <section class="content-header">
        <h1>
            <i class="fa fa-briefcase"></i> Meus Servi&ccedil;os
        </h1>
        </section>
        <section class="content">
            <div class="table-responsive">
                <div class="box-header">

                </div>
                <a href="{{ route("admin.servicos.create") }}" class="btn btn-success" style="margin: 0px 0px 15px 0px;">
                    <i class="fa fa-plus"></i> Add Servi&ccedil;os
                </a>
                <div class="custom-width">
                    <div class="col-xs-4 align-center main-heading">Nome </div>
                    <div class="col-xs-4 align-center main-heading">Icone</div>
                    <div class="col-xs-4 align-center main-heading">A&ccedil;&atilde;o</div>
                </div>

                <div id="tabs">
                    @foreach($servico as $s)
                        <div class="col-xs-12 list tabs-1">
                            <div class="row h3 cat liststyle">
                                <div class="col-xs-4 align-center" style="padding:12px">
                                    {{ $s->nome }}
                                </div>
                                <div class="col-xs-4 align-center" style="padding:12px">

                                    <i class="fa fa-magic"></i>

                                </div>

                                <div class="col-xs-4 text-right" style="padding:12px">
                                    <a style="color:white" class="btn btn-info edit btn-sm" href="{{ route("admin.servicos.edit", ["id" => $s->id]) }}" title="Editar Serviço">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a> <span> </span>
                                <a style='color:white' class='btn btn-danger delete btn-sm' href='{{ route("admin.servicos.destroy", ["id" => $s->id]) }}'><i class='fa fa-trash'></i></a></div>
                            </div>
                            <div id="1" class="connectedSortable ui-helper-reset">
                                <div class="col-xs-12 list-sub ui-state-default" id="subarrayorder_13" name="Health">
                                    <div class="col-xs-12 align-center sub-heading" style="padding:12px">
                                        {{ $s->descricao }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </aside>
</div>
    
<script src="/js/bootstrap.js" type="text/javascript"></script>
<script src="/js/bootoption.js" type="text/javascript"></script>
<script src="/js/app.js" type="text/javascript"></script>
<script>
	$('.selectpicker').selectpicker();
	$(".alert:not(.no-fadeOut):not(.alert-demo)").delay(3000).fadeOut("slow");
	$(".alert-demo").delay(7000).fadeOut("slow");
</script></body>
</html>
