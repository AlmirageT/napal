{!! Form::open(['route'=>['mantenedor-tipos_documentos.delete',$tipo_documento->idTipoDocumento],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
