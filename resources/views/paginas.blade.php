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
    <div class="col-lg-4" id="cartaPropiedad{{ $i }}" style="display: block">
        <div class="property-box">
            <div class="property-thumbnail">
                <a class="property-img">
                    <div class="listing-badges">
                        <span style="cursor: pointer;" class="featured" onclick="pruebaId({{ $propiedadesTienda[$i]->idPropiedad }},{{ $i }})">
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
                        <a class="cuadrado"  onclick="informacionRepetida({{ $i }})">
                            <img src="https://static.housers.com/assets/images/icons/icon-info-white.svg" class="h-minificha__icon-info h-minificha__show-info-window" style="margin-left: 6px;margin-top: 5px;">
                        </a>
                    </div>

                    <div id="carouselExampleIndicators{{ $i}}" class="carousel slide" data-ride="" style="display: block">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset($propiedadesTienda[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
                                @if($propiedadesTienda[$i]->idTipoFlexibilidad == 1)
                                    <div class="circulo">
                                        <p class="flex">FLEX</p>
                                    </div>
                                @endif
                                @if($propiedadesTienda[$i]->textoPromocion != null && $propiedadesTienda[$i]->rentabilidadPromocion != null)
                                    <div class="rectangulo">
                                        <p class="tituloRentabilidad">{{ strtoupper($propiedadesTienda[$i]->textoPromocion) }}</p>
                                        <p class="valorRentabilidad">{{ $propiedadesTienda[$i]->rentabilidadPromocion }}%</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="carouselExampleIndicatorss{{ $i}}" class="carousel slide" data-ride="" style="display: none">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset($propiedadesTienda[$i]->fotoMapa) }}" alt="First slide" height="233" width="350">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="detail">
                <h1 class="title">
                    <a href="{{ asset('invierte/chile/propiedad/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedadesTienda[$i]->idPropiedad) }}">{{ $propiedadesTienda[$i]->nombrePropiedad }}</a>
                </h1>
                <div class="location">
                    <a href="properties-details.html">
                        <i class="fa fa-map-marker"></i>{{ $propiedadesTienda[$i]->direccion1 }}, {{ $propiedadesTienda[$i]->nombreRegion }}
                    </a>
                </div>
                <ul class="facilities-list clearfix">
                    <li>
                        {{ $propiedadesTienda[$i]->nombreTipoCalidad }}
                    </li>
                    <li>
                        @if($propiedadesTienda[$i]->tieneChat == 1)
                            Con Foro
                        @else
                            Sin Foro
                        @endif
                    </li>
                </ul>
                @if($propiedadesTienda[$i]->idEstado == 4)
                    <div class="row">
                        <div class="col-lg-6">
                            <p>${{ number_format($suma,0,',','.') }} ({{ round($porcentaje) }}%)</p>
                        </div>
                        <div class="col-lg-6" align="right">
                            <p>${{ number_format($propiedadesTienda[$i]->precio,0,',','.') }}</p>
                        </div>
                        <div class="col-lg-12">
                            <progress max="100" value="{{ round($porcentaje) }}" style="width: 100%;">
                        </div>
                        <div class="col-lg-6">
                            @if($catidadInversores>1)
                                <p>{{ $catidadInversores }} inversores</p>
                            @else
                                @if($catidadInversores==0)
                                    <p>{{ $catidadInversores }} inversores</p>
                                @else
                                    <p>{{ $catidadInversores }} inversor</p>
                                @endif
                            @endif
                        </div>
                        <div class="col-lg-6" align="right">
                            @if($diff->days>0)
                                <p>{!! $diff->days !!} días </p>
                            @else
                                <p>Finalizado </p>
                            @endif
                        </div>
                    </div>
                @endif
                <hr>
                    <div class="row">
                        <div class="col-lg-6" align="center">
                            <h4>{{ $propiedadesTienda[$i]->rentabilidadAnual }}%</h4>
                            <p>Rentabilidad Anual</p>
                        </div>
                        <div class="col-lg-6" align="center">
                            <h4>{{ $propiedadesTienda[$i]->rentabilidadTotal }}%</h4>
                            <p>Rentabilidad Total</p>
                        </div>
                    </div> 
                <hr>  
            </div>
            <div class="footer clearfix">
                <div class="pull-left days">
                    <p><i class="flaticon-time"></i>Plazo: {{ $propiedadesTienda[$i]->plazoMeses }} meses </p>
                    
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
    <div class="col-lg-4" id="cartaInformacion{{ $i }}" style="display: none">
        <div class="property-box">

                <div class="listing-badges">
                    <a class="cruz"  onclick="informacionRepetida({{ $i }})">
                        <img src="https://static.housers.com/assets/images/icons/icon-close.png" style="margin-left: -8px;margin-top: 23px;">
                    </a>
                </div>
                <div class="detail">
                    <h1 class="title" style="color: #1abc9c">MÁS INFORMACIÓN</h1><br>
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