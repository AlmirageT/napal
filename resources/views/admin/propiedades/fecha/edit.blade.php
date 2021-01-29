@extends('layouts.admin.app')
@section('title')
Actualizar Fecha Propiedad
@endsection

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Actualizar Fecha Propiedad</h3>
			</div>
        </div>
        <form action="{{ asset('napalm/editar-fecha-finalizacion-propiedad') }}/{{ $propiedad->idPropiedad }}" method="POST">
        	@csrf
				<div class="card-body">
					<div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Fecha Finalizacion Actual</label>
                                <input type="date" class="form-control" min="{{ date("Y-m-d", strtotime($propiedad->fechaFinalizacion) )}}" disabled value="{{ date("Y-m-d", strtotime($propiedad->fechaFinalizacion) ) }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nueva Fecha Finalizacion</label>
                                <input type="date" name="fechaFinalizacion" class="form-control" min="{{ date("Y-m-d", strtotime($propiedad->fechaFinalizacion) )}}" required >
                            </div>
                        </div>
                    </div>
                </div>
				<div class="card-footer">
                    <button class="btn btn-primary btn-block">Actualizar Fecha</button>
                </div>
        </form>
	</div>
</div>
@endsection


