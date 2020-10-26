{!! Form::open(['route'=>['mantenedor-tipos_creditos.delete',$tipo_credito->idTipoCredito],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
