@if(count($propiedadesTienda)>0)
    @foreach($propiedadesTienda as $propiedadTienda)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="property-box">
            <div class="property-thumbnail">
                <a href="" class="property-img">
                    <div class="listing-badges">
                        @if($propiedadTienda->idTipoFlexibilidad == 1)
                            <span class="featured">
                                Flexible
                            </span>
                        @endif
                    </div>
                    <div class="price-ratings-box">
                        <p class="price">
                        ${{ number_format($propiedadTienda->precio,0,',','.') }}
                        </p>
                        
                    </div>

                    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset($propiedadTienda->fotoPrincipal) }}" alt="properties">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="detail">
                <h1 class="title">
                    <a href="{{ asset('detalle') }}/{{ $propiedadTienda->idPropiedad }}">{{ $propiedadTienda->nombrePropiedad }}</a>
                </h1>
                <div class="location">
                    <a href="properties-details.html">
                        <i class="fa fa-map-marker"></i>{{ $propiedadTienda->direccion1 }}, {{ $propiedadTienda->nombreRegion }}
                    </a>
                </div>
                <ul class="facilities-list clearfix">
                    <li>
                        <i class="flaticon-furniture"></i> 
                        @if($propiedadTienda->habitaciones > 1)
                            {{ $propiedadTienda->habitaciones }} Habitaciones
                        @else
                            {{ $propiedadTienda->habitaciones }} Habitación
                        @endif

                    </li>
                    <li>
                        <i class="flaticon-holidays"></i>
                        @if($propiedadTienda->baños > 1)
                            {{ $propiedadTienda->baños }} Baños
                        @else
                            {{ $propiedadTienda->baños }} Baño
                        @endif
                    </li>
                </ul>
                <hr>
                    <div class="row">
                        <div class="col-lg-6" align="center">
                            <h4>%{{ $propiedadTienda->rentabilidadAnual }}</h4>
                            <p>Rentabilidad Anual</p>
                        </div>
                        <div class="col-lg-6" align="center">
                            <h4>%{{ $propiedadTienda->rentabilidadTotal }}</h4>
                            <p>Rentabilidad Total</p>
                        </div>
                    </div> 
                <hr>  
            </div>
            <div class="footer clearfix">
                <div class="pull-left days">
                    <p><i class="flaticon-time"></i> 5 Days ago</p>
                </div>
                <ul class="pull-right">
                    <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                    <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
@endif