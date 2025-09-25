<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required', 'min:5'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
    }

    Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => auth()->id(),
        'image' => $imagePath,
    ]);

    return to_route('posts.index');
}


    public function edit(Post $post)
    {
        if (!auth()->user()->is_admin && $post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|min:3',
        'description' => 'required|min:5',
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    $imagePath = $post->image; 

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    $post->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    return to_route('posts.show', $post->id);
}


    public function destroy(Post $post)
    {
        if (!auth()->user()->is_admin && $post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();
        return to_route('posts.index');
    }
public function home()
{
    $posts = Post::latest()->take(3)->get(); // هيعرض آخر 3 مقالات مثلا
    return view('posts.home', compact('posts'));
}




}
