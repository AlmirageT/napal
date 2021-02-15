@extends('layouts.public.app')

@section('meta')
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Inverte en nuestra propiedad {{ $propiedad->nombrePropiedad }}" >
    <meta property="og:description" content="Aprovecha esta oportunidad única para finalmente obtener tu independecia financiera" >
    <meta property="og:image" content="{{ asset($propiedad->fotoPrincipal) }}" >
    <meta property="og:image:width" content="200" >
    <meta property="og:image:height" content="200" >
@endsection
@section('title','Detalle Propiedad')
@section('content')
<!-- Properties details page start -->
@php
    $date1 = new DateTime($propiedad->fechaInicio);
    $date2 = new DateTime($propiedad->fechaFinalizacion);
    $diff = $date1->diff($date2);
@endphp
@php
    $suma = 0;
    $porcentaje = 0;
    $catidadInversores = count($ingresos);
    foreach($ingresos as $ingreso){
        $suma = $suma + $ingreso->monto;
        if($suma>0){
            $porcentaje = ($suma*100)/$propiedad->precio;
        }else{
            $porcentaje = 0;
        }
    }
@endphp
@php
    $arrayIdPropiedadUsuario = array();
    foreach ($ingresos as $ingreso) {
        if($ingreso->idPropiedad == $propiedad->idPropiedad && $ingreso->idPropiedad != null){
            $idPropiedades = array($propiedad->idPropiedad => $ingreso->idUsuario
            );
            array_push($arrayIdPropiedadUsuario,$idPropiedades);
        }
    }
    $arrayIdPropiedadSinDuplicar = array();
    array_push($arrayIdPropiedadSinDuplicar, array_unique($arrayIdPropiedadUsuario, SORT_REGULAR));
@endphp
<div class="properties-details-page content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                @if(count($imagenesPropiedadesGrandes)>0)
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="{{ asset($imagenesPropiedadesGrandes->shift()->imagenPropiedadGrande) }}" class="img-fluid" alt="slider-properties">
                        </div>
                        @for ($i = 0; $i < count($imagenesPropiedadesGrandes); $i++)
                            <div class="item carousel-item" data-slide-number="{{ $i+1 }}">
                                <img src="{{ asset($imagenesPropiedadesGrandes[$i]->imagenPropiedadGrande) }}" class="img-fluid" alt="slider-properties">
                            </div>
                        @endfor
                    </div>
                    {{--  
                    <style type="text/css">
                        .footer-properties{
                            background-color: rgba(0, 0, 0, 0.5);
                            margin-top: -84px;
                            margin-left: 15px;
                            margin-right: 15px;
                        }
                        
                    </style>
                    <div class="d-none d-sm-block" style="background-color: rgba(0, 0, 0, 0.5)">
                        <div class="footer-properties">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3>{{ $propiedad->nombrePropiedad }}</h3>
                                        <p><i class="far fa-comment-dots" style="font-size: 48px;"></i></p>
                                    </div>
                                    <div class="pull-right">
                                        <h3>
                                            <span class="text-right">${{ number_format($propiedad->precio,0,',','.') }}</span>
                                        </h3>
                                        @if($propiedad->idTipoFlexibilidad == 1)
                                            <span class="text-right">Flexible</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#propertiesDetailsSlider">
                                <img src="{{ asset($imagenesPropiedadesPequeñas->shift()->imagenPropiedadPequeña) }}" class="img-fluid" alt="properties-small">
                            </a>
                        </li>
                        @for ($i = 0; $i < count($imagenesPropiedadesPequeñas); $i++)
                            <li class="list-inline-item">
                                <a id="carousel-selector-{{ $i+1 }}" data-slide-to="{{ $i+1 }}" data-target="#propertiesDetailsSlider">
                                    <img src="{{ asset($imagenesPropiedadesPequeñas[$i]->imagenPropiedadPequeña) }}" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                        @endfor
                    </ul>
                    <!-- main slider carousel items -->
                    <!-- Heading properties start -->
                    <div class="heading-properties">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3>{{ $propiedad->nombrePropiedad }}</h3>
                                    <p><i class="fa fa-map-marker"></i> {{ $propiedad->direccion1 }}, {{ $propiedad->nombreRegion }}</p>
                                </div>
                                <div class="pull-right">
                                    <h3>
                                        <span class="text-right">${{ number_format($propiedad->precio,0,',','.') }}</span>
                                    </h3>
                                    @if($propiedad->idTipoFlexibilidad == 1)
                                        <span class="text-right">Flexible</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Heading properties end -->
                </div>
                @else
                No tiene imagenes
                @endif
                <!-- Property meta start -->
                <div class="property-meta mb-40">
                    <ul>
                        <li>
                            <i class="flaticon-furniture"></i>
                            <p>
                                @if($propiedad->habitaciones > 1)
                                    {{ $propiedad->habitaciones }} Habitaciones
                                @else
                                    {{ $propiedad->habitaciones }} Habitación
                                @endif
                            </p>
                        </li>
                        <li>
                            <i class="flaticon-holidays"></i>
                            <p>
                                @if($propiedad->baños > 1)
                                    {{ $propiedad->baños }} Baños
                                @else
                                    {{ $propiedad->baños }} Baño
                                @endif
                            </p>
                        </li>
                        <li>
                            <i class="flaticon-square"></i>
                            <p>{{ $propiedad->mConstruido +  $propiedad->mSuperficie +  $propiedad->mTerraza }} m2</p>
                        </li>
                        {{--  
                        <li>
                            <i class="flaticon-vehicle"></i>
                            <p>1 Garages</p>
                        </li>
                        --}}
                    </ul>
                </div>
                <!-- Property meta end -->
                <style type="text/css">
                    .nav-tabs .nav-item{
                        width: 242px;
                        text-align:center;
                    }
                    @media only screen and (max-width: 1199px) {
                        .nav-tabs .nav-item{
                            width: 600px;
                            text-align:center;
                        }
                    }
                </style>
                <!-- Properties description start -->
                <div class="properties-description mb-40">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-descripcion-tab" data-toggle="tab" href="#nav-descripcion" role="tab" aria-controls="nav-descripcion" aria-selected="true">Descripción</a>
                            <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">Información Financiera</a>
                            <a class="nav-item nav-link" id="nav-documentacion-tab" data-toggle="tab" href="#nav-documentacion" role="tab" aria-controls="nav-documentacion" aria-selected="false">Documentación</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-descripcion" role="tabpanel" aria-labelledby="nav-descripcion-tab">
                            @include('navTab.descripcion')
                        </div>
                        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            @include('navTab.info')
                        </div>
                        <div class="tab-pane fade" id="nav-documentacion" role="tabpanel" aria-labelledby="nav-documentacion-tab">
                                @include('navTab.documentacion')
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-left">
                    <!-- Advanced search start -->
                    <form action="{{ asset('invierte-propiedad') }}/{{ Crypt::encrypt($propiedad->idPropiedad) }}" method="POST">
                        @csrf
                        <div class="widget search-area advanced-search d-none d-xl-block d-lg-block">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><strong> Pais:</strong></p>
                                </div>
                                <div class="col-lg-6" align="center">
                                    <p> <strong> {{ $propiedad->nombrePais }} </strong></p>
                                </div>
                                <hr>
                                <div class="col-lg-6">
                                    <p> <strong> Estado: </strong></p>
                                </div>
                                <div class="col-lg-6" align="center">
                                    <p> <strong> {{ $propiedad->nombreEstado }} </strong> </p>
                                </div>
                                <div class="col-lg-6">
                                    <p> <strong> Modalidad de prestamo: </strong></p>
                                </div>
                                <div class="col-lg-6" align="center">
                                    <p> <strong> {{ $propiedad->nombreTipoFlexibilidad }} </strong> </p>
                                </div>
                                <div class="col-lg-7">
                                    <p> <strong> ${{ number_format($suma,0,',','.') }} ({{ round($porcentaje) }}%)</strong></p>
                                </div>
                                <div class="col-lg-5">
                                    <p> <strong> ${{ number_format($propiedad->precio,0,',','.') }} </strong> </p>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <progress max="100" value="{{ round($porcentaje) }}" style="width: 95%;">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <p> <strong> {{  count($arrayIdPropiedadSinDuplicar[0])  }} Inversores</strong></p>
                                </div>
                                <div class="col-lg-5">
                                    <p> <strong> Plazo: {{ $propiedad->plazoMeses}} meses </strong></p>
                                </div>
                                <div class="col-lg-6" align="center">
                                    <h4> <strong> {{ $propiedad->rentabilidadAnual }}% </strong> </h4>
                                    <p> <strong> Rentabilidad Anual </strong></p>
                                </div>
                                <div class="col-lg-6" align="center">
                                    <h4> <strong> {{ $propiedad->rentabilidadTotal }}% </strong> </h4>
                                    <p> <strong> Rentabilidad Total </strong></p>
                                </div>
                                <br>
                                <div class="col-lg-6">
                                    <p> <strong> Quiero invertir </strong> </p>
                                </div>
                                <div class="col-lg-6">
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" name="valorInvertir" placeholder="{{ number_format($valorInicio->valorParametroGeneral,0,',','.') }}" maxlength="8" onkeyup="format(this)" onchange="format(this)" required>
                                  </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group mb-0">
                                <button class="search-button">Invierte</button>
                            </div>
                            <div class="form-group mb-0" align="center">
                                <br>
                                <br>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" style="margin-left: 20px"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="https://twitter.com/intent/tweet?text=Aprovecha esta oportunidad única para finalmente obtener tu independecia financiera&amp;url={{ $url }}"><i class="fab fa-twitter" style="margin-left: 20px"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="sidebar-left">
                    <div class="widget search-area advanced-search d-none d-xl-block d-lg-block">
                        <div class="row">
                            <div class="col-lg-12" align="center">
                                <h4>Inicio Financiación</h4>
                            </div>
                            <div class="col-lg-12" align="center">
                                @php
                                    setlocale(LC_TIME, 'es_CL');
                                    $monthNum  = date('m',strtotime($propiedad->fechaInicio));
                                    $dia = date('d',strtotime($propiedad->fechaInicio));
                                    $año = date('Y',strtotime($propiedad->fechaInicio));
                                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                    $monthName = strftime('%B', $dateObj->getTimestamp());
                                    switch($monthName)
                                    {   
                                        case "January":
                                        $monthNameSpanish = "Enero";
                                        break;
                                        case "February":
                                        $monthNameSpanish = "Febrero";
                                        break;
                                        case "March":
                                        $monthNameSpanish = "Marzo";
                                        break;
                                        case "April":
                                        $monthNameSpanish = "Abril";
                                        break;
                                        case "May":
                                        $monthNameSpanish = "Mayo";
                                        break;
                                        case "June":
                                        $monthNameSpanish = "Junio";
                                        break;
                                        case "July":
                                        $monthNameSpanish = "Julio";
                                        break;
                                        case "August":
                                        $monthNameSpanish = "Agosto";
                                        break;
                                        case "September":
                                        $monthNameSpanish = "Septiembre";
                                        break;
                                        case "October":
                                        $monthNameSpanish = "Octubre";
                                        break;
                                        case "November":
                                        $monthNameSpanish = "Noviembre";
                                        break;
                                        case "December":
                                        $monthNameSpanish = "Diciembre";
                                        break;
                                    }
                                @endphp 
                                <p>{{ $dia }} de {{ $monthNameSpanish }} del {{ $año }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Similar Properties end -->
    </div>
</div>

@endsection
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g&callback=initMap" async defer></script>
<script type="text/javascript">
    $(document).ready(function(){
        var direccion = $("#txtDireccion").val();
        $('#txtDireccion, #txtNumero, #paises, #select_regiones, #select_provincias, #select_comunas').change(function(){
            var direccion = $("#txtDireccion").val();
            var numero = $("#txtNumero").val();
            var pais = $("#paises").val();
            var region = $("#select_regiones").val();
            var provincia = $("#select_provincias").val();
            var comuna = $("#select_comunas").val();
            var direccionEnviar = "" + direccion + " " + numero + " " + comuna + " " + provincia + " " + region + " " + pais + " ";
            if(direccion != ""){
                $.ajax({
                  url: '/curls/' + direccionEnviar,
                  method:'GET',
                  dataType: 'json',
                  success: function (respuesta) {
                      var map = new google.maps.Map(document.getElementById('map'), {
                              center: {lat: respuesta['results']['0']['geometry']['location']['lat'], lng: respuesta['results']['0']['geometry']['location']['lng']},
                              zoom: 17,
                          });
                      var marker = new google.maps.Marker({
                        map: map,
                        position: {lat: respuesta['results']['0']['geometry']['location']['lat'], lng: respuesta['results']['0']['geometry']['location']['lng']}
                      });
                      map.setMap(map);
                      console.log(respuesta);
                  },
                  error: function(err) {
                      console.log(err);
                  }
              });
            }
        });
        if(direccion != ""){
            var direccion = $("#txtDireccion").val();
            var numero = $("#txtNumero").val();
            var pais = $("#paises").val();
            var region = $("#select_regiones").val();
            var provincia = $("#select_provincias").val();
            var comuna = $("#select_comunas").val();
            var direccionEnviar = "" + direccion + " " + numero + " " + comuna + " " + provincia + " " + region + " " + pais + " ";
            if(direccion != ""){
                $.ajax({
                  url: '/curls/' + direccionEnviar,
                  method:'GET',
                  dataType: 'json',
                  success: function (respuesta) {
                    console.log(respuesta);
                      var map = new google.maps.Map(document.getElementById('map'), {
                              center: {lat: respuesta['results']['0']['geometry']['location']['lat'], lng: respuesta['results']['0']['geometry']['location']['lng']},
                              zoom: 17,
                          });
                      var marker = new google.maps.Marker({
                        map: map,
                        position: {lat: respuesta['results']['0']['geometry']['location']['lat'], lng: respuesta['results']['0']['geometry']['location']['lng']}
                      });
                      map.setMap(map);
                  },
                  error: function(err) {
                      console.log(err);
                  }
              });
            }
          }
    });
function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.4372, lng: -70.650633},
        zoom: 17,
    });
}
</script>
<script type="text/javascript">
    function format(input)
    {
        var num = input.value.replace(/\./g,'');
        if(!isNaN(num)){
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/,'');
            input.value = num;
        }else{ 
            alert('Solo se permiten numeros');
            input.value = input.value.replace(/[^\d\.]*/g,'');
        }
    }
</script>
@endsection