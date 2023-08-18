<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return response()->json(['data' => $posts]);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::with('writer')->findOrFail($id);
        // Cara return non-array (tidak pakai collection)
        return new PostDetailResource($post);
    }
}
