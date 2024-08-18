<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->get();
        return view('author.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('author.posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('author.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('author.posts.edit', compact('post'));
    }


    public function show(Post $post)
    {
        $this->authorizeOwnership($post);
        return view('author.posts.show', compact('post'));
    }
    public function update(Request $request, Post $post)
    {

        $this->authorizeOwnership($post);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('author.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $this->authorizeOwnership($post);
        $post->delete();
        return redirect()->route('author.posts.index')->with('success', 'Post deleted successfully.');
    }

    protected function authorizeOwnership(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }
    }
}
