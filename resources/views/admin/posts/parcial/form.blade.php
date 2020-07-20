             <input type="text" value="{{ auth()->user()->id }}" name="user_id" hidden>
             <div class="card-body">

              <div class="form-group">
                <label for="category_id">Categorias</label>
                <select class="form-control" name="category_id" id="category_id">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>  

              <div class="form-group">
                <label for="name">Nombre Entrada</label>
                <input type="text" class="form-control" id="name" name='name' value="{{ $post->name ?? '' }}" >
              </div>

              <div class="form-group">
                <label for="slug">URL Amigable</label>
                <input readonly type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug ?? '' }}" >
              </div>

              <div class="form-group">
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
              </div>




              <div class="form-group">
                @foreach ($tags as $tag)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tag_{{$tag->id}}" value="{{$tag->id}}" name="tag[]"

                      @if (is_array(old('tag')) && in_array('$tag->id', old('tag')))
                        checked 
                      @elseif(is_array($post_tag) && in_array($tag->id, $post_tag))
                        checked
                      @endif
                    >
                    <label class="form-check-label" for="tag_{{$tag->id}}"> {{$tag->name}}</label>
                  </div>
                @endforeach
              </div>

               <div class="form-group">
                <label for="excerpt">Descripción Corta</label>
                <textarea name="excerpt" type="text" class="form-control ckeditor" id="excerpt" cols="30" rows="2">
                  {{ $post->excerpt ?? ''}}
                </textarea>
              </div>

              <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" type="text" class="form-control ckeditor" id="description" cols="30" rows="2">
                  {{ $post->description ?? ''}}
                </textarea>
              </div>

            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="stpub" name="status" value="PUBLISHER" 
                @if (old('status') == 'PUBLISHER')
                  checked
                @elseif($post->status == 'PUBLISHER')
                  checked     
                @endif
                >

                <label class="form-check-label" for="stpub">Publicado</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="stdrf" name="status" value="DRAFT" 
                @if (old('status') == 'DRAFT')
                  checked
                @elseif($post->status == 'DRAFT' or $post->status == '')
                  checked    
                @endif
                >

                <label class="form-check-label" for="stdrf">Borrador</label>
              </div>
            </div>


            </div>
            <div class="card-footer">
             <button type="submit" class="btn btn-primary">Guardar</button>
            </div>