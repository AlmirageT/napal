@if(count($propiedadesTienda)>0)
    @for ($i = 0; $i < count($propiedadesTienda) ; $i++)
    @php
        $date1 = new DateTime($propiedadesTienda[$i]->fechaInicio);
        $date2 = new DateTime($propiedadesTienda[$i]->fechaFinalizacion);
        $diff = $date1->diff($date2);
    @endphp
    @php
        $suma = 0;
        $porcentaje = 0;
        $datos = $ingresos->where('idPropiedad',$propiedadesTienda[$i]->idPropiedad);
        $catidadInversores = count($ingresos->where('idPropiedad',$propiedadesTienda[$i]->idPropiedad));
        foreach($datos as $dato){
            $suma = $suma + $dato->monto;
            if($suma>0){
                $porcentaje = ($suma*100)/$propiedadesTienda[$i]->precio;
            }else{
                $porcentaje = 0;
            }
        }
    @endphp
    @php
        $nombrePropiedad = str_replace(" ", "-", $propiedadesTienda[$i]->nombrePropiedad);
    @endphp
    @php
        $arrayIdPropiedadUsuario = array();
        foreach ($datos as $dato) {
            if($dato->idPropiedad == $propiedadesTienda[$i]->idPropiedad && $dato->idPropiedad != null){
                $idPropiedades = array($propiedadesTienda[$i]->idPropiedad => $dato->idUsuario
                );
                array_push($arrayIdPropiedadUsuario,$idPropiedades);
            }
        }
        $arrayIdPropiedadSinDuplicar = array();
        array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedadUsuario, SORT_REGULAR));
    @endphp
    <div class="col-lg-4 col-sm-6 carta-prueba" id="cartaPropiedad{{ $propiedadesTienda[$i]->idPropiedad }}" style="display: block">
        <div class="face front" id="carta-frontal{{ $propiedadesTienda[$i]->idPropiedad }}">
            <div class="property-box">
                <div class="property-thumbnail">
                        <div class="listing-badges">
                            <span style="cursor: pointer;" class="featured" onclick="pruebaId({{ $propiedadesTienda[$i]->idPropiedad }})">
                                <i class="fa fa-map-marker" style="color:#000000"></i>
                                <a class="img-responsive" style="color:#000000">Ver mapa</a>
                            </span>
                            <script type="text/javascript">
                                function pruebaId(idPropiedad){
                                    idUno = 'carouselExampleIndicators'+idPropiedad;
                                    idDos = 'carouselExampleIndicatorss'+idPropiedad;
                                    if(document.getElementById(idUno).classList == 'd-block w-100 prueba-giro' ){
                                        document.getElementById(idUno).classList.add('prueba-giro-vuelta');
                                        if(document.getElementById('flexing'+idPropiedad)){
                                            document.getElementById('flexing'+idPropiedad).classList.add('prueba-giro-flex');
                                        }
                                        document.getElementById(idDos).classList.add('prueba-giro-mapa-vuelta');
                                        if(document.getElementById('cuadrado'+idPropiedad)){
                                            document.getElementById('cuadrado'+idPropiedad).classList.add('prueba-giro-vuelta');
                                        }
                                        document.getElementById(idUno).classList.remove('prueba-giro');
                                        if(document.getElementById('flexing'+idPropiedad)){
                                            document.getElementById('flexing'+idPropiedad).classList.remove('prueba-giro');
                                        }
                                        document.getElementById(idDos).classList.remove('prueba-giro-mapa');
                                        if(document.getElementById('cuadrado'+idPropiedad)){
                                            document.getElementById('cuadrado'+idPropiedad).classList.remove('prueba-giro');
                                        }
                                    }else{
                                        if(document.getElementById(idUno).classList == 'd-block w-100 prueba-giro-vuelta'){
                                            document.getElementById(idUno).classList.remove('prueba-giro-vuelta');
                                            if(document.getElementById('flexing'+idPropiedad)){
                                                document.getElementById('flexing'+idPropiedad).classList.remove('prueba-giro-flex');
                                            }
                                            document.getElementById(idDos).classList.remove('prueba-giro-mapa-vuelta');
                                            if(document.getElementById('cuadrado'+idPropiedad)){
                                                document.getElementById('cuadrado'+idPropiedad).classList.remove('prueba-giro-vuelta');
                                            }
                                        }

                                        document.getElementById(idUno).classList.add('prueba-giro');
                                        if(document.getElementById('flexing'+idPropiedad)){
                                            document.getElementById('flexing'+idPropiedad).classList.add('prueba-giro');
                                        }
                                        document.getElementById(idDos).classList.add('prueba-giro-mapa');
                                        if(document.getElementById('cuadrado'+idPropiedad)){
                                            document.getElementById('cuadrado'+idPropiedad).classList.add('prueba-giro');
                                        }

                                        /*document.getElementById(idUno).style.display = 'none';
                                        document.getElementById(idDos).style.display = 'block';*/
                                    }
                                }
                            </script>
                            <a  class="cuadrado"  onclick="informacionRepetida({{ $propiedadesTienda[$i]->idPropiedad }})">
                                <img src="{{ asset('img_public/icon-info-white.svg') }}" class="h-minificha__icon-info h-minificha__show-info-window" style="margin-left: 6px;margin-top: 5px;">
                            </a>
                        </div>

                        <div  class="carousel slide" data-ride="" style="display: block">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img id="carouselExampleIndicators{{ $propiedadesTienda[$i]->idPropiedad}}" class="d-block w-100" src="{{ asset($propiedadesTienda[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
                                    <img id="carouselExampleIndicatorss{{$propiedadesTienda[$i]->idPropiedad}}" class="d-block w-100 imagen-datos-prueba" src="{{ asset($propiedadesTienda[$i]->fotoMapa) }}" alt="First slide" height="233" width="350">
                                    
                                    @if($propiedadesTienda[$i]->idTipoFlexibilidad == 1)
                                        <div id="flexing{{ $propiedadesTienda[$i]->idPropiedad }}" class="circulo">
                                            <p class="flex">FLEX</p>
                                        </div>
                                    @endif
                                    @if($propiedadesTienda[$i]->textoPromocion != null && $propiedadesTienda[$i]->rentabilidadPromocion != null)
                                        <div id="cuadrado{{ $propiedadesTienda[$i]->idPropiedad }}" class="rectangulo">
                                            <p class="tituloRentabilidad">{{ strtoupper($propiedadesTienda[$i]->textoPromocion) }}</p>
                                            <p class="valorRentabilidad">{{ $propiedadesTienda[$i]->rentabilidadPromocion }}%</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                <div class="detail" >
                    <h1 class="title">
                        <a style="color: black" href="{{ asset('invierte/chile/propiedad/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedadesTienda[$i]->idPropiedad) }}">{{ $propiedadesTienda[$i]->nombrePropiedad }}</a>
                    </h1>
                    <div class="location" >
                        <a >
                            <i class="fa fa-map-marker"></i>{{ $propiedadesTienda[$i]->direccion1 }}, {{ substr($propiedadesTienda[$i]->nombreRegion,0,28) }}...
                        </a>
                    </div>
                    <ul class="facilities-list clearfix">
                        <li>
                            <strong class="{{ $propiedadesTienda[$i]->nombreClase }}">{{ $propiedadesTienda[$i]->nombreTipoCalidad }}</strong>
                        </li>
                        <li>
                            @if($propiedadesTienda[$i]->tieneChat == 1)
                                <i class="far fa-comments" style="font-size: 30px"></i>
                            @else
                                Sin Foro
                            @endif
                        </li>
                    </ul>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <p><strong >${{ number_format($suma,0,',','.') }} ({{ round($porcentaje) }}%)</strong></p>
                            </div>
                            <div class="col-lg-6 col-sm-6" align="right">
                                <p><strong >${{ number_format($propiedadesTienda[$i]->precio,0,',','.') }}</strong></p>
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
                                    <p >{!! $diff->days !!} d??as </p>
                                @else
                                    <p >Finalizado </p>
                                @endif
                            </div>
                        </div>
                    <hr>
                        <div class="row">
                            <div class="col-lg-6" align="center">
                                <h4><strong >{{ $propiedadesTienda[$i]->rentabilidadAnual }}%</strong></h4>
                                <p><strong >Rentabilidad Anual</strong></p>
                            </div>
                            <div class="col-lg-6" align="center">
                                <h4><strong >{{ $propiedadesTienda[$i]->rentabilidadTotal }}%</strong></h4>
                                <p><strong >Rentabilidad Total</strong></p>
                            </div>
                        </div> 
                <hr>
                <div class="row" align="center">
                    <div class="col-lg-12">
                        <a href="{{ asset('invierte/chile/propiedad/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedadesTienda[$i]->idPropiedad) }}" class="btn btn-warning"><strong style="color: black">Invierte</strong></a>
                    </div>
                </div>
                </div>
                
                <div class="footer clearfix" >
                    <div class="pull-left days">
                        <p><i class="flaticon-time"></i><strong >Plazo: {{ $propiedadesTienda[$i]->plazoMeses }} meses </strong></p>
                        
                    </div>
                    @if(Session::has('idUsuario'))
                        <ul class="pull-right">
                            @if(count($propiedadesFavoritas->where('idPropiedad',$propiedadesTienda[$i]->idPropiedad))>0)
                                <li><a  onclick="propiedadFavorita({{ $propiedadesTienda[$i]->idPropiedad }})"><i class="flaticon-favorite" id="{{ $propiedadesTienda[$i]->idPropiedad }}" style="color:red;"></i></a></li>
                            @else
                                <li><a  onclick="propiedadFavorita({{ $propiedadesTienda[$i]->idPropiedad }})"><i class="flaticon-favorite" id="{{ $propiedadesTienda[$i]->idPropiedad }}"></i></a></li>
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
                    <a class="cruz"  onclick="informacionRepetida({{ $propiedadesTienda[$i]->idPropiedad }})">
                        <i class="fas fa-times" style="color: #fbd334;font-size: 30px;margin-top: 17px;"></i>
                    </a>
                </div>
                <div class="detail">
                    <h1 class="title" >M??S INFORMACI??N</h1><br>
                    <div class="location">
                        <p><strong>Plazo</strong>: es la duraci??n estimada de la oportunidad.</p>
                        <br>
                        <p><strong>Rentabilidad Anual</strong>:  es el inter??s fijo pactado por el promotor. Los intereses se repartir??n mensualmente.</p>
                        <br>
                        <p><strong>Rentabilidad Total</strong>: es la rentabilidad total estimada de la inversi??n. Tiene en cuenta el plazo y el inter??s fijo anual pactado por el promotor.</p>
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
    </div>
    <div class="col-lg-4 col-sm-6" id="cartaInformacion{{ $propiedadesTienda[$i]->idPropiedad }}" style="display: none">
        
    </div>
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
    @endfor
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
@endif
<br>
<br>