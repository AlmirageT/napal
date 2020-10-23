{!! Form::open(['route'=>['mantenedor-tipos_usuarios.delete',$tipo_usuario->idTipoUsuario],'method'=>'delete']) !!}
	<button class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
