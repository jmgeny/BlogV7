@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
    					Ver de Etiquetas
    					<a href="{{ route('admin.tags.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>
  					</div>
				  <div class="card-body">
						
				  	<form>
				  		<div class="form-group">
				  			<label for="name">Nombre Etiqueta</label>
				  			<input disabled="none" type="text" class="form-control" id="name" value="{{ $tag->name }}">
				  		</div>
				  		<div class="form-group">
				  			<label for="tag">URL Amigable</label>
				  			<input disabled="none" type="text" class="form-control" id="tag" value="{{ $tag->slug }}">
				  		</div>
				  	</form>

				  </div>
				  	<div class="card-footer">
  						<a class="btn btn-warning" href="{{ route('admin.tags.edit', $tag->id) }}">Editar</a>
  					</div>
				</div>				
			</div>
		</div>
	</div>
@endsection