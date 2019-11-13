@extends ('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-12">
		<h3>Editar Proyecto{{$proyectos->nombre}}</h3>
		@if(count($errors)>0)
			<div class="alert alert-danger">
			<ul>
			@foreach ($erros->all() as $error)
					<li>{{$error}}</li>
			@endforeach
			</ul>
			</div>
		@endif
		{!!Form::model($proyectos,['method'=>'PATCH', 'route'=>['proyectos.update',$proyectos->idproyecto]])!!}
			{{Form::token()}}
			<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$proyectos->nombreproyecto}}" placeholder="Nombre...">
            
            </div>
			<div class="form-group">
			<label for="descripcion">Descripción</label>
			<input type="text" name="descripcion" class="form-control" value="{{$proyectos->descripcion}}" placeholder="Descripción...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="submit">Cancelar</button>
			</div>
		{!!form::close()!!}
		</div>
	</div>
@stop