<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index() {
        return Post::all();
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $post = Post::create($data);
    return response()->json($post, 201);
}


    public function show(Post $post) {
        return $post;
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());
        return $post;
    }

    public function destroy(Post $post) {
        $post->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
