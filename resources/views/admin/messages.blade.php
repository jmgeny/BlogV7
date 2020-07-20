        
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('danger') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('info') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden>&times;</span>
			</button>        	
        </div>
