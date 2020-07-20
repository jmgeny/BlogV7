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
    					Editar de Categoria
    					<a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>
  					</div>
  					<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
  							@csrf
                @method('PUT')

  						<div class="card-body">
  							<div class="form-group">
  								<label for="name">Nombre Categoria</label>
  								<input type="text" class="form-control" id="name" name='name'
                  value="{{ $category->name }}">
  							</div>
  							<div class="form-group">
  								<label for="slug">URL Amigable</label>
  								<input readonly type="text" class="form-control" id="slug" name="slug"
                  value="{{ $category->slug }}">
  							</div>
                <div class="form-group">
                <label for="description">Descripcion</label>
                <textarea name="description" type="text" class="form-control" id="description" cols="30" rows="5">{{ $category->description }}</textarea>
              </div>
  						</div>
  						<div class="card-footer">
  							<button type="submit" class="btn btn-primary">Editar</button>
  						</div>
  					</form>
				</div>				
			</div>
		</div>
	</div>
@endsection


