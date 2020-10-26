{!! Form::open(['route'=>['mantenedor-tipos_telefonos.delete',$tipo_telefono->idTipoTelefono],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
