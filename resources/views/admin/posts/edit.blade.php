@extends ('layouts.app')

@section('scripts')

<script src="{{ asset('js/jquery.stringtoslug.min.js') }}"></script>

 <script>
  $(document).ready( function() {
    $("#name").stringToSlug({
        callback: function(text){
          $("#slug").val(text);
        }
    });
});
 </script>

@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
            <p>Editar Post</p>
    					<a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary float-left">Crear Nueva</a>
              <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>
  				</div>
  					<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
  							@csrf
                @method('PUT')

                @include('admin.posts.parcial.form')

  					</form>
				</div>				
			</div>
		</div>
	</div>
@endsection


