<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

use Illuminate\Support\Facades\File;
use App\Image;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id )->orderBy('name')->paginate(10);

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        $post_tag = [];
        $post = new Post;

        return view('admin.posts.create',compact('categories','tags','post_tag','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostUpdateRequest $request)
    {
        $post = Post::create($request->all());

       // Imagen
        $urlImagen = [];

        if ($request->hasFile('image')) 
        {
            $nombre = time().'-'.$request->image->getClientOriginalName();//Creo el Nombre
            $ruta   = public_path().'/imagenes';
            $request->image->move($ruta,$nombre);
            $urlImagen['url'] = '/imagenes/'.$nombre;
            $post->image()->create($urlImagen);
        } 
        //Imagen   

        $post->tags()->sync($request->get('tag')); 

        return redirect()->route('admin.posts.index')->with('info','La Entrada fue creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('pass',$post);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('pass',$post);
        
        $post_tag = [];
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        foreach ($post->tags as $tag) {
            $post_tag[] = $tag->id;
        }
        return view('admin.posts.edit', compact('post','categories','tags','post_tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {

        $post = Post::find($id);
        $this->authorize('pass',$post);
        $post->fill($request->all())->save();
        $post->tags()->sync($request->get('tag')); 

        // Imagen
        $urlImagen = [];

        if ($request->hasFile('image')) 
        {
            $nombre = time().'-'.$request->image->getClientOriginalName();//Creo el Nombre
            $ruta   = public_path().'/imagenes';
            $request->image->move($ruta,$nombre);
            $urlImagen['url'] = '/imagenes/'.$nombre;
            $post->image()->create($urlImagen);
        } 
        //Imagen
         return redirect()->route('admin.posts.index')->with('info','La Entrada fue modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('pass',$post);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('danger','La Entrada fue eliminada');
    }
}
