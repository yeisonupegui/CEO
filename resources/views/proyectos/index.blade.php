@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proyectos <a href="proyectos/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('proyectos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre Proyecto</th>
					<th>Descripción Proyecto</th>
					<th>Opciones</th>
				</thead>
               @foreach ($proyectos as $pry)
				<tr>
					<td>{{ $pry->idproyecto}}</td>
					<td>{{ $pry->nombreproyecto}}</td>
					<td>{{ $pry->descripcion}}</td>
					<td>
						<a href="{{URL::action('ProyectoController@edit',$pry->idproyecto)}}">
							<button class="btn btn-info">Editar</button></a>

                         <a href="#" data-target="#modal-delete-{{$pry->idproyecto}}" data-toggle="modal">
							 <button class="btn btn-danger">Eliminar</button></a>
						 
						 <a href="javascript:;" data-toggle="modal-delete-{{$pry->idproyecto}}" onclick="deleteData({{$pry->idproyecto}})" 
						data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

					</td>
					
				</tr>
				@include('proyectos.modal')
				
				@endforeach
				
			</table>
			
		</div>
		{{$proyectos->render()}}
	</div>
	
</div>




@endsection