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
    <div class="col-lg-4 col-md-6 col-sm-12">
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
                    </div>
                    <div class="price-ratings-box">
                        <p class="price">
                        ${{ number_format($propiedadesTienda[$i]->precio,0,',','.') }}
                        </p>
                        
                    </div>

                    <div id="carouselExampleIndicators{{ $i}}" class="carousel slide" data-ride="" style="display: block">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset($propiedadesTienda[$i]->fotoPrincipal) }}" alt="First slide" height="233" width="350">
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
                        <i class="flaticon-furniture"></i> 
                        @if($propiedadesTienda[$i]->habitaciones > 1)
                            {{ $propiedadesTienda[$i]->habitaciones }} Habitaciones
                        @else
                            {{ $propiedadesTienda[$i]->habitaciones }} Habitación
                        @endif

                    </li>
                    <li>
                        <i class="flaticon-holidays"></i>
                        @if($propiedadesTienda[$i]->baños > 1)
                            {{ $propiedadesTienda[$i]->baños }} Baños
                        @else
                            {{ $propiedadesTienda[$i]->baños }} Baño
                        @endif
                    </li>
                </ul>
                @if($propiedadesTienda[$i]->idEstado == 4)
                    <div class="row">
                        <div class="col-lg-12">
                            <p>${{ number_format($suma,0,',','.') }} ({{ round($porcentaje) }}%)</p>
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
            </div>
        </div>
    </div>
    @endfor
@endif