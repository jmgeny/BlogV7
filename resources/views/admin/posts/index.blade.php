@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
    					<strong>Listado de Entradas (Post)</strong>
    					<a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
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
					  	@foreach ($posts as $post)
					    <tr>
					      <th scope="row">{{ $post->id }}</th>
					      <td>{{ $post->name }}</td>
					      <td>{{ $post->slug }}</td>
					      {{-- <td>{{ $post->description }}</td> --}}
					      <td><a class="btn btn-success" href="{{ route('admin.posts.show', $post->id) }}">ver</a></td>
					      <td><a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Editar</a></td>
					      <td>
					      	<form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST">
					      		@csrf
					      		@method('DELETE')
					      		<button class="btn btn-danger">Eliminar</button>
					      	</form>
					      </td>
					    </tr>
					  	@endforeach
					  </tbody>
					  {{ $posts->links() }}
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