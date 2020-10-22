$(document).ready(function(){
        var direccion = $("#direccion").val();
        $('#direccion, #numero, #paises, #regiones, #provincias, #comunas').change(function(){
            var direccion = $("#direccion").val();
            var numero = $("#numero").val();
            var pais = $("#paises option:selected").html();
            var region = $("#regiones option:selected").html();
            var provincia = $("#provincias option:selected").html();
            var comuna = $("#comunas option:selected").html();
            var direccionEnviar = "" + direccion + " " + numero + " " + comuna + " " + provincia + " " + region + " " + pais + " ";
            if(direccion != ""){
                $.ajax({
                  url: '/curls/' + direccionEnviar,
                  method:'GET',
                  dataType: 'json',
                  success: function (respuesta) {
                      document.getElementById("latitud").value = respuesta['results']['0']['geometry']['location']['lat'];
                      document.getElementById("longitud").value = respuesta['results']['0']['geometry']['location']['lng'];
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
            var direccion = $("#direccion").val();
            var numero = $("#numero").val();
            var pais = $("#paises option:selected").html();
            var region = $("#regiones option:selected").html();
            var provincia = $("#provincias option:selected").html();
            var comuna = $("#comunas option:selected").html();
            var direccionEnviar = "" + direccion + " " + numero + " " + comuna + " " + provincia + " " + region + " " + pais + " ";
            if(direccion != ""){
                $.ajax({
                  url: '/curls/' + direccionEnviar,
                  method:'GET',
                  dataType: 'json',
                  success: function (respuesta) {
                    console.log(respuesta);
                      document.getElementById("latitud").value = respuesta['results']['0']['geometry']['location']['lat'];
                      document.getElementById("longitud").value = respuesta['results']['0']['geometry']['location']['lng'];
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