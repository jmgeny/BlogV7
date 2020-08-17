<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;

class PageController extends Controller
{
    public function blog()
    {
        $tags = Tag::all();
        $categories = Category::all();
    	$posts = Post::orderBy('id','desc')->where('status','PUBLISHER')->paginate(15);

    	return view('web.posts',compact('posts','tags','categories'));
    }

    public function post($slug)
    {
    	$post = Post::with('user','category','tags')->where('slug',$slug)->first();

    	return view('web.post',compact('post'));
    }

    public function category($slug)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $cat = Category::where('slug',$slug)->pluck('id')->first();
        $posts = Post::orderBy('name')->where('category_id',$cat)->where('status','PUBLISHER')->paginate(15);

        return view('web.posts',compact('posts','tags','categories'));
    }

    public function tag($slug)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $tag = Tag::with('posts')->where('slug',$slug)->first();
        $posts = $tag->posts()->where('status','PUBLISHER')->paginate(15);
        
        return view('web.posts',compact('posts','tags','categories'));

    }
}
