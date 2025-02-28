<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::with('user', 'likes', 'comments')->latest()->get();
    return view('dashboard', compact('posts'));
}

public function store(Request $request)
{
    $request->validate([
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $post = new Post();
    $post->user_id = Auth::id();
    $post->content = $request->content;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public'); // Stores in storage/app/public/posts
        $post->image = $imagePath;
    }

    $post->save();

    return redirect()->route('dashboard')->with('success', 'Post created successfully!');
}

public function like(Post $post)
{
    $like = Like::where('post_id', $post->id)->where('user_id', Auth::id())->first();

    if ($like) {
        $like->delete(); // Un-like
    } else {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);
    }

    return back();
}

public function comment(Request $request, Post $post)
{
    $request->validate([
        'content' => 'required',
    ]);

    Comment::create([
        'user_id' => Auth::id(),
        'post_id' => $post->id,
        'content' => $request->content,
    ]);

    return back();
}
}
