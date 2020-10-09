@extends ('layouts.app')

@section('content')

<div class="container-fluid shadow mt-3">
	<div class="row justify-content-end">

		<article class="col-8">
			{{-- <strong>Nombre de Entrada: </strong>--}}
			<h1>{{ $post->name }}</h1>
			<div class="card">
				<div class="card-header">
					<strong>Categoria: </strong>
					<a href="{{ route('category',$post->category->slug) }}">{{ $post->category->name }}</a>
					@guest
					@else
						{{-- {{ dd ($post->user->id ) }} --}}
						{{-- {{ dd(Auth::user()->id) }} --}}
						@if($post->user->id === Auth::user()->id)
						<a class="btn btn-warning float-right" href="{{ route('admin.posts.edit', $post->id) }}">Editar</a>
						@endif
					@endguest
				</div>	
				<div class="card-body">
					@if ($post->image)
						<img src="{{ asset($post->image->url) }}" class="card-img-top" alt="...">
					@else
						<img src="https://picsum.photos/400/225" class="card-img-top" alt="lorempicsum">	
					@endif
					{{-- <strong>Extracto: </strong> --}}
					{!! $post->excerpt !!}
					<hr>
					{{-- <strong>Descipción: </strong> --}}
					{!! $post->description !!}
					<hr>
					{{-- <strong>Usuario: </strong> --}}
					{{ $post->user->name }}
					<hr>
					{{-- <strong> Etiquetas: </strong> --}}
					@foreach ($post->tags as $tag)
						<a href="{{ route('tag',$tag->slug) }}">{{ $tag->name }}</a>
					@endforeach
				</div>
			</div>
		</article>
		<aside class="col-2">
				<h4>Sponor Especifico de la nota</h4>
			<div class="card mb-2">
				<a href="#">
					<img src="{{ asset('img/ENARD_Logo_Color.jpg')}}" class="card-img-top" alt="...">	
				</a>	
			</div>
		</aside>
	</div>	
</div>
@endsection