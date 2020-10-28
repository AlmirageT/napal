<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$comuna->idComuna}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-comunas.update',$comuna->idComuna], 'method' => 'PUT','files'=>true]) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Estado
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Comuna</label>
                            {!!Form::text('nombreComuna',$comuna->nombreComuna,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Pais</label>
                            {!! Form::select('idPais', $paises,$comuna->idPais,['class'=>"form-control",'placeholder'=>"Ingrese el pais de residencia",'required','id'=>"paises_edit", 'onchange'=>"sacarRegionPorPaisEdit(this.value)"]) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Región</label>
                            {!! Form::select('idRegion', $regiones,$comuna->idRegion,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','id'=>"select_regiones_edit", 'onchange'=>"sacarProvinciaPorRegionEdit(this.value)"]) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Provincia</label>
                            {!! Form::select('idProvincia', $provincias,$comuna->idProvincia,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','id'=>"select_provincias_edit"]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Actualizar
                </button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script>
    function onFileSelected(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();

      var imgtag = document.getElementById("myimage_edit");
      imgtag.title = selectedFile.name;

      reader.onload = function(event) {
        imgtag.src = event.target.result;
      };

      reader.readAsDataURL(selectedFile);
    }
    const sacarRegionPorPaisEdit = (pais) => {
        $.get('{{ asset('regiones') }}/'+pais, (data, status) => {
            var regiones = "<option value=''>Seleccione una región</option>";
            data.forEach(region => {
                regiones += `<option value="${region['idRegion']}">${region['nombreRegion']}</option>`;
            });
            document.getElementById('select_regiones_edit').innerHTML = regiones;
        });
    }
    const sacarProvinciaPorRegionEdit = (region) => {
        $.get('{{ asset('provincias') }}/'+region, (data, status) => {
            var provincias = "<option value=''>Seleccione una provincia</option>";
            data.forEach(provincia => {
                provincias += `<option value="${provincia['idProvincia']}">${provincia['nombreProvincia']}</option>`;
            });
            document.getElementById('select_provincias_edit').innerHTML = provincias;
        });
    }
</script>
