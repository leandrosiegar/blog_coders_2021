<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // ****************************************
    public function __construct() {
        // en only le indicas los métodos a los q puede entrar con ese permiso
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    // *********************************
    public function index() {
        $posts = Post::where('status', 2)->latest('id')->paginate(8);
        return view('posts.index', compact('posts'));
    }

    // *********************************
    public function show(Post $post) {

        $this->authorize('estaPublicado', $post);

        $postSimilares = Post::where('category_id', $post->category_id)
                            ->where('status',2)
                            ->where('id','!=', $post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();

        return view('posts.show', compact('post', 'postSimilares'));
    }

    // *********************************
    public function category(Category $category) {
        $posts = Post::where('category_id', $category->id)
                ->where('status',2)
                ->latest('id')
                ->paginate(4);

        return view('posts.category', compact('posts', 'category'));
    }

     // *********************************
     public function tag(Tag $tag) {
        $posts = $tag->posts()->where('status', 2)
         ->latest('id')
         ->paginate(4);

         return view('posts.tag', compact('posts', 'tag'));


     }
}
