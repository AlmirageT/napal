
@extends('layouts.public.app')
@section('content')
<div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <!-- Option bar start -->
                <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-sm-5 col-xs-2">
                            <div class="sorting-options">
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-7 col-xs-10 cod-pad">
                            <div class="sorting-options2">
                                <span>Ordenar por:</span>
                                {!! Form::select('idEstado', $estados,null,['class'=>"sorting",'onchange'=>"orderBy(this.value)"]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Option bar end -->

                <!-- grid properties start -->
                <div>
                    <div class="infinite-scroll" >
                        <div class="row" id="contenedor">
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
                                                <a>{{ $propiedadTienda->nombrePropiedad }}</a>
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
                        </div>
                        {{ $propiedadesTienda->links() }}
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        $('ul.pagination').hide();
                        $(function() {
                            $('.infinite-scroll').jscroll({
                                autoTrigger: true,
                                debug: true,
                                loadingHtml: '<div align="center"><img src="{{ asset('img/loading.gif') }}" alt="Loading..." /></div>',
                                padding: 0,
                                nextSelector: '.pagination li.active + li a',
                                contentSelector: '.infinite-scroll',
                                callback: function() {
                                    $('ul.pagination').remove();
                                }
                            });
                        });
                    </script>
                </div>
                <!-- grid properties end -->

                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                    </nav>
                </div>
                <!-- Page navigation end-->
            </div>
        </div>
    </div>
</div>
<script>
    function orderBy(idEstado) {
        if(idEstado != ""){
            fetch('{{ asset('ordenar-propiedades') }}/'+idEstado,{
                method:'get'
            })
            .then(response => response.text() )
            .then(html => {
                document.getElementById('contenedor').innerHTML = '';
                document.getElementById("contenedor").innerHTML += html
            })
            .catch(error => console.log(error))
        }
    }
</script>

@endsection