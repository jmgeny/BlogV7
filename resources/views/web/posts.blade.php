@extends ('layouts.app')

@section('content')

<div class="container shadow">
	<div class="col-md-8 offset-md-2">
		<h1>Lista de Noticias</h1>

		@foreach ($posts as $post)
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
		@endforeach

		{{ $posts->links() }}	
	</div>
</div>

@endsection