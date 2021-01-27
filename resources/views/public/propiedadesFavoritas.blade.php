@extends('layouts.public.app')
@section('title','Propiedades Favoritas')
@section('css')
    <style>
        .opacidad{
          opacity: 0;
        }
        .carta-prueba {
            -webkit-transition: all .4s linear;
            transition: all .4s linear;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }
        .face {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .carta-prueba-onclick {
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }
        .back {
            position: absolute;
            margin-top: -776px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }
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
            background: #fbd334;
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
            .back {
            position: absolute;
            margin-top: -941px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }
        .cruz {
            position: absolute;
            z-index: 1;
            margin-left: 311px;
            cursor: pointer;
        }
        }
        @media only screen and (min-width:375px) and (max-width: 413px) {
            .cuadrado{
                margin-left: 105px;
            }
            .circulo{
                margin-left: 255px;
            }
            .back {
            position: absolute;
            margin-top: -941px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }
        .cruz {
            position: absolute;
            z-index: 1;
            margin-left: 311px;
            cursor: pointer;
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
            .back {
            position: absolute;
            margin-top: -877px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }
        .cruz {
            position: absolute;
            z-index: 1;
            margin-left: 311px;
            cursor: pointer;
        }
        }
        @media only screen and (min-width:992px) and (max-width: 1199px) {
            .cuadrado{
                margin-left: 50px;
            }
            .circulo{
                margin-left: 199px;
            }
            .back {
            position: absolute;
            margin-top: -822px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }
        .cruz {
            position: absolute;
            z-index: 1;
            margin-left: 272px;
            cursor: pointer;
        }
        }
    </style>
@endsection
@section('content')
<div class="featured-properties content-area-9 carta-transition">
    <div class="container">
        <div class="main-title">
            <h1>Propiedades Favoritas</h1>
            <p>Solo las propiedades en financiamiento seran mostradas</p>
        </div>
        <div class="row">
            @if(count($propiedadesFavoritas)>0)
                @for ($i = 0; $i < count($propiedadesFavoritas) ; $i++)
                @php
                    $date1 = new DateTime($propiedadesFavoritas[$i]->fechaInicio);
                    $date2 = new DateTime($propiedadesFavoritas[$i]->fechaFinalizacion);
                    $diff = $date1->diff($date2);
                @endphp
                @php
                    $suma = 0;
                    $porcentaje = 0;
                    $datos = $ingresos->where('idPropiedad',$propiedadesFavoritas[$i]->idPropiedad);
                    $catidadInversores = count($ingresos->where('idPropiedad',$propiedadesFavoritas[$i]->idPropiedad));
                    foreach($datos as $dato){
                        $suma = $suma + $dato->monto;
                        if($suma>0){
                            $porcentaje = ($suma*100)/$propiedadesFavoritas[$i]->precio;
                        }else{
                            $porcentaje = 0;
                        }
                    }
                @endphp
                @php
                    $nombrePropiedad = str_replace(" ", "-", $propiedadesFavoritas[$i]->nombrePropiedad);
                @endphp
                @php
                    $arrayIdPropiedadUsuario = array();
                    foreach ($datos as $dato) {
                        if($dato->idPropiedad == $propiedadesFavoritas[$i]->idPropiedad && $dato->idPropiedad != null){
                            $idPropiedades = array($propiedadesFavoritas[$i]->idPropiedad => $dato->idUsuario
                            );
                            array_push($arrayIdPropiedadUsuario,$idPropiedades);
                        }
                    }
                    $arrayIdPropiedadSinDuplicar = array();
                    array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedadUsuario, SORT_REGULAR));
                @endphp
                <div class="col-lg-4 col-sm-6 carta-prueba" id="cartaPropiedad{{ $i }}" style="display: block;">
                    <div class="face front" id="carta-frontal{{ $i }}">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <div class="listing-badges">
                                    <span style="cursor: pointer;" class="featured" onclick="pruebaId({{ $propiedadesFavoritas[$i]->idPropiedad }},{{ $i }})">
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
                                            <img id="carouselExampleIndicators{{ $i}}" class="d-block w-100" src="{{ asset($propiedadesFavoritas[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
                                            <img id="carouselExampleIndicatorss{{ $i}}" class="d-block w-100 imagen-datos-prueba" src="{{ asset($propiedadesFavoritas[$i]->fotoMapa) }}" alt="First slide" height="233" width="350">
    
                                            @if($propiedadesFavoritas[$i]->idTipoFlexibilidad == 1)
                                                <div id="flexing{{ $i}}" class="circulo">
                                                    <p class="flex">FLEX</p>
                                                </div>
                                            @endif
                                            @if($propiedadesFavoritas[$i]->textoPromocion != null && $propiedadesFavoritas[$i]->rentabilidadPromocion != null)
                                                <div id="cuadrado{{ $i}}" class="rectangulo">
                                                    <p class="tituloRentabilidad">{{ strtoupper($propiedadesFavoritas[$i]->textoPromocion) }}</p>
                                                    <p class="valorRentabilidad">{{ $propiedadesFavoritas[$i]->rentabilidadPromocion }}%</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="detail" >
                                <h1 class="title">
                                    {{-- <a href="{{ asset('detalle') }}/{{ Crypt::encrypt($propiedades[$i]->idPropiedad) }}">{{ $propiedades[$i]->nombrePropiedad }}</a> --}}
                                    <a style="color: black" href="{{ asset('invierte/chile/propiedad/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedadesFavoritas[$i]->idPropiedad) }}">{{ $propiedadesFavoritas[$i]->nombrePropiedad }}</a>
                                </h1>
                                <div class="location" >
                                    <a >
                                        <i class="fa fa-map-marker"></i>{{ $propiedadesFavoritas[$i]->direccion1 }}, {{ substr($propiedadesFavoritas[$i]->nombreRegion,0,28) }}...
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <strong  class="{{ $propiedadesFavoritas[$i]->nombreClase }}">{{ $propiedadesFavoritas[$i]->nombreTipoCalidad }}</strong>
                                    </li>
                                    <li></li>
                                    <li >
                                        @if($propiedadesFavoritas[$i]->tieneChat == 1)
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
                                        <p><strong >${{ number_format($propiedadesFavoritas[$i]->precio,0,',','.') }}</strong></p>
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
                                            <h4><strong >{{ $propiedadesFavoritas[$i]->rentabilidadAnual }}%</strong></h4>
                                            <p><strong >Rentabilidad Anual</strong></p>
                                        </div>
                                        <div class="col-lg-6" align="center">
                                            <h4><strong >{{ $propiedadesFavoritas[$i]->rentabilidadTotal }}%</strong></h4>
                                            <p><strong >Rentabilidad Total</strong></p>
                                        </div>
                                    </div> 
                                <hr>  
                                <div class="row" align="center">
                                    <div class="col-lg-12">
                                        <a href="{{ asset('invierte/chile/propiedad/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedadesFavoritas[$i]->idPropiedad) }}" class="btn btn-warning"><strong style="color: black">Invierte</strong></a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer clearfix" >
                                <div class="pull-left days" align="center">
                                    <p><i  class="flaticon-time"></i><strong >Plazo: {{ $propiedadesFavoritas[$i]->plazoMeses }} meses</strong> </p>
                                </div>
                                @if(Session::has('idUsuario'))
                                    <ul class="pull-right">
                                        @if(count($propiedadesFavoritas->where('idPropiedad',$propiedadesFavoritas[$i]->idPropiedad))>0)
                                            <li><a  onclick="propiedadFavorita({{ $propiedadesFavoritas[$i]->idPropiedad }})"><i class="flaticon-favorite" id="{{ $propiedadesFavoritas[$i]->idPropiedad }}" style="color:red;"></i></a></li>
                                        @else
                                            <li><a  onclick="propiedadFavorita({{ $propiedadesFavoritas[$i]->idPropiedad }})"><i class="flaticon-favorite" id="{{ $propiedadesFavoritas[$i]->idPropiedad }}"></i></a></li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="face back">
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
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

                
                @endfor
                
            @endif
        </div>
    </div>
</div>
@endsection
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
    function informacionRepetida(i) {
        const cartaUno = document.getElementById('cartaPropiedad'+i);
        const cartaFrontal = document.getElementById('carta-frontal'+i);

        
        if(cartaFrontal.classList == 'face front'){
            cartaUno.classList.add('carta-prueba-onclick');
            setTimeout(function () {
                cartaFrontal.classList.add('opacidad');
            }, 200);
            
        }else{
            cartaUno.classList.remove('carta-prueba-onclick');
            setTimeout(function () {
                cartaFrontal.classList.remove('opacidad');
            }, 200);

        }
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