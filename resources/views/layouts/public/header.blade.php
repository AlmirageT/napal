<header class="top-header top-header-bg d-none d-xl-block d-lg-block d-md-block" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-7">
                <div class="list-inline">
                    <a href="{{ asset('contacta-con-nosotros') }}"><i class="fa fa-envelope"></i>Contacta con nosotros</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="{{ $redesSociales->where('nombreRedSocial','Facebook')->pluck('rutaRedSocial')->first() }}" class="facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="{{ $redesSociales->where('nombreRedSocial','Twitter')->pluck('rutaRedSocial')->first() }}" class="twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{ $redesSociales->where('nombreRedSocial','Google')->pluck('rutaRedSocial')->first() }}" class="google"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="{{ $redesSociales->where('nombreRedSocial','Linkedin')->pluck('rutaRedSocial')->first() }}" class="linkedin"><i class="fa fa-linkedin"></i> </a>
                    </li>
                    <li>
                        <a href="{{ $redesSociales->where('nombreRedSocial','Instagram')->pluck('rutaRedSocial')->first() }}" class="rss"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="{{ asset('/') }}">
                <img src="{{ asset('img_public/logos/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Área Pública 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ asset('invierte') }}">Invierte</a></li>
                            <li><a class="dropdown-item" href="">Financiate</a></li>
                            <li><a class="dropdown-item" href="">Blog</a></li>
                            <li><a class="dropdown-item" href="{{ asset('estadisticas') }}">Estadisticas</a></li>
                        </ul>
                    </li>
                    @if (Session::has('idUsuario') && Session::has('correo') && Session::has('rut'))
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dashboard
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ asset('dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ asset('dashboard/oportunidades') }}">Invierte</a></li>
                                <li><a class="dropdown-item" href="{{ asset('dashboard/mis-inversiones') }}">Mis inversiones</a></li>
                                <li><a class="dropdown-item" href="{{ asset('dashboard/mi-cuenta') }}">Mi cuenta</a></li>
                                <li><a class="dropdown-item" href="{{ asset('dashboard/documentos-informes') }}">Documentos e informes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-color" href="{{ asset('dashboard/mis-datos') }}">
                                Mis datos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-color" href="#">
                                Notificaciones
                            </a>
                        </li>
                    @endif
                    @if (Session::has('idUsuario') && Session::has('correo') && Session::has('rut'))
                        <form action="{{ asset('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-light nav-link link-color" type="submit"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>Logout</button>
                        </form>
                    @else
                        <li class="nav-item">
                            <a href="{{ asset('login') }}" class="nav-link link-color">Acceder</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('registro') }}" class="nav-link link-color"><i class="fa fa-plus"></i> Registrate</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="#full-page-search" class="nav-link link-color"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
