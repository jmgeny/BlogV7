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
    					Crear Entrada (Post)
    					<a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>
  				</div>
  					<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
             @csrf

              @include('admin.posts.parcial.form')

         </form>
				</div>				
			</div>
		</div>
	</div>
@endsection


