{!! Form::open(['route'=>['mantenedor-tipos-medios-pagos.delete',$tipoMedioPago->idTipoMedioPago],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
