{!! Form::open(['route'=>['mantenedor-usuarios.delete',$usuario->idUsuario],'method'=>'delete']) !!}
	<button class="dropdown-item" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
