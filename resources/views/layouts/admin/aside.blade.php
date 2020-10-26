<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu Administrador</li>
                <li>
                    <a href="" class="waves-effect">
                        <i class="bx bx-home-circle"></i><!--</i><span class="badge badge-pill badge-info float-right">03</span>-->
                        <span>Dashboard</span>
                    </a>
                    <!--<ul class="sub-menu" aria-expanded="false">
                        <li><a href="index.html">Default</a></li>
                        <li><a href="dashboard-saas.html">Saas</a></li>
                        <li><a href="dashboard-crypto.html">Crypto</a></li>
                    </ul>-->
                </li>
                <li class="menu-title">Apps</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/usuarios') }}"><i class="bx bxs-user-detail"></i> Usuarios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-building-house"></i>
                        <span>Proyectos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/proyectos') }}"><i class="bx bx-buildings"></i> Proyectos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home"></i>
                        <span>Propiedades</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/propiedades') }}"><i class="bx bx-home-alt"></i> Propiedades</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=""><i class="bx bx-store-alt"></i> Tienda</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home"></i>
                        <span>Mantenedores</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos_usuarios') }}"><i class="bx bx-home-alt"></i>Tipo de Usuario</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos_personas') }}"><i class="bx bx-store-alt"></i>Tipo de Persona</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos-creditos') }}"><i class="bx bx-store-alt"></i>Tipo de Credito</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos_inversiones') }}"><i class="bx bx-store-alt"></i>Tipo de Inversión</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos_telefonos') }}"><i class="bx bx-store-alt"></i>Tipo de Télefono</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos_flexibilidades') }}"><i class="bx bx-store-alt"></i>Tipo de Flexibilidad</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos_estados') }}"><i class="bx bx-store-alt"></i>Tipo de Estado</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos-documentos') }}"><i class="bx bx-store-alt"></i>Tipo de Documento</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos-calidades') }}"><i class="bx bx-store-alt"></i>Tipo de Calidad</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/monedas') }}"><i class="bx bx-store-alt"></i>Moneda</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/idiomas') }}"><i class="bx bx-store-alt"></i>Idioma</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/estados') }}"><i class="bx bx-store-alt"></i>Estado</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Fidelizador</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=""><i class="far fa-newspaper"></i> Noticias</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=""><i class="fas fa-align-justify"></i>Testimonios</a></li>
                    </ul>
                </li>
                <!--Link a vista parametros generales. -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-book"></i>
                        <span>Parametros Generales</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/parametros-generales') }}"><i class="bx bxs-book"></i> Parametros Generales</a></li>
                    </ul>
                </li>
                <!--Link a vista Comunas. -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-city"></i>
                        <span>Comunas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=""><i class="bx bxs-city"></i> Comunas</a></li>
                    </ul>
                </li>
                <!--Link a vista Configuracion -> notarias, empresas -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-help-circle"></i>
                        <span>Configuracion</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=""><i class="bx bxs-home"></i> Notarias</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=""><i class="far fa-building"></i>Empresas</a></li>
                    </ul>
                </li>

                <!--Link Empresas -->
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>