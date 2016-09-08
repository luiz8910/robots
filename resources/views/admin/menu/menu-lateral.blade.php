<aside class="left-side sidebar-offcanvas">
    <script src="js/jquery.lockfixed.js"></script>
    <section class="sidebar sidebarMenuScroll">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route("admin.dashboard.index") }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="listar-slide.html">
                            <i class="fa fa-th"></i>Listar Slide
                        </a>
                    </li>
                    <li>
                        <a href="add-slide.html">
                            <i class="fa fa-plus-square-o "></i> Adicionar Slide
                        </a>
                    </li>
                    <li>
                        <a href="listar-carrosel-parceiros.html">
                            <i class="fa fa-newspaper-o"></i> Listar Carrosel Parceiros
                        </a>
                    </li>
                    <li>
                        <a href="add-carrosel-parceiros.html">
                            <i class="fa fa-plus-square-o "></i> Add Carrosel Parceiros
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>Servi&ccedil;os</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="listar-servicos.html">
                            <i class="fa fa-commenting"></i>Descri&ccedil;&atilde;o
                        </a>
                    </li>
                    <li >
                        <a href="{{ route("admin.servicos.index") }}">
                            <i class="fa fa-briefcase"></i> Meus Servi&ccedil;os
                        </a>
                    </li>
                    <li  >
                        <a href="minhas-skill.html">
                            <i class="fa fa-tasks"></i> Minhas Skills
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-industry "></i>
                    <span>Clientes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="addLink.php">
                            <i class="fa fa-commenting"></i> Descri&ccedil;&atilde;o
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("admin.clientes.index") }}">
                            <i class="fa fa-align-left"></i> Listas de Clientes
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Parceiros</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-commenting"></i> Descri&ccedil;&atilde;o
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-align-left"></i> Listas de Parceiros
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Quem somos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route("admin.quem-somos.index") }}">
                            <i class="fa fa-commenting"></i> Listar Imagens
                        </a>
                        <a href="{{ route("admin.quem-somos.create") }}">
                            <i class="fa fa-commenting"></i> Adicionar Nova Imagem
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("admin.institucional.edit") }}">
                            <i class="fa fa-th"></i> Editar Textos Institucionais
                        </a>


                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Equipe</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="">
                            <i class="fa fa-commenting"></i> Descri&ccedil;&atilde;o
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-user-plus"></i> Adicionar
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-align-left"></i> Listar Equipe
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Contatos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="">
                            <i class="fa fa-align-left"></i> Listar Inscritos (23)
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-cogs"></i> Configurar e-mail
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-paint-brush"></i> Templates e-mail
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-paper-plane"></i>
                    <span>Newsletter</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="">
                            <i class="fa fa-align-left"></i> Listar Inscritos (23)
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-cogs"></i> Configurar e-mail
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-paint-brush"></i> Templates e-mail
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-key"></i>
                    <span>Usuarios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="">
                            <i class="fa fa-align-left"></i> Listar Usuarios (23)
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-user-plus"></i> adicionar
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="">
                    <i class="fa fa-thumbs-up"></i> Social Midia
                </a>
            </li>
            <li class="">
                <a href="">
                    <i class="fa fa-cog"></i> Configura&ccedil;&atilde;o
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i> Sair
                </a>
            </li>
        </ul>
    </section>


    <script>
        /* (function($) {
         $.lockfixed(".sidebarMenuScroll",{offset: {top: 0, bottom: 0}});
         })(jQuery); */

    </script> </aside>