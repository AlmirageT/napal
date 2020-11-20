{!! Form::open(['route'=>['mantenedor-tipos-faqs.delete',$tipoFaq->idTipoFaq],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
