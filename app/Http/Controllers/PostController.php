<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.show', ['post' => $post]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post = $post->delete();
        return redirect()->route('posts');
    }
}
