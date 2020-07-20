@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
    					<strong>Listado de Categorias</strong>
    					<a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
  					</div>
				  <div class="card-body">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Slug</th>
					      {{-- <th scope="col">Descripción</th> --}}
					      <th colspan="3"></th>

					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($categories as $category)
					    <tr>
					      <th scope="row">{{ $category->id }}</th>
					      <td>{{ $category->name }}</td>
					      <td>{{ $category->slug }}</td>
					      {{-- <td>{{ $category->description }}</td> --}}
					      <td><a class="btn btn-success" href="{{ route('admin.categories.show', $category->id) }}">ver</a></td>
					      <td><a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}">Editar</a></td>
					      <td>
					      	<form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
					      		@csrf
					      		@method('DELETE')
					      		<button class="btn btn-danger">Eliminar</button>
					      	</form>
					      </td>
					    </tr>
					  	@endforeach
					  </tbody>
					  {{ $categories->links() }}
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