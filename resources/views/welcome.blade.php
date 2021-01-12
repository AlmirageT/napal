@extends('layouts.public.app')
{{--  
@section('meta')
    <meta property="og:url" content="" >
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Inverte en nuestra propiedad " >
    <meta property="og:description" content="Aprovecha esta oportunidad única para finalmente obtener tu independecia financiera" >
    <meta property="og:image" content="" >
    <meta property="og:image:width" content="200" >
    <meta property="og:image:height" content="200" >
@endsection--}}
@section('title','Bienvenid@')
@section('css')
  <style>

    .prueba-giro{
        -webkit-transition: 0.8s;
        -moz-transition: 0.8s;
        -ms-transition: 0.8s;
        -o-transition: 0.8s;
        transition: 0.8s;
        margin-left: 100% !important;
    }
    .prueba-giro-mapa{
        -webkit-transition: 0.8s;
        -moz-transition: 0.8s;
        -ms-transition: 0.8s;
        -o-transition: 0.8s;
        transition: 0.8s;
        margin-left: 0% !important;
    }
    .prueba-giro-vuelta{
        -webkit-transition: 0.8s;
        -moz-transition: 0.8s;
        -ms-transition: 0.8s;
        -o-transition: 0.8s;
        transition: 0.8s;
        margin-left: 0% !important;
    }
    .prueba-giro-flex{
        -webkit-transition: 0.8s;
        -moz-transition: 0.8s;
        -ms-transition: 0.8s;
        -o-transition: 0.8s;
        transition: 0.8s;
        margin-left: 75% !important;
    }
    .prueba-giro-mapa-vuelta{
        -webkit-transition: 0.8s;
        -moz-transition: 0.8s;
        -ms-transition: 0.8s;
        -o-transition: 0.8s;
        transition: 0.8s;
        margin-left: -100% !important;
    }
    .imagen-datos-prueba{
        margin-top: -233px;
        margin-left: -349px;
    }
    .a{
        background-color: #ECD74C;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }
    .aa{
        background-color: #FDFF2C;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }
    .aaa{
        background-color: #F7FF78;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }

    .b{
        background-color: #FFAD54;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }
    .bb{
        background-color: #F59C1E;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }
    .bbb{
        background-color: #F7B933;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }
    .c{
        background-color: #FF0404;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }
    .cc{
        background-color: #FF4D1D;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }
    .ccc{
        background-color: #FF5C03;
        color: #333;
        border-radius: 5px;
        padding: 3px;
    }

    .box {
        width: 100%;
        height: auto;
        border: solid 1px #000000;
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
        border-right: solid 1px #000000;
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
    .circulo {
        width: 80px;
        height: 80px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: rgba(255, 0, 0, 0.5);
        margin-top: -180px;
        position: absolute;
        margin-left: 264px;
    }
    .flex{
        margin-top: 27px;
        font-size: 25px;
        color: white;
        text-align: center;
    }
    .rectangulo {
        width: 150px; 
        height: 70px;
        background-color: rgba(0, 40, 255, 0.5);
        position: absolute;
        margin-top: -140px;
    }
    .tituloRentabilidad{
        color: white;
        font-size: 16px;
        font-weight: bold;
        margin-left: 5px;
    }
    .valorRentabilidad{
        color: white;
        font-size: 36px;
        font-weight: bold;
        margin-top: -10px;
        margin-left: 12px;
    }
    .cuadrado {
        width: 40px; 
        height: 40px; 
        background: #fbd334 ;
        position: absolute;
        z-index: 1;
        margin-left: 110px;
        cursor: pointer;
    }
    .cruz {
        position: absolute;
        z-index: 1;
        margin-left: 310px;
        cursor: pointer;
    }
    @media only screen and (min-width:360px) and (max-width: 374px) {
        .cuadrado{
            margin-left: 90px;
        }
        .circulo{
            margin-left: 235px;
        }
    }
    @media only screen and (min-width:375px) and (max-width: 413px) {
        .cuadrado{
            margin-left: 105px;
        }
        .circulo{
            margin-left: 255px;
        }
    }
    @media only screen and (min-width:553px) and (max-width: 558px) {
        .cuadrado{
            margin-left: 288px;
        }
        .circulo{
            margin-left: 415px;
        }
    }
    @media only screen and (min-width:559px) and (max-width: 563px) {
        .cuadrado{
            margin-left: 294px;
        }
        .circulo{
            margin-left: 415px;
        }
    }
    @media only screen and (min-width:564px) and (max-width: 569px) {
        .cuadrado{
            margin-left: 299px;
        }
        .circulo{
            margin-left: 415px;
        }
    }
    @media only screen and (min-width:570px) and (max-width: 575px) {
        .cuadrado{
            margin-left: 305px;
        }
        .circulo{
            margin-left: 415px;
        }
    }
    @media only screen and (min-width:576px) and (max-width: 767px) {
        .cuadrado{
            margin-left: 4px;
        }
        .circulo{
            margin-left: 157px;
        }
    }
    @media only screen and (min-width:768px) and (max-width: 991px) {
        .cuadrado{
            margin-left: 92px;
        }
        .circulo{
            margin-left: 238px;
        }
    }
    @media only screen and (min-width:992px) and (max-width: 1199px) {
        .cuadrado{
            margin-left: 50px;
        }
        .circulo{
            margin-left: 199px;
        }
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
                        <div class="carousel-caption d-flex h-100 text-center">
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
                                    {{-- <a href="" class="btn btn-white">Read More</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($imagenesWeb as $imagenWeb)
                        <div class="carousel-item banner-max-height">
                            <img class="d-block w-100" src="{{ asset($imagenWeb->rutaImagenCarrusel) }}" alt="banner-1">
                            <div class="carousel-caption d-flex h-100 text-center">
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
                        <div class="carousel-caption d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-right">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-left">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        
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
            <div id="bannerCarousolePhone" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item banner-max-height active">
                        <img class="d-block w-100" src="{{ asset($imagenesMovil->shift()->rutaImagenCarrusel) }}" alt="banner-1">
                        <div class="carousel-caption d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($imagenesMovil as $imagenMovil)
                        <div class="carousel-item banner-max-height">
                            <img class="d-block w-100" src="{{ asset($imagenMovil->rutaImagenCarrusel) }}" alt="banner-1">
                            <div class="carousel-caption d-flex h-100 text-center">
                                <div class="carousel-content container">
                                    <div class="text-right">
                                        <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                        <p data-animation="animated fadeInUp delay-10s">
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#bannerCarousolePhone" role="button" data-slide="prev">
                    <span class="slider-mover-left" aria-hidden="true">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a>
                <a class="carousel-control-next" href="#bannerCarousolePhone" role="button" data-slide="next">
                    <span class="slider-mover-right" aria-hidden="true">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        @else
            <div id="bannerCarousolePhone" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item banner-max-height active">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        
                                    </p>
                                    <a href="" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-right">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        
                                    </p>
                                    <a href="" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                        <div class="carousel-caption d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-left">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s"></h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        
                                    </p>
                                    <a href="" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#bannerCarousolePhone" role="button" data-slide="prev">
                    <span class="slider-mover-left" aria-hidden="true">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a>
                <a class="carousel-control-next" href="#bannerCarousolePhone" role="button" data-slide="next">
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
    
<div class="" style="background-color: black">
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h5 style="color: #fbd334;">{!! $misionEmpresa->textoMisionEmpresa !!}</h5>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="featured-properties content-area-9 carta-transition">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Diversifica todo lo que quieras desde solo ${{ number_format($valorInicio->valorParametroGeneral,0,',','.') }}</h1>
            <p>Construye tu cartera de inversión basada en activos inmobiliarios</p>
        </div>
        <div class="row">
            @for ($i = 0; $i < count($propiedades); $i++)
                @php
                    $date1 = new DateTime($propiedades[$i]->fechaInicio);
                    $date2 = new DateTime($propiedades[$i]->fechaFinalizacion);
                    $diff = $date1->diff($date2);
                @endphp
                @php
                    $suma = 0;
                    $porcentaje = 0;
                    $datos = $ingresos->where('idPropiedad',$propiedades[$i]->idPropiedad);
                    $catidadInversores = count($ingresos->where('idPropiedad',$propiedades[$i]->idPropiedad));
                    foreach($datos as $dato){
                        $suma = $suma + $dato->monto;
                        if($suma>0){
                            $porcentaje = ($suma*100)/$propiedades[$i]->precio;
                        }else{
                            $porcentaje = 0;
                        }
                    }
                @endphp
                @php
                    $nombrePropiedad = str_replace(" ", "-", $propiedades[$i]->nombrePropiedad);
                @endphp
                @php
                    $arrayIdPropiedadUsuario = array();
                    foreach ($datos as $dato) {
                        if($dato->idPropiedad == $propiedades[$i]->idPropiedad && $dato->idPropiedad != null){
                            $idPropiedades = array($propiedades[$i]->idPropiedad => $dato->idUsuario
                            );
                            array_push($arrayIdPropiedadUsuario,$idPropiedades);
                        }
                    }
                    $arrayIdPropiedadSinDuplicar = array();
                    array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedadUsuario, SORT_REGULAR));
                @endphp
                <div class="col-lg-4 col-sm-6" id="cartaPropiedad{{ $i }}" style="display: block;">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <div class="listing-badges">
                                <span style="cursor: pointer;" class="featured" onclick="pruebaId({{ $propiedades[$i]->idPropiedad }},{{ $i }})">
                                    <i class="fa fa-map-marker" style="color:#000000"></i>
                                    <a class="img-responsive" style="color:#000000">Ver mapa</a>
                                </span>
                                
                                <a class="cuadrado"  onclick="informacionRepetida({{ $i }})">
                                    <img src="{{ asset('img_public/icon-info-white.svg') }}" class="h-minificha__icon-info h-minificha__show-info-window" style="margin-left: 6px;margin-top: 5px;">
                                </a>
                            </div>
                            {{-- 
                            <div class="price-ratings-box">
                                <p class="price">
                                    ${{ number_format($propiedades[$i]->precio,0,',','.') }}
                                </p>
                            </div> 
                            --}}
                            <div  class="carousel slide" data-ride="" style="display: block">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img id="carouselExampleIndicators{{ $i}}" class="d-block w-100" src="{{ asset($propiedades[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
                                        <img id="carouselExampleIndicatorss{{ $i}}" class="d-block w-100 imagen-datos-prueba" src="{{ asset($propiedades[$i]->fotoMapa) }}" alt="First slide" height="233" width="350">

                                        @if($propiedades[$i]->idTipoFlexibilidad == 1)
                                            <div id="flexing{{ $i}}" class="circulo">
                                                <p class="flex">FLEX</p>
                                            </div>
                                        @endif
                                        @if($propiedades[$i]->textoPromocion != null && $propiedades[$i]->rentabilidadPromocion != null)
                                            <div id="cuadrado{{ $i}}" class="rectangulo">
                                                <p class="tituloRentabilidad">{{ strtoupper($propiedades[$i]->textoPromocion) }}</p>
                                                <p class="valorRentabilidad">{{ $propiedades[$i]->rentabilidadPromocion }}%</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="detail" >
                            <h1 class="title">
                                {{-- <a href="{{ asset('detalle') }}/{{ Crypt::encrypt($propiedades[$i]->idPropiedad) }}">{{ $propiedades[$i]->nombrePropiedad }}</a> --}}
                                <a style="color: black" href="{{ asset('invierte/chile/propiedad/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedades[$i]->idPropiedad) }}">{{ $propiedades[$i]->nombrePropiedad }}</a>
                            </h1>
                            <div class="location" >
                                <a >
                                    <i class="fa fa-map-marker"></i>{{ $propiedades[$i]->direccion1 }}, {{ substr($propiedades[$i]->nombreRegion,0,28) }}...
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <strong  class="{{ $propiedades[$i]->nombreClase }}">{{ $propiedades[$i]->nombreTipoCalidad }}</strong>
                                </li>
                                <li></li>
                                <li >
                                    @if($propiedades[$i]->tieneChat == 1)
                                        <i class="far fa-comments" style="font-size: 30px"></i>
                                    @else
                                        Sin Foro
                                    @endif
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6" align="left">
                                    <p><strong >${{ number_format($suma,0,',','.') }} ({{ round($porcentaje) }}%)</strong></p>
                                </div>
                                <div class="col-lg-6 col-sm-6" align="right">
                                    <p><strong >${{ number_format($propiedades[$i]->precio,0,',','.') }}</strong></p>
                                </div>
                                <div class="col-lg-12">
                                    <progress max="100" value="{{ round($porcentaje) }}" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    @if(count($arrayIdPropiedadSinDuplicar[0])>1)
                                        <p ><strong >{{ count($arrayIdPropiedadSinDuplicar[0]) }}</strong> inversores</p>
                                    @else
                                        @if(count($arrayIdPropiedadSinDuplicar[0])==0)
                                            <p ><strong >{{ count($arrayIdPropiedadSinDuplicar[0]) }}</strong> inversores</p>
                                        @else
                                            <p ><strong >{{ count($arrayIdPropiedadSinDuplicar[0]) }}</strong> inversor</p>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-6" align="right">
                                    @if($diff->days>0)
                                        <p > {!! $diff->days !!} días </p>
                                    @else
                                        <p >Finalizado </p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                                <div class="row">
                                    <div class="col-lg-6" align="center">
                                        <h4><strong >{{ $propiedades[$i]->rentabilidadAnual }}%</strong></h4>
                                        <p><strong >Rentabilidad Anual</strong></p>
                                    </div>
                                    <div class="col-lg-6" align="center">
                                        <h4><strong >{{ $propiedades[$i]->rentabilidadTotal }}%</strong></h4>
                                        <p><strong >Rentabilidad Total</strong></p>
                                    </div>
                                </div> 
                            <hr>  
                            <div class="row" align="center">
                                <div class="col-lg-12">
                                    <a href="{{ asset('invierte/chile/propiedad/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedades[$i]->idPropiedad) }}" class="btn btn-warning"><strong style="color: black">Invierte</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="footer clearfix" >
                            <div class="pull-left days" align="center">
                                <p><i  class="flaticon-time"></i><strong >Plazo: {{ $propiedades[$i]->plazoMeses }} meses</strong> </p>
                            </div>
                            @if(Session::has('idUsuario'))
                                <ul class="pull-right">
                                    @if(count($propiedadesFavoritas->where('idPropiedad',$propiedades[$i]->idPropiedad))>0)
                                        <li><a  onclick="propiedadFavorita({{ $propiedades[$i]->idPropiedad }})"><i class="flaticon-favorite" id="{{ $propiedades[$i]->idPropiedad }}" style="color:red;"></i></a></li>
                                    @else
                                        <li><a  onclick="propiedadFavorita({{ $propiedades[$i]->idPropiedad }})"><i class="flaticon-favorite" id="{{ $propiedades[$i]->idPropiedad }}"></i></a></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" id="cartaInformacion{{ $i }}" style="display: none;">
                    <div class="property-box">

                            <div class="listing-badges">
                                <a class="cruz"  onclick="informacionRepetida({{ $i }})">
                                    <i class="fas fa-times" style="color: #fbd334;font-size: 30px;margin-top: 17px;"></i>
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title" >MÁS INFORMACIÓN</h1><br>
                                <div class="location">
                                    <p><strong>Plazo</strong>: es la duración estimada de la oportunidad.</p>
                                    <br>
                                    <p><strong>Rentabilidad Anual</strong>:  es el interés fijo pactado por el promotor. Los intereses se repartirán mensualmente.</p>
                                    <br>
                                    <p><strong>Rentabilidad Total</strong>: es la rentabilidad total estimada de la inversión. Tiene en cuenta el plazo y el interés fijo anual pactado por el promotor.</p>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                    </div>
                </div>
                
            @endfor
        </div>
        {{-- modal --}}
        
    </div>
    <div class="container" align="center">
        <a href="{{ asset('invierte/chile/propiedad') }}" class="btn btn-outline-warning"><strong style="color: black">Invierte</strong></a>
    </div>
</div>
<!-- Featured Properties end -->
<div class="counters overview-bgi" style="background-image: url('{{ asset('img_public/paginaesmidas1-02.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-tag"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="">{{ $promedioFinal }}%</h1>
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
                        <h1 class="">${{ number_format($valorTotal,0,',','.') }}</h1>
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
                        <h1 class="">{{ number_format(count($usuarios),0,',','.') }}</h1>
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
                        <div class="slick-slide-item" >
                            <div class="row team-4" >
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-pad align-self-center">
                                    <br>
                                    <div class="detail">
                                        <h4 >Caso de Exito</h4>
                                        <h3 >
                                           {{ $casoExitoso->nombrePropiedad }}
                                        </h3>
                                            <!-- Cajita -->
                                        <div class="contact">
                                            <div class="box">
                                                <div class="contenedor-box">
                                                  <div class="cajas" align="center">
                                                   <p class="dato" >{{ $casoExitoso->rentabilidadAnual }}% <br> TIR estimada</p>
                                                  </div>
                                                     
                                                    <div class="cajas1" align="center">
                                                        <p class="dato" >{{ $casoExitoso->rentabilidadTotal }}% <br>TIR entregada</p>
                                                    </div>
                                                </div>
                                                <hr >
                                                <div class="footer-box">
                                                    <p class="dato" >8'27%</p>
                                                      <p class="footer-texto" >RENTABILIDAD NETA ACUMULADA </p>
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
                                <style>
                                    .imagen-propiedad{
                                        border: 1px solid black;
                                        margin-left: -12px;
                                        height: 287px;
                                        width: 287px;
                                    }
                                    @media only screen and (min-width:320px) and (max-width: 450px) {
                                        .imagen-propiedad{
                                            border: 2px solid black;
                                            width: 94% !important;
                                            margin-left: 8px;
                                            margin-top: -38px;
                                        }
                                    }

                                </style>
                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-pad ">
                                    <br>
                                    <div class="photo">
                                        <img class="imagen-propiedad" src="{{ asset($casoExitoso->imagenCasoExito) }}" >
                                        <br>
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
                                        <a href="" class="btn btn-outline-warning">Registrate</a>
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
<div class="container">
    <div class="row">
        <div class="col-lg-12" align="center">
            <a href="{{ asset('registro') }}" class="btn btn-outline-warning"><strong>Registrate</strong></a>
            <br>
        </div>
    </div>
</div>
<div>
<div id="smartphone-animation" style="opacity: 1;">
    @include('scroll')
</div>
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
                    <a href="{{ asset('invierte/chile/propiedad') }}" class="btn btn-outline-warning"><small style="color: black">INVIERTE</small></a>
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
@section('scripts')
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
<script type="text/javascript">
    function pruebaId(idPropiedad, valor){
        idUno = 'carouselExampleIndicators'+valor;
        idDos = 'carouselExampleIndicatorss'+valor;
        if(document.getElementById(idUno).classList == 'd-block w-100 prueba-giro' ){
            document.getElementById(idUno).classList.add('prueba-giro-vuelta');
            if(document.getElementById('flexing'+valor)){
                document.getElementById('flexing'+valor).classList.add('prueba-giro-flex');
            }
            document.getElementById(idDos).classList.add('prueba-giro-mapa-vuelta');
            if(document.getElementById('cuadrado'+valor)){
                document.getElementById('cuadrado'+valor).classList.add('prueba-giro-vuelta');
            }
            document.getElementById(idUno).classList.remove('prueba-giro');
            if(document.getElementById('flexing'+valor)){
                document.getElementById('flexing'+valor).classList.remove('prueba-giro');
            }
            document.getElementById(idDos).classList.remove('prueba-giro-mapa');
            if(document.getElementById('cuadrado'+valor)){
                document.getElementById('cuadrado'+valor).classList.remove('prueba-giro');
            }
        }else{
            if(document.getElementById(idUno).classList == 'd-block w-100 prueba-giro-vuelta'){
                document.getElementById(idUno).classList.remove('prueba-giro-vuelta');
                if(document.getElementById('flexing'+valor)){
                    document.getElementById('flexing'+valor).classList.remove('prueba-giro-flex');
                }
                document.getElementById(idDos).classList.remove('prueba-giro-mapa-vuelta');
                if(document.getElementById('cuadrado'+valor)){
                    document.getElementById('cuadrado'+valor).classList.remove('prueba-giro-vuelta');
                }
            }

            document.getElementById(idUno).classList.add('prueba-giro');
            if(document.getElementById('flexing'+valor)){
                document.getElementById('flexing'+valor).classList.add('prueba-giro');
            }
            document.getElementById(idDos).classList.add('prueba-giro-mapa');
            if(document.getElementById('cuadrado'+valor)){
                document.getElementById('cuadrado'+valor).classList.add('prueba-giro');
            }

            /*document.getElementById(idUno).style.display = 'none';
            document.getElementById(idDos).style.display = 'block';*/
        }
    }
</script>
<script type="text/javascript">
    function metaFunction(idPropiedad) {
        $.get('{{ asset('obtenerPropiedad') }}/'+idPropiedad,function(data, status){
            $("meta[property='og:url']").attr("content", data.rutaPagina); 
            $("meta[property='og:title']").attr("content", data.nombreContent); 
            $("meta[property='og:image']").attr("content", data.rutaImagen); 
            
        });
    }
</script>

<script type="text/javascript">
    function propiedadFavorita(idPropiedad) {
        $.get('{{ asset('propiedad-favorita') }}/'+idPropiedad,function(data, status){
            if(document.getElementById(idPropiedad).style.color == 'red'){
                document.getElementById(idPropiedad).style.color = '';
            }else{
                document.getElementById(idPropiedad).style.color = 'red';
            }
        });
    }
</script>
<script type="text/javascript">
    function informacionRepetida(i) {
        const cartaUno = document.getElementById('cartaPropiedad'+i);
        const cartaDos = document.getElementById('cartaInformacion'+i);
        if(cartaUno.style.display == 'block' && cartaDos.style.display == 'none'){
            cartaUno.style.display = 'none';
            cartaDos.style.display = 'block';
        }else{
            cartaUno.style.display = 'block';
            cartaDos.style.display = 'none';
        }
    }
</script>
@endsection