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
    					Crear Categoría
    					<a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>
  					</div>
  					<form action="{{ route('admin.categories.store') }}" method="POST">
  							@csrf
  						<div class="card-body">
  							<div class="form-group">
  								<label for="name">Nombre Categoría</label>
  								<input type="text" class="form-control" id="name" name='name'>
  							</div>
  							<div class="form-group">
  								<label for="slug">URL Amigable</label>
  								<input readonly type="text" class="form-control" id="slug" name="slug">
  							</div>
                <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" type="text" class="form-control" id="description" cols="30" rows="5"></textarea>
              </div>
  						</div>
  						<div class="card-footer">
  							<button type="submit" class="btn btn-primary">Guardar</button>
  						</div>
  					</form>
				</div>				
			</div>
		</div>
	</div>
@endsection


