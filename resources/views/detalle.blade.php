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
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="http://placehold.it/730x486" class="img-fluid" alt="slider-properties">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img src="http://placehold.it/730x486" class="img-fluid" alt="slider-properties">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                            <img src="http://placehold.it/730x486" class="img-fluid" alt="slider-properties">
                        </div>
                        <div class="item carousel-item" data-slide-number="4">
                            <img src="http://placehold.it/730x486" class="img-fluid" alt="slider-properties">
                        </div>
                        <div class="item carousel-item" data-slide-number="5">
                            <img src="http://placehold.it/730x486" class="img-fluid" alt="slider-properties">
                        </div>
                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#propertiesDetailsSlider">
                                <img src="http://placehold.it/146x97" class="img-fluid" alt="properties-small">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#propertiesDetailsSlider">
                                <img src="http://placehold.it/146x97" class="img-fluid" alt="properties-small">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#propertiesDetailsSlider">
                                <img src="http://placehold.it/146x97" class="img-fluid" alt="properties-small">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-3" data-slide-to="3" data-target="#propertiesDetailsSlider">
                                <img src="http://placehold.it/146x97" class="img-fluid" alt="properties-small">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-4" data-slide-to="4" data-target="#propertiesDetailsSlider">
                                <img src="http://placehold.it/146x97" class="img-fluid" alt="properties-small">
                            </a>
                        </li>
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
                <!-- Property meta start -->
                <div class="property-meta mb-40">
                    <ul>
                        <li>
                            <i class="flaticon-furniture"></i>
                            <p>3 Beds</p>
                        </li>
                        <li>
                            <i class="flaticon-holidays"></i>
                            <p>1 Beths</p>
                        </li>
                        <li>
                            <i class="flaticon-square"></i>
                            <p>3,034 Sq Ft</p>
                        </li>
                        <li>
                            <i class="flaticon-vehicle"></i>
                            <p>1 Garages</p>
                        </li>
                    </ul>
                </div>
                <!-- Property meta end -->

                <!-- Advanced search start -->
                <div class="widget-2 advanced-search-2 d-lg-none d-xl-none">
                    <h3 class="sidebar-title">Advanced Search</h3>
                    <form method="GET">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="all-status">
                                <option>All Status</option>
                                <option>For Sale</option>
                                <option>For Rent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="all-type">
                                <option>All Type</option>
                                <option>Apartments</option>
                                <option>Houses</option>
                                <option>Commercial</option>
                                <option>Garages</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="commercial">
                                <option>Commercial</option>
                                <option>Residential</option>
                                <option>Land</option>
                                <option>Hotels</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="location">
                                <option>location</option>
                                <option>New York</option>
                                <option>Bangladesh</option>
                                <option>India</option>
                                <option>Canada</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="bedrooms">
                                        <option>Bedrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="bathroom">
                                        <option>Bathroom</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="balcony">
                                        <option>Balcony</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="garage">
                                        <option>Garage</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="range-slider">
                            <label>Area</label>
                            <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="range-slider">
                            <label>Price</label>
                            <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group mb-0">
                            <button class="search-button">Search</button>
                        </div>
                    </form>
                </div>
                <!-- Advanced search end -->

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
                        Condition
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
                        Features
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
                    <h3 class="heading-2">Floor Plans</h3>
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
                    <img src="http://placehold.it/730x370" alt="floor-plans" class="img-fluid">
                </div>
                <!-- Floor plans end -->

                <!-- Inside properties start -->
                <div class="inside-properties mb-50">
                    <h3 class="heading-2">
                        Video
                    </h3>
                    <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
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
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <form method="GET">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="all-status">
                                    <option>All Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="all-type">
                                    <option>All Type</option>
                                    <option>Apartments</option>
                                    <option>Houses</option>
                                    <option>Commercial</option>
                                    <option>Garages</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="commercial">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Land</option>
                                    <option>Hotels</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="location">
                                    <option>location</option>
                                    <option>New York</option>
                                    <option>Bangladesh</option>
                                    <option>India</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathroom">
                                            <option>Bathroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="balcony">
                                            <option>Balcony</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="garage">
                                            <option>Garage</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>

                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                <i class="fa fa-plus-circle"></i> Show More Options
                            </a>
                            <div id="options-content" class="collapse">
                                <label class="margin-t-10">Features</label>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                        Free Parking
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                        Air Condition
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">
                                        Places to seat
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">
                                        Swimming Pool
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox5" type="checkbox">
                                    <label for="checkbox5">
                                        Laundry Room
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">
                                        Window Covering
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox7" type="checkbox">
                                    <label for="checkbox7">
                                        Central Heating
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox8" type="checkbox">
                                    <label for="checkbox8">
                                        Alarm
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button class="search-button">Search</button>
                            </div>
                        </form>
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
@endsection