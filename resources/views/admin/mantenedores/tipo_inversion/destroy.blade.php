{!! Form::open(['route'=>['mantenedor-tipos_inversiones.delete',$tipo_inversion->idTipoInversion],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
