@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
					
			<h2>Ver Entradas (Post)</h2>
    					
		<div class="card">
			<div class="card-header">
				<strong>Categoria: </strong>
				<a href="{{ route('category',$post->category->slug) }}">{{ $post->category->name }}</a>
				<a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>

			</div>	
			<div class="card-body">
				@if ($post->image)
					<img src="{{ asset($post->image->url) }}" class="card-img-top" alt="...">
				@else
					<img src="https://picsum.photos/400/225" class="card-img-top" alt="lorempicsum">	
				@endif
				<strong>Extracto: </strong>{!! $post->excerpt !!}

				<hr>

				<strong>Descipción: </strong>{!! $post->description !!}

				{{-- <h5 class="card-title">Card title</h5> --}}
				{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}

				<hr>
				<strong>Usuario: </strong>{{ $post->user->name }}
		

				<hr>
				<strong> Etiquetas: </strong>
				@foreach ($post->tags as $tag)
					<a href="{{ route('tag',$tag->slug) }}">{{ $tag->name }}</a>
				@endforeach

			</div>
			<div class="card-footer">
				<a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Editar</a>
				<a class="btn btn-success" href="{{ route('admin.posts.create') }}">Crear Post</a>
  			</div>

		</div>							
			</div>
		</div>
	</div>
@endsection