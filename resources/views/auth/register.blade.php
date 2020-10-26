<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    {!!Form::open(['route' => 'registro.store', 'method' => 'POST'])!!}
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            {!!Form::text('nombre',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus nombres..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Apellido</label>
                            {!!Form::text('apellido',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus apellidos..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Télefono</label>
                            {!!Form::number('numero',null,['class'=>"form-control", 'placeholder'=>"9 87654321" , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Email</label>
                            {!!Form::email('correo',null,['class'=>"form-control", 'placeholder'=>"Ingrese su email..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Rut</label>
                            {!!Form::text('rut',null,['class'=>"form-control", 'placeholder'=>"Ingrese su rut sin puntos ni guiones" , 'required','onchange'=>"formateaRut(this.value)", 'id'=>"rut"])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="**********" required>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <input type="checkbox" required> &nbsp;&nbsp;
                          </div>
                          Acepto las condiciones de servicios de NAPALM y los terminos y condiciones de ISBAST
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Registarse</button>
          </div>
        </div>
    {!!Form::close()!!}
  </div>
</div>
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
</script>