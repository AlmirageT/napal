@extends('layouts.public.app')
@section('title','Bienvenido')
@section('css')
  <style>
        
        .box {
            width: 100%;
            height: auto;
            border: solid 2px #000;

          
        }
        .footer-box {
            display: flex;
            justify-content: center;
            width: 70%;
            margin: auto;
            align-items: center;
          
        }
    
        .contenedor-box {
            
            display: flex;
            width: 100%;
             margin: auto;
             padding: 10px;
        }
        
        .cajas {
            display: flex;
            padding: 10px;
            align-items: center;
            width: 50%;
            border-right: solid 1px #000; 
        }

          .cajas1 {
            display: flex;
            padding: 10px;
            align-items: center;
            width: 50%;
         
        }
        
        
      
        .dato {
            font-size: 15px;
            font-family: sans-serif;
        }
        
        .footer-texto {
        margin-left: 10px;
        }
        
    </style>
@endsection
@section('content')
<div class="d-none d-sm-block">
    <div class="banner" id="banner">
        @if(count($imagenesWeb) > 0)
        @php
            $imagenUno = $imagenesWeb->shift();
        @endphp
            <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item banner-max-height active">
                        <img class="d-block w-100" src="{{ asset($imagenUno->rutaImagenCarrusel) }}" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">
                                        @if($imagenUno->tituloImagenCarrusel != null)
                                            {{ $imagenUno->tituloImagenCarrusel }}
                                        @endif
                                    </h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        @if($imagenUno->subTituloImagenCarrusel != null)
                                            {{ $imagenUno->subTituloImagenCarrusel }}
                                        @endif
                                    </p>
                                    {{-- <a href="index.html" class="btn btn-white">Read More</a> --}}
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
                                        <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">
                                            @if($imagenWeb->tituloImagenCarrusel != null)
                                                {{ $imagenWeb->tituloImagenCarrusel }}
                                            @endif
                                        </h3>
                                        <p data-animation="animated fadeInUp delay-10s">
                                            @if($imagenWeb->subTituloImagenCarrusel != null)
                                                {{ $imagenWeb->subTituloImagenCarrusel }}
                                            @endif
                                        </p>
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
    <br>
    <br>
    
<div class="counters overview-bgi">

    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h5 style="color: #fff;">{!! $misionEmpresa->textoMisionEmpresa !!}</h5>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="featured-properties content-area-9">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Diversifica todo lo que quieras desde solo $10.000</h1>
            <p>Construye tu cartera de inversión basada en activos inmobiliarios</p>
        </div>
        <div class="row">
            @for ($i = 0; $i < count($propiedades); $i++)
                @php
                    $date1 = new DateTime($propiedades[$i]->fechaInicio);
                    $date2 = new DateTime($propiedades[$i]->fechaFinalizacion);
                    $diff = $date1->diff($date2);
                @endphp
                <div class="col-lg-4">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <div class="listing-badges">
                                <span style="cursor: pointer;" class="featured" onclick="pruebaId({{ $propiedades[$i]->idPropiedad }},{{ $i }})">
                                    <i class="fa fa-map-marker" style="color:#fff"></i>
                                    <img src="" class="img-responsive" alt="Ver mapa" title="Ver mapa">
                                </span>
                                <script type="text/javascript">
                                    function pruebaId(idPropiedad, valor){
                                        idUno = 'carouselExampleIndicators'+valor;
                                        idDos = 'carouselExampleIndicatorss'+valor;
                                        if(document.getElementById(idUno).style.display == 'none' && document.getElementById(idDos).style.display == 'block'){
                                            document.getElementById(idUno).style.display = 'block';
                                            document.getElementById(idDos).style.display = 'none';
                                        }else{
                                            document.getElementById(idUno).style.display = 'none';
                                            document.getElementById(idDos).style.display = 'block';
                                        }
                                    }
                                </script>
                            </div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    ${{ number_format($propiedades[$i]->precio,0,',','.') }}
                                </p>
                            </div>
                            <div id="carouselExampleIndicators{{ $i}}" class="carousel slide" data-ride="" style="display: block">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset($propiedades[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
                                    </div>
                                </div>
                            </div>
                            <div id="carouselExampleIndicatorss{{ $i}}" class="carousel slide" data-ride="" style="display: none">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset($propiedades[$i]->fotoMapa) }}" alt="First slide" height="233" width="350">
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
{{--  
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
                                    <span style="cursor: pointer;" class="featured" onclick="pruebaId({{ $propiedades[$i]->idPropiedad }},{{ $i }})">
                                        Flexible
                                    </span>
                                    <script type="text/javascript">
                                        function pruebaId(idPropiedad, valor){
                                            idUno = 'carouselExampleIndicators'+valor;
                                            idDos = 'carouselExampleIndicatorss'+valor;
                                            if(document.getElementById(idUno).style.display == 'none' && document.getElementById(idDos).style.display == 'block'){
                                                document.getElementById(idUno).style.display = 'block';
                                                document.getElementById(idDos).style.display = 'none';
                                            }else{
                                                document.getElementById(idUno).style.display = 'none';
                                                document.getElementById(idDos).style.display = 'block';
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        ${{ number_format($propiedades[$i]->precio,0,',','.') }}
                                    </p>
                                </div>
                                <div id="carouselExampleIndicators{{ $i}}" class="carousel slide" data-ride="" style="display: block">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset($propiedades[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
                                        </div>
                                    </div>
                                </div>
                                <div id="carouselExampleIndicatorss{{ $i}}" class="carousel slide" data-ride="" style="display: none">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset($propiedades[$i]->fotoMapa) }}" alt="First slide" height="233" width="350">
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
--}}
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
        <br>
        <h4>LOS VALORES NO SON SOLOS NUMEROS</h4>
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
                                        <img src="{{ asset($casoExitoso->fotoPrincipal) }}" alt="avatar-10" height="268" width="224">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-pad align-self-center">
                                    <div class="detail">
                                        <h4>Caso de Exito</h4>
                                        <h3>
                                           {{ $casoExitoso->nombrePropiedad }}
                                        </h3>
                                            <!-- Cajita -->
                                        <div class="contact">
                                            <div class="box">
                                                <div class="contenedor-box">
                                                  <div class="cajas" align="center">
                                                   <p class="dato">{{ $casoExitoso->rentabilidadAnual }}% <br> TIR estimada</p>
                                                  </div>
                                                     
                                                    <div class="cajas1" align="center">
                                                        <p class="dato">{{ $casoExitoso->rentabilidadTotal }}% <br>TIR entregada</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="footer-box">
                                                    <p class="dato">8'27%</p>
                                                      <p class="footer-texto" style="color: red">RENTABILIDAD NETA ACUMULADA </p>
                                                </div>
                                            </div>
                                            {{-- 
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
                                            --}}
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
        <div class="contact" align="center">
            <a href="{{ asset('registro') }}" class="btn btn-primary">Registrate</a>
        </div>
    </div>
</div>
<div id="smartphone-animation" style="opacity: 1;">
    @include('scroll')
</div>
<style type="text/css">
    .latimagen{
        height: 100%;
        width: 100%;
    }
</style>
<!-- Services 2 start -->
<div class="services-2 content-area-5 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5" align="left">
                <h1>Únicos, la primera plataforma pan-europea de inversión inmobiliaria.</h1>
                <p>España, Italia y Portugal a un solo clic. <br>Empieza ya, pon tu dinero a trabajar. <br></p>
                <div align="center">
                    <a href="{{ asset('invierte') }}" class="btn btn-danger"><small>INVIERTE</small></a>
                </div>
                <br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                <img src="{{ asset('img/mapa/latinoamerica.png') }}" class="latimagen">
            </div>
        </div>
    </div>
</div>

@endsection
