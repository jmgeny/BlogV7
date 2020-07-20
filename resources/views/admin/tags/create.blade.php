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
    					Crear de Etiquetas
    					<a href="{{ route('admin.tags.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>
  					</div>
  					<form action="{{ route('admin.tags.store') }}" method="POST">
  							@csrf
  						<div class="card-body">
  							<div class="form-group">
  								<label for="name">Nombre Etiqueta</label>
  								<input type="text" class="form-control" id="name" name='name'>
  							</div>
  							<div class="form-group">
  								<label for="slug">URL Amigable</label>
  								<input readonly type="text" class="form-control" id="slug" name="slug">
  							</div>
  						</div>
  						<div class="card-footer">
  							<button type="submit" class="btn btn-primary">Enviar</button>
  						</div>
  					</form>
				</div>				
			</div>
		</div>
	</div>
@endsection


