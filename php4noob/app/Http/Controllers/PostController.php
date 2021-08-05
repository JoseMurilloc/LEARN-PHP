<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $post = Post::create($request->all());
        return $post;
    }

    public function show(int $id)
    {
        $post = Post::find($id);
        return [
            'title' => $post->title,
            'content' => $post->content,
            'slugs' => $post->slugs,
            'likes' => $post->likes,
        ];
    }

    public function index()
    {
        return Post::all();
    }

    public function update(Request $request, int $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }
}
