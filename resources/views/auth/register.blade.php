@extends('layouts.login.app')
@section('title')
Registrarse
@endsection
@section('content')
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="form-content-box">
                    <a class=" d-block d-sm-block d-md-block d-lg-none">
                        <img src="{{ asset('img_public/logos/white-logo.png') }}" class="cm-logo" alt="black-logo">
                    </a>
                    <a>
                        <img src="{{ asset('img_public/logos/white-logo.png') }}" class="cm-logo" alt="black-logo" style="visibility: hidden;">
                    </a>
                    <div class="details">
                        <h3>Crea tu cuenta</h3>
                        {!!Form::open(['route' => 'registro.store', 'method' => 'POST'])!!}
                            <div class="form-group">
                                {!!Form::text('nombre',null,['class'=>"form-control", 'placeholder'=>"Nombres" , 'required'])!!}
                            </div>
                            <div class="form-group">
                                {!!Form::text('apellido',null,['class'=>"form-control", 'placeholder'=>"Apellidos" , 'required'])!!}
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                  </div>
                                {!!Form::number('numero',null,['class'=>"form-control", 'placeholder'=>"9 87654321" , 'required','id'=>"inlineFormInputGroup"])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::email('correo',null,['class'=>"form-control", 'placeholder'=>"Email" , 'required'])!!}
                            </div>
                            <div class="form-group">
                                {!!Form::text('rut',null,['class'=>"form-control", 'placeholder'=>"Ingrese su rut sin puntos ni guiones" , 'required','onchange'=>"formateaRut(this.value)", 'id'=>"rut"])!!}
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                              <input type="text" name="codigoPromocional" class="form-control" placeholder="Código promocional">
                            </div>
                            <div class="form-group">
                               {!! NoCaptcha::renderJs() !!}
                               {!! NoCaptcha::display() !!}
                            </div>
                            <div class="row">
                              <div class="col-lg-12 form-group">
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <input type="checkbox" id="condiciones" name="condiciones" required> &nbsp;&nbsp;
                                        <label for="">Acepto las <a style="color: blue" onclick="condicionesServicios()">condiciones de servicios</a> de NAPALM y los terminos y condiciones de ISBAST</label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div style="display: none" id="condiciones_servicios">
                              <div class="row">
                                <div class="col-lg-9">
                                  <p><strong>Condiciones de uso de Housers:</strong></p>
                                </div>
                                <div class="col-lg-3">
                                  <a style="color: blue" onclick="condicionesServicios();">x</a>
                                </div>
                                <div class="col-lg-12" align="left">
                                  <ul>
                                    <li type="square">
                                      <a target="_blank" href="{{ asset('condiciones-servicios/documento') }}/{{ $condicionServicio->idCondicionServicio }}" style="color: blue">Términos y Condiciones Generales de la plataforma</a>
                                    </li>
                                    <li type="square">
                                      <a target="_blank" href="{{ asset('politicas-privacidad') }}" style="color: blue">Política de Privacidad</a>
                                    </li>
                                </ul>
                                </div>
                              </div>
                                <br>
                                <br>
                              
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">Registrarse</button>
                            </div>
                        {!!Form::close()!!}
                    </div>
                    <div class="footer">
                      <span>
                          ¿Ya eres miembro? <a href="{{ asset('login') }}">Ingresa Aqui!</a>
                      </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-none d-sm-none d-md-none d-lg-block">
              <div class="form-content-box">
                <a href="index.html">
                    <img src="{{ asset('img_public/logos/white-logo.png') }}" class="cm-logo" alt="black-logo">
                </a>
              </div>
            </div>
            <div class="col-lg-5 d-none d-sm-none d-md-none d-lg-block">
                <div class="form-content-box">
                    <a href="index.html">
                        <img src="{{ asset('img_public/logos/white-logo.png') }}" class="cm-logo" alt="black-logo" style="visibility: hidden;">
                    </a>
                    <div class="details">
                        <div class="row">
                            <h3 class="col-md-12">Regístrate en Housers.</h3>
                            <h3 class="col-md-12">Todo son ventajas:</h3>
                        </div>
                        <div class="row">

                            <div class="col-md-2"><img src="https://static.housers.com/img/register/ico-register-1.png" alt=""></div>
                            <div class="col-md-10">Darte de alta en Housers no compromete a nada y no tiene ningún coste.</div>
                        </div>
                            <br>

                        <div class="row">

                            <div class="col-md-2"><img src="https://static.housers.com/img/register/ico-register-2.png" alt=""></div>
                            <div class="col-md-10">La cuenta Housers no tiene comisiones, puedes ingresar y retirar fondos siempre que quieras sin ningún coste.</div>

                        </div>
                            <br>
                        <div class="row">
                            <br>

                            <div class="col-md-2"><img src="https://static.housers.com/img/register/ico-register-3.png" alt=""></div>
                            <div class="col-md-10">Una vez que realices el proceso de alta podrás acceder a tu área privada y analizar toda la documentación soporte de los proyectos.</div>

                        </div>
                            <br>

                        <div class="row">
                            <div class="col-md-2"><img src="https://static.housers.com/img/register/ico-register-4.png" alt=""></div>
                            <div class="col-md-10">Invierte a partir de 50 € en las mejores oportunidades inmobiliarias con todas las garantías y altas rentabilidades. De una forma rápida, sencilla y segura.</div>

                        </div>
                            <br>

                        <div class="row">
                            <div class="col-md-2"><img src="https://static.housers.com/img/register/ico-register-6.png" alt=""></div>
                            <div class="col-md-10">Earlyield: consigue una rentabilidad  anual*  extra, que se indicará de manera exclusiva en el proyecto, desde el día en que inviertas hasta que se financie el proyecto en todas las oportunidades en fase de financiación y que se indique expresamente (<a href="https://www.housers.com/blog/es/earlyield-por-el-interes-te-quiero-andres/" target="_blank">*consulta condiciones</a>).</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
  function formateaRut(rut) {
      var actual = rut.replace(/^0+/, "");
      if (actual != '' && actual.length > 1) {
          var sinPuntos = actual.replace(/\./g, "");
          var actualLimpio = sinPuntos.replace(/-/g, "");
          var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
          var rutPuntos = "";
          var i = 0;
          var j = 1;
          for (i = inicio.length - 1; i >= 0; i--) {
              var letra = inicio.charAt(i);
              rutPuntos = letra + rutPuntos;
              if (j % 3 == 0 && j <= inicio.length - 1) {
                  rutPuntos = "." + rutPuntos;
              }
              j++;
          }
          var dv = actualLimpio.substring(actualLimpio.length - 1);
          rutPuntos = rutPuntos + "-" + dv;
      }
      document.getElementById('rut').value = rutPuntos;
  }
  const condicionesServicios = () => {
    if(document.getElementById('condiciones_servicios').style.display == "none"){
      document.getElementById('condiciones_servicios').style.display = "block";
    }else{
      document.getElementById('condiciones_servicios').style.display = "none";
    }
  }
</script>
@endsection