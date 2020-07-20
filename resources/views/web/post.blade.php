@extends ('layouts.app')

@section('content')

<div class="container shadow">
	<div class="col-md-8 offset-md-2">
		<strong>Nombre de Entrada: </strong><h1>{{ $post->name }}</h1>

		
		<div class="card">
			<div class="card-header">
				<strong>Categoria: </strong>
				<a href="{{ route('category',$post->category->slug) }}">{{ $post->category->name }}</a>
				@guest

				@else
					<a class="btn btn-warning float-right" href="{{ route('admin.posts.edit', $post->id) }}">Editar</a>
				@endguest

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

				<hr>
				<strong>Usuario: </strong>{{ $post->user->name }}
		

				<hr>
				<strong> Etiquetas: </strong>
				@foreach ($post->tags as $tag)
					<a href="{{ route('tag',$tag->slug) }}">{{ $tag->name }}</a>, 
				@endforeach

			</div>

		</div>
	</div>
</div>

@endsection