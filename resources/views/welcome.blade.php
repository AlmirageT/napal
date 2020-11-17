@extends('layouts.public.app')
@section('content')
<div class="d-none d-sm-block">
    <div class="banner" id="banner">
        @if(count($imagenesWeb) > 0)
            <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item banner-max-height active">
                        <img class="d-block w-100" src="{{ asset($imagenesWeb->shift()->rutaImagenCarrusel) }}" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($imagenesWeb as $imagenWeb)
                        <div class="carousel-item banner-max-height">
                            <img class="d-block w-100" src="{{ asset($imagenWeb->rutaImagenCarrusel) }}" alt="banner-1">
                            <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                                <div class="carousel-content container">
                                    <div class="text-right">
                                        <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                        <p data-animation="animated fadeInUp delay-10s">
                                            This is real estate website template based on Bootstrap 4 framework.
                                        </p>
                                        <a href="index.html" class="btn btn-white">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
                    <span class="slider-mover-left" aria-hidden="true">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a>
                <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
                    <span class="slider-mover-right" aria-hidden="true">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        @else
            <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item banner-max-height active">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-right">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-left">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
                    <span class="slider-mover-left" aria-hidden="true">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a>
                <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
                    <span class="slider-mover-right" aria-hidden="true">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        @endif
        <!-- Search Section start -->

        <!-- Search Section end -->
    </div>
</div>
<div class="d-sm-none d-md-none d-lg-none d-xl-none">
    <div class="banner" id="banner">
        @if(count($imagenesMovil) > 0)
            <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item banner-max-height active">
                        <img class="d-block w-100" src="{{ asset($imagenesMovil->shift()->rutaImagenCarrusel) }}" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($imagenesMovil as $imagenMovil)
                        <div class="carousel-item banner-max-height">
                            <img class="d-block w-100" src="{{ asset($imagenMovil->rutaImagenCarrusel) }}" alt="banner-1">
                            <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                                <div class="carousel-content container">
                                    <div class="text-right">
                                        <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                        <p data-animation="animated fadeInUp delay-10s">
                                            This is real estate website template based on Bootstrap 4 framework.
                                        </p>
                                        <a href="index.html" class="btn btn-white">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
                    <span class="slider-mover-left" aria-hidden="true">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a>
                <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
                    <span class="slider-mover-right" aria-hidden="true">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        @else
            <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item banner-max-height active">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-right">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-left">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
                    <span class="slider-mover-left" aria-hidden="true">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a>
                <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
                    <span class="slider-mover-right" aria-hidden="true">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        @endif
        <!-- Search Section start -->

        <!-- Search Section end -->
    </div>
</div>
<div class="featured-properties content-area-9">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Diversifica todo lo que quieras desde solo $10.000</h1>
            <p>Construye tu cartera de inversión basada en activos inmobiliarios</p>
        </div>

        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @for ($i = 0; $i < count($propiedades); $i++)
                    @php
                        $date1 = new DateTime($propiedades[$i]->fechaInicio);
                        $date2 = new DateTime($propiedades[$i]->fechaFinalizacion);
                        $diff = $date1->diff($date2);
                    @endphp
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <div class="listing-badges">
                                    @if($propiedades[$i]->idTipoFlexibilidad == 1)
                                        <span class="featured">
                                            Flexible
                                        </span>
                                    @endif
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        ${{ number_format($propiedades[$i]->precio,0,',','.') }}
                                    </p>
                                </div>
                                <div id="carouselExampleIndicators{{ $i}}" class="carousel slide" data-ride="">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators{{ $i}}" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators{{ $i}}" data-slide-to="1"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset($propiedades[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
                                        </div>
                                        <div class="carousel-item">
                                          <img class="d-block w-100" src="{{ asset($propiedades[$i]->fotoMapa) }}" alt="Second slide" height="233" width="350">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="{{ asset('detalle') }}/{{ $propiedades[$i]->idPropiedad }}">{{ $propiedades[$i]->nombrePropiedad }}</a>
                                </h1>
                                <div class="location">
                                    <a href="">
                                        <i class="fa fa-map-marker"></i>{{ $propiedades[$i]->direccion1 }}, {{ $propiedades[$i]->nombreRegion }}
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-furniture"></i> 
                                        @if($propiedades[$i]->habitaciones > 1)
                                            {{ $propiedades[$i]->habitaciones }} Habitaciones
                                        @else
                                            {{ $propiedades[$i]->habitaciones }} Habitación
                                        @endif

                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i>
                                        @if($propiedades[$i]->baños > 1)
                                            {{ $propiedades[$i]->baños }} Baños
                                        @else
                                            {{ $propiedades[$i]->baños }} Baño
                                        @endif
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>$250.000 (25%)</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <progress max="100" value="25" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-12">
                                        <p>80 inversores</p>
                                    </div>
                                </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-lg-6" align="center">
                                            <h4>{{ $propiedades[$i]->rentabilidadAnual }}%</h4>
                                            <p>Rentabilidad Anual</p>
                                        </div>
                                        <div class="col-lg-6" align="center">
                                            <h4>{{ $propiedades[$i]->rentabilidadTotal }}%</h4>
                                            <p>Rentabilidad Total</p>
                                        </div>
                                    </div> 
                                <hr>  
                                <div class="row" align="center">
                                    <div class="col-lg-12">
                                        <a href="{{ asset('detalle') }}/{{ $propiedades[$i]->idPropiedad }}" class="btn btn-primary">Invierte</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer clearfix">
                                <div class="pull-left days" align="center">
                                    <p><i class="flaticon-time"></i>Plazo: {!! $diff->days !!} días </p>
                                </div>
                                <ul class="pull-right">
                                    <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                    <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
    <div class="container" align="center">
        <a href="{{ asset('invierte') }}" class="btn btn-primary">Invierte</a>
    </div>
</div>
<!-- Featured Properties end -->
<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-tag"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">967</h1>
                        <p>TIR MEDIA PLATAFORMA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-business"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">1276</h1>
                        <p>CIFRA DE INVERSIÓN ACUMULADA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInRight delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-people"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">396</h1>
                        <p>RENDIMIENTO REPARTIDOS + DEVOLUCIÓN + DE CAPITAL + CCD</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInRight delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-people-1"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">177</h1>
                        <p>N° DE USUARIOS REGISTRADOS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
<div class="container">
    <div align="right">
        <p>LOS VALORES NO SON SOLOS NUMEROS</p>
    </div>
    <div align="right" >
        <a href="{{ asset('estadisticas') }}" class="btn btn-white">Ver Estadisticas</a>
    </div>
</div>

<div class="our-team-2 content-area-3">
    <br>
    <br>
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Confianza</h1>
            <p>Miles de usuarios ya han recogido sus beneficios.</p>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @if(count($casosExitosos) > 0)
                    @foreach($casosExitosos as $casoExitoso)
                        <div class="slick-slide-item">
                            <div class="row team-4">
                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-pad ">
                                    <div class="photo">
                                        <img src="{{ asset($casoExitoso->fotoPrincipal) }}" alt="avatar-10" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-pad align-self-center">
                                    <div class="detail">
                                        <h5>Propiedad</h5>
                                        <h4>
                                            <a href="">{{ $casoExitoso->nombrePropiedad }}</a>
                                        </h4>

                                        <div class="contact">
                                            <ul>
                                                <li>
                                                    <span>Dirección:</span><a href="#"> {{ $casoExitoso->direccion1 }}, {{ $casoExitoso->nombreRegion }}</a>
                                                </li>
                                                <li>
                                                    <span>TIR estimada:</span><a href=""> {{ $casoExitoso->rentabilidadAnual }}%</a>
                                                </li>
                                                <li>
                                                    <span>TIR Entregada:</span><a href=""> {{ $casoExitoso->rentabilidadTotal }}%</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="contact">
                                            <a href="{{ asset('registro') }}" class="btn btn-primary">Registrate</a>
                                        </div>
                                        {{--  
                                        <ul class="social-list clearfix">
                                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="slick-slide-item">
                        <div class="row team-4">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-pad ">
                                <div class="photo">
                                    <img src="http://placehold.it/224x268" alt="avatar-10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-pad align-self-center">
                                <div class="detail">
                                    <h5>Office Manager</h5>
                                    <h4>
                                        <a href="agent-detail.html">Karen Paran</a>
                                    </h4>

                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <span>Direccion:</span><a href="#"> 44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <span>Email:</span><a href="mailto:info@themevessel.com"> info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <span>Mobile:</span><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="contact">
                                        <a href="" class="btn btn-primary">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-4">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-pad ">
                                <div class="photo">
                                    <img src="http://placehold.it/224x268" alt="avatar-10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-pad align-self-center">
                                <div class="detail">
                                    <h5>Office Manager</h5>
                                    <h4>
                                        <a href="agent-detail.html">Karen Paran</a>
                                    </h4>

                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <span>Address:</span><a href="#"> 44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <span>Email:</span><a href="mailto:info@themevessel.com"> info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <span>Mobile:</span><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-4">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-pad ">
                                <div class="photo">
                                    <img src="http://placehold.it/224x268" alt="avatar-10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-pad align-self-center">
                                <div class="detail">
                                    <h5>Office Manager</h5>
                                    <h4>
                                        <a href="agent-detail.html">Karen Paran</a>
                                    </h4>

                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <span>Address:</span><a href="#"> 44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <span>Email:</span><a href="mailto:info@themevessel.com"> info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <span>Mobile:</span><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<div id="smartphone-animation" style="opacity: 1;">
    <div class="separador-60" style="padding: 30px;width: 10px;"></div>
    <style type="text/css">
        #smartphone-display{
            height: 720px;
        }
        #ipad-content{
            width: 477px;
            position: absolute;
            right: 41px;
            top: 68px;
            height: 639px;
            overflow: hidden;
        }
        #div-iphone{
            top: 135px; 
            position: absolute; 
            z-index: 2; 
            left: 76px; 
            width: 100%;
        }
        #iphone-content{
            width: 189px;
            position: absolute;
            right: 40px;
            top: 236px;
            height: 424px;
            overflow: hidden;
        }
        .imagen-ipad-estatica{
            position: absolute;
            z-index: 1;
            width: 585px;
            display: block;
            max-width: 100%;
            height: auto;
            border: 0;
            vertical-align: middle;
        }
        .img-responsive-content{
            display: block; 
            max-width: 100%; 
            height: auto;
            border: 0; 
            vertical-align: middle;
            width: 100%;
            margin-top: 22px; 

        }
        .img-responsive-iphone{
            display: block; 
            max-width: 100%; 
            height: auto;
            position: absolute;
            top: 225px;
            z-index: 2;
            width: 460px;
            right: -90px;
            border: 0; 
            vertical-align: middle;
        }
        .img-iphone-responsive-content{
            display: block; 
            max-width: 100%; 
            height: auto;
            border: 0; 
            vertical-align: middle; 
            width: 189px; 
            margin-top: 18px;
        }

        .aux {
            width: 466px;
            margin-top: 668px;
            margin-left: 12px;
        }
        .aux-iphone{
            margin-top: 880px;
            width: 192px;
        }
        @media only screen and (max-width: 1199px) {
            #ipad-content{
                width: 477px;
                position: absolute;
                right: 41px;
                top: 68px;
                height: 554px;
                overflow: hidden;
            }
            .aux{
                width: 414px;
                margin-top: 550px;
                margin-left: 96px;
            }
            .aux-iphone{
                margin-top: 840px;
                width: 192px;
            }
        }
    </style>
    <div class="container" id="prueba-scroll">
        <div class="row">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <div class="col-md-6 col-lg-6 col-xl-6 d-none d-sm-none d-md-none d-lg-block d-xl-block" id="smartphone-display">
                <div>
                    <img class="imagen-ipad-estatica" src="{{ asset('img_public/ipad.png') }}">
                    <div class="ipad-content" id="ipad-content">
                        <img class="aux" src="{{ asset('img_public/ipad_content_es.png') }}" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                    </div>
                </div>
                <div id="div-iphone">
                    <img class="lazy img-responsive-iphone" src="{{ asset('img_public/iphone.png') }}">
                    <div class="iphone-content" id="iphone-content">
                        <img class="aux-iphone" src="{{ asset('img_public/iphone_content_es.png') }}" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    $(".aux").css({
                        transform: 'translate(0%, -'+((scroll/10)/5)+'%) translate3d(0px, 0px, 0px)',
                    });
                    $(".aux-iphone").css({
                        transform: 'translate(0%, -'+((scroll/10)/5)+'%) translate3d(0px, 0px, 0px)',
                    });
                  });
            </script>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-md-offset-2 title-tech">
                        <h2>Tecnología</h2>
                        <p>Invierte en minutos y no en meses</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-2 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title">Date de alta ahora</div>
                        <div class="investment-text">Es gratis y sencillo.</div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title ">Invierte de forma fácil y flexible</div>
                        <div class="investment-text">Lo hacemos sencillo para ti, 100% online.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-2 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title">Gestiona desde tu área privada</div>
                        <div class="investment-text">Sigue en tiempo real la evolución de tus inversiones.</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title">Diversifica sin límite</div>
                        <div class="investment-text">Invierte donde quieras, como los grandes inversores.</div>
                    </div>
                </div>
                    <br>
                    <br>
                <div class="row">

                    <div class="col-md-12 text-center">
                        <a href="/es/como-funciona" class="btn btn-primary">¿Cómo funciona?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>

<!-- Services 2 start -->
<div class="services-2 content-area-5 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>What are you looking for?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor.</p>
        </div>
        <div class="row wow">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-apartment"></i>
                    <h4>Apartments</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-internet"></i>
                    <h4>Houses</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-vehicle"></i>
                    <h4>Garages</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-coins"></i>
                    <h4>Commercial</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
        </div>
        <div class="text-center read-more-2">
            <a href="services-1.html" class="btn-white">Read More</a>
        </div>
    </div>
</div>
<!-- Services 2 end -->

<!-- Categories strat -->
<div class="categories content-area-8">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Most Popular Places</h1>
            <p>Find Property In Your City</p>
        </div>

        <div class="row wow">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft delay-04s col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Apartment</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">14 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 wow fadeInLeft delay-04s col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">House</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">98 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 wow fadeInUp delay-04s col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Villa</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">98 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 wow fadeInRight delay-04s col-pad d-none d-xl-block d-lg-block">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">Farm</a>
                                </h3>
                                <a href="properties-list-rightside.html" class="category-subtitle">12 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories end-->

<!-- Counters strat -->

<!-- Counters end -->

<!-- Our team 2 start -->
<div class="our-team-2 content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p>Meet out small team that make those great products.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">Martin Smith</a></h5>
                        <h6>Web Developer</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">John Pitarshon</a></h5>
                        <h6>Creative Director</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-none d-xl-block d-lg-block wow fadeInRight delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">Maria Blank</a></h5>
                        <h6>Office Manager</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-none d-xl-block d-lg-block wow fadeInRight delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">Karen Paran</a></h5>
                        <h6>Support Manager</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our team 2 end -->

<!-- Testimonial 3 start -->
<div class="testimonial-3">
    <div class="container">
        <div class="main-title">
            <h1>Our Testimonial</h1>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    Eliane Perei
                                </h5>
                                <h6>Web Developer</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    Maria Blank
                                </h5>
                                <h6>Office Manager</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    Karen Paran
                                </h5>
                                <h6>Support Manager</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    John Pitarshon
                                </h5>
                                <h6>Creative Director</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 3 end -->

<!-- Blog start -->
<div class="blog content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Latest news</h1>
            <p>Check out some recent news posts.</p>
        </div>
        <div class="row wow fadeInUp delay-04s">
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x194" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Antony</a></strong>
                                </li>
                                <li class="mr-0"><span>Feb 31, 2018</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-interface"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Buying a Best House</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x194" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Teseira</a></strong>
                                </li>
                                <li class="mr-0"><span>May 31, 2017</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-interface"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Selling Your Real House</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-none d-xl-block d-lg-block">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x194" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">John Doe</a></strong>
                                </li>
                                <li class="mr-0"><span>May 31, 2017</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-interface"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Find Your Dream Real Estate</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->

<!-- Partners strat -->
<div class="partners">
    <div class="container">
        <h4>Brands $ Partners</h4>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
@endsection
