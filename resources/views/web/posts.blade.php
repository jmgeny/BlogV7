@extends ('layouts.app')

@section('content')

<div class="container-fluid shadow mt-3">
	<div class="row">
		<div class="col-9">
			<div class="row">
				@foreach ($posts as $post)
				<div class="col-sm-6">
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
		
		<aside class="col-3">
				<h4>SponorGeneral</h4>
				<div class="card mb-2">
					<a href="#">
						<img src="{{ asset('img/ENARD_Logo_Color.jpg')}}" class="card-img-top" alt="...">	
					</a>	
				</div>
				<div class="card mt-2">
					<a href="#">
						<img src="{{ asset('img/ENARD_Logo_Color.jpg')}}" class="card-img-top" alt="...">	
					</a>	
				</div>
				<div class="card mt-2">
					<a href="#">
						<img src="{{ asset('img/ENARD_Logo_Color.jpg')}}" class="card-img-top" alt="...">	
					</a>	
				</div>
				<div class="card mt-2">
					<a href="#">
						<img src="{{ asset('img/ENARD_Logo_Color.jpg')}}" class="card-img-top" alt="...">	
					</a>	
				</div>
				<div class="card mt-2">
					<a href="#">
						<img src="{{ asset('img/ENARD_Logo_Color.jpg')}}" class="card-img-top" alt="...">	
					</a>	
				</div>
		</aside>
		
	</div>
</div>

<footer class="container-fluid">
<div class="row">	
	<div class="col-sm-6">
		<strong>Categorias</strong>
		@foreach ($categories as $categoria)
		<a href="{{ route('category',$categoria->slug) }}">{{ $categoria->name }}</a>
		@endforeach
	</div>
	<div class="col-sm-6">
		<strong> Etiquetas: </strong>
		@foreach ($tags as $tag)
		<a href="{{ route('tag',$tag->slug) }}">{{ $tag->name }}</a>
		@endforeach		
	</div>	
</div>
</footer>
@endsection