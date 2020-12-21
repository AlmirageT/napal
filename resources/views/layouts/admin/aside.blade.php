<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu Administrador</li>
                <li>
                    <a href="{{ asset('napalm/home') }}" class="waves-effect">
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
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/usuarios/validar-transferencia') }}"><i class="bx bxs-user-detail"></i> Transferencias Bancarias</a></li>
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
                   {{--  <ul class="sub-menu" aria-expanded="false">
                                                                                                    <li><a href=""><i class="bx bx-store-alt"></i> Tienda</a></li>
                                                                                                </ul> --}}
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Faqs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/faqs') }}"><i class="bx bxs-user-detail"></i> Faqs</a></li>
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
                        <li><a href="{{ asset('napalm/tipos-medio-pago') }}"><i class="bx bx-store-alt"></i>Tipo Medio de Pago</a></li>
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
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/tipos-faqs') }}"><i class="bx bx-store-alt"></i>Tipo Faq</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Transacciones</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/ingresos') }}"><i class="far fa-newspaper"></i> Ingresos</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/egresos') }}"><i class="fas fa-align-justify"></i> Egresos</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/destinos-egresos') }}"><i class="fas fa-align-justify"></i> Destinos Egresos</a></li>
                    </ul>
                </li>
                <!--Link a vista parametros generales. -->
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-help-circle"></i>
                        <span>Documentos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/subir-documentos') }}"><i class="bx bxs-home"></i> Subir Documento</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-city"></i>
                        <span>Ubicación</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/paises') }}"><i class="bx bxs-city"></i> Paises</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/regiones') }}"><i class="bx bxs-city"></i> Regiones</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/provincias') }}"><i class="bx bxs-city"></i> Provincias</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/comunas') }}"><i class="bx bxs-city"></i> Comunas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-city"></i>
                        <span>Carrusel</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/imagenes-carrusel') }}"><i class="bx bxs-city"></i> Imagenes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-book"></i>
                        <span>Casos Exitosos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/casos-exitosos') }}"><i class="bx bxs-book"></i> Casos Exitosos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-book"></i>
                        <span>Parametros Generales</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/parametros-generales') }}"><i class="bx bxs-book"></i> Parametros Generales</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/redes-sociales') }}"><i class="bx bxs-book"></i> Redes Sociales</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/codigos-promocionales') }}"><i class="bx bxs-book"></i> Códigos Promocionales</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/condiciones-servicios') }}"><i class="bx bxs-book"></i> Condiciones y Servicios</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/mision-empresa') }}"><i class="bx bxs-book"></i> Misión Empresa</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/cambio-dolar') }}"><i class="bx bxs-book"></i> Cambio Dolar</a></li>
                    </ul>
                    
                </li>
                <!--Link a vista Comunas. -->
                
                <!--Link a vista Configuracion -> notarias, empresas -->
                

                <!--Link Empresas -->
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>