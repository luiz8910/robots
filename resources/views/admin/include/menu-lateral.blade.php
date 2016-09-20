
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <!-- logo cliente -->
            <li>
                <img class="img-cliente-sidebar" src="assets/img/logo-cliente.png" alt="image">
            </li>
            <!-- end logo cliente -->

            <!-- menu -->
            <li class="active">
                <a class="border-a-menu" href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Dashboard</span>
                </a>
            </li>
            <!--Drop menu -->
            <li>
                <a href="#drop1" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-rss i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Blog</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop1" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="#">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            <span class="margin-font">Escrever novo Post</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="#">
                            <i class="fa fa-rss-square" aria-hidden="true"></i>
                            <span class="margin-font">Minhas Postagens</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="#">
                            <i class="fa fa-commenting " aria-hidden="true"></i>
                            <span class="margin-font">Todas as Postagens</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop3" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-home fa-lg i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Pagina Home</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop3" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="slide-home.html">
                            <i class="fa fa-image" aria-hidden="true"></i>
                            <span class="margin-font">Slide</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="add-slide.html">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Adicionar Slide</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop2" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-users i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Pagina Meus Clientes</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop2" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="descri-cliente.html">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="margin-font">Descrição</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.clientes.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="margin-font">Lista de clientes</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.clientes.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Add novo clientes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop4" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-users i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Pagina Meus Parceiros</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop4" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="descri-cliente.html">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="margin-font">Descrição</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.parceiros.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="margin-font">Lista de Parceiros</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.parceiros.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Add novo Parceiro</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop5" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-briefcase i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Pagina Meus Serviços</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop5" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="descri-servicos.html">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="margin-font">Descrição</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.servicos.index') }}">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span class="margin-font">Lista Meus Serviços</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.servicos.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Add novos Serviços</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop6" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-users i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Pagina Quem Somos</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop6" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.quem-somos.index') }}">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="margin-font">Descrição</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="slide-quem-somos.html">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span class="margin-font">Slide</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop7" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-location-arrow i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Pagina Localização</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop7" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="descri-localizaçao.html">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="margin-font">Descrição</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="endereco.htmlml">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="margin-font">Endereço</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="mapa.html">
                            <i class="fa fa-map" aria-hidden="true"></i>
                            <span class="margin-font">Mapas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop10" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-user i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Equipe</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop10" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="descri-equipe.html">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="margin-font">Descrição</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.equipe.index') }}">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span class="margin-font">Lista Equipe</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.equipe.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Add novo membro equipe</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop8" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-envelope i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Pagina Contato</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop8" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="descri-contato.html">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="margin-font">Descrição</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ url('admin.contato.config') }}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span class="margin-font">Configuração de Email</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop9" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-key i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Usuários do Admin</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop9" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.usuarios.index') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="margin-font">Listar Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.usuarios.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Add Usuarios</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <li>
                <a class="border-a-menu" href="page-social-midia.html">
                    <i class="fa fa-user i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Midia Social</span>
                </a>
            </li>
            <li>
                <a class="border-a-menu" href="dashboard.html">
                    <i class="fa fa-cogs i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Configurações</span>
                </a>
            </li>
            <li>
                <a class="border-a-menu" href="dashboard.html">
                    <i class="fa fa-sign-out i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Sair</span>
                </a>
            </li>


        </ul> <!-- fim ul .sidebar-nav -->
    </div><!-- fim div #sidebar-wrapper -->