{!! Form::open(['route'=>['mantenedor-usuarios.delete',$usuario->idUsuario],'method'=>'delete']) !!}
	<button class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
