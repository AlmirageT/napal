@extends('layouts.public.app')
@section('title')
Detalle Propiedad
@endsection
@section('content')
<!-- Properties details page start -->
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

                <!-- Properties description start -->
                <div class="properties-description mb-40">
                    <h3 class="heading-2">
                        Descripción
                    </h3>
                    {!! $propiedad->descripcion !!}
                </div>
                <!-- Properties description end -->

                <!-- Properties condition start -->
                <div class="properties-condition mb-40">
                    <h3 class="heading-2">
                        Condiciones
                    </h3>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <ul class="condition">
                                <li>
                                    <i class="flaticon-furniture"></i>2 Bedroom
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>Bathroom
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <ul class="condition">
                                <li>
                                    <i class="flaticon-square"></i>4800 sq ft
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>TV Lounge
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <ul class="condition">
                                <li>
                                    <i class="flaticon-vehicle"></i>1 Garage
                                </li>
                                <li>
                                    <i class="flaticon-window"></i>Balcony
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Properties condition end -->

                <!-- Properties amenities start -->
                <div class="properties-amenities mb-40">
                    <h3 class="heading-2">
                        Caracteristicas
                    </h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <i class="flaticon-technology"></i>Air conditioning
                                </li>
                                <li>
                                    <i class="flaticon-window"></i>Balcony
                                </li>
                                <li>
                                    <i class="flaticon-beach"></i>Pool
                                </li>
                                <li>
                                    <i class="flaticon-holidays-1"></i>Room service
                                </li>
                                <li>
                                    <i class="flaticon-people-2"></i>Gym
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <i class="flaticon-connection"></i>Wifi
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>Parking
                                </li>
                                <li>
                                    <i class="flaticon-furniture"></i>Double Bed
                                </li>
                                <li>
                                    <i class="flaticon-comedy"></i>Home Theater
                                </li>
                                <li>
                                    <i class="flaticon-technology-3"></i>Electric
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <i class="flaticon-technology-1"></i>Telephone
                                </li>
                                <li>
                                    <i class="flaticon-people-3"></i>Jacuzzi
                                </li>
                                <li>
                                    <i class="flaticon-clock"></i>Alarm
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>Garage
                                </li>
                                <li>
                                    <i class="flaticon-lock"></i>Security
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Properties amenities end -->

                <!-- Floor plans start -->
                <div class="floor-plans mb-50">
                    <h3 class="heading-2">Planos</h3>
                    <table>
                        <tbody><tr>
                            <td><strong>Size</strong></td>
                            <td><strong>Rooms</strong></td>
                            <td><strong>Bathrooms</strong></td>
                            <td><strong>Garage</strong></td>
                        </tr>
                        <tr>
                            <td>1600</td>
                            <td>3</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                    @if(isset($imagenesPlanos))
                    <img src="{{ asset($imagenesPlanos->fotoPlano) }}" alt="floor-plans" class="img-fluid">
                    @else
                    No tiene imagenes de planos
                    @endif
                </div>
                <!-- Floor plans end -->

                <!-- Inside properties start -->
                <div class="inside-properties mb-50">
                    <h3 class="heading-2">
                        Video
                    </h3>
                    @if($propiedad->urlVideo != null)
                    <iframe src="{{ $propiedad->urlVideo }}" allowfullscreen=""></iframe>
                    @else
                    No tiene video asociado
                    @endif
                </div>
                <!-- Inside properties end -->
                <input type="hidden" id="paises" value="{{ $propiedad->nombrePais }}">
                <input type="hidden" id="select_regiones" value="{{ $propiedad->nombreRegion }}">
                <input type="hidden" id="select_provincias" value="{{ $propiedad->nombreProvincia }}">
                <input type="hidden" id="select_comunas" value="{{ $propiedad->nombreComuna }}">
                <input type="hidden" id="txtDireccion" value="{{ $propiedad->direccion1 }}">
                <input type="hidden" id="txtNumero" value="{{ $propiedad->direccion2 }}">
                <!-- Location start -->
                <div class="location mb-50">
                    <div class="map">
                        <h3 class="heading-2">Ubicación</h3>
                        <div class="col-lg-12">
                            <div id="map" style="width: 100%; height: 300px"></div>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Location end -->
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-left">
                    <!-- Advanced search start -->
                    <div class="widget search-area advanced-search d-none d-xl-block d-lg-block">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>{{ $propiedad->nombrePais }}</p>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $propiedad->cantidadSubPropiedad }} SubPropiedades</p>
                            </div>
                            <hr>
                            <div class="col-lg-6">
                                <p>ESTADO:</p>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $propiedad->nombreEstado }}</p>
                            </div>
                            <div class="col-lg-7">
                                <p>$256.000 (25%)</p>
                            </div>
                            <div class="col-lg-5">
                                <p>${{ number_format($propiedad->precio,0,',','.') }}</p>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <progress max="100" value="25" style="width: 95%;">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>49 Inversores</p>
                            </div>
                            <div class="col-lg-4">
                                <p>18 dias</p>
                            </div>
                            <div class="col-lg-6" align="center">
                                <h4>%{{ $propiedad->rentabilidadAnual }}</h4>
                                <p>Rentabilidad Anual</p>
                            </div>
                            <div class="col-lg-6" align="center">
                                <h4>%{{ $propiedad->rentabilidadTotal }}</h4>
                                <p>Rentabilidad Total</p>
                            </div>
                            <br>
                            <div class="col-lg-6">
                                <p>Quiero invertir</p>
                            </div>
                            <div class="col-lg-6">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">$</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="valorInvertir" placeholder="10.000" onkeyup="format(this)" onchange="format(this)">
                              </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group mb-0">
                            <button class="search-button">Invierte</button>
                        </div>
                    </div>
                    
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