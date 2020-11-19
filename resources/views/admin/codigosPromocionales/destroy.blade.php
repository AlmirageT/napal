{!! Form::open(['route'=>['mantenedor-codigos.delete',$codigo->idCodigo],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
