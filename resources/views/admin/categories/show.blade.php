@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
    					Ver Categorias
    					<a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary float-right">Regresar</a>
  					</div>
				  <div class="card-body">
						
				  	<form>
				  		<div class="form-group">
				  			<label for="name">Nombre Categoria</label>
				  			<input disabled="none" type="text" class="form-control" id="name" value="{{ $category->name }}">
				  		</div>
				  		<div class="form-group">
				  			<label for="slug">URL Amigable</label>
				  			<input disabled="none" type="text" class="form-control" id="slug" value="{{ $category->slug }}">
				  		</div>
				  		<div class="form-group">
				  			<label for="description">Descripcion</label>
				  			<textarea disabled="none" type="text" class="form-control" id="description" cols="30" rows="5">{{ $category->description }}</textarea>
				  		</div>				  		
				  	</form>

				  </div>
				  	<div class="card-footer">
  						<a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}">Editar</a>
  					</div>
				</div>				
			</div>
		</div>
	</div>
@endsection