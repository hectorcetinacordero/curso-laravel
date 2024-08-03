<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->get('title'))]);
        $validated = $request->validate([
            'author_id' => 'required|numeric',
            'title' => 'required|max:255',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'body' => 'required',
            'slug' => 'required|max:255'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $validated['image'] = $name;
        }

        Post::create($validated);
        return redirect()->route('posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->update($validated);
        return redirect()->route('posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post = $post->delete();
        return redirect()->route('posts');
    }
}
