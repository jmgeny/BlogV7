@extends ('layouts.app')

@section('content')

<div class="container shadow">
	<div>
		<strong>Categorias</strong>
				@foreach ($categories as $categoria)
					<a href="{{ route('category',$categoria->slug) }}">{{ $categoria->name }}</a>
				@endforeach
	</div>
	<div>
			<strong> Etiquetas: </strong>
				@foreach ($tags as $tag)
					<a href="{{ route('tag',$tag->slug) }}">{{ $tag->name }}</a>
				@endforeach		
	</div>
	<div class="col-md-10 offset-md-1">
		<h1>Lista de Noticias</h1>

<div class="row">
		@foreach ($posts as $post)
	<div class="col-sm-4">
		<div class="card">
			<div class="card-header">
				{{ $post->name }}
			</div>	
			<div class="card-body">
				@if ($post->image)
					<img src="{{ asset($post->image->url) }}" class="card-img-top" alt="...">
				@else
					<img src="https://picsum.photos/400/225" class="card-img-top" alt="lorempicsum">	
				@endif 
				{!! $post->excerpt !!}

				<a href="{{ route('post',$post->slug) }}" class="btn btn-primary float-right">Ver Mas</a>
			</div>

		</div>
		<br>
			</div>
		@endforeach
</div>
	

		{{ $posts->links() }}	
	</div>
</div>

@endsection