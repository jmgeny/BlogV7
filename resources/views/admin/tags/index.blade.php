@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
    					<strong>Listado de Etiquetas</strong>
    					<a href="{{ route('admin.tags.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
  					</div>
				  <div class="card-body">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Slug</th>
					      <th colspan="3"></th>

					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($tags as $tag)
					    <tr>
					      <th scope="row">{{ $tag->id }}</th>
					      <td>{{ $tag->name }}</td>
					      <td>{{ $tag->slug }}</td>
					      <td><a class="btn btn-success" href="{{ route('admin.tags.show', $tag->id) }}">ver</a></td>
					      <td><a class="btn btn-warning" href="{{ route('admin.tags.edit', $tag->id) }}">Editar</a></td>
					      <td>
					      	<form action="{{ route('admin.tags.destroy',$tag->id) }}" method="POST">
					      		@csrf
					      		@method('DELETE')
					      		<button class="btn btn-danger">Eliminar</button>
					      	</form>
					      </td>
					    </tr>
					  	@endforeach
					  </tbody>
					  {{ $tags->links() }}
					</table>				    
				  </div>
				  <div class="card-footer">
				  	Pie 
				  </div>
				</div>				
			</div>
		</div>
	</div>
@endsection