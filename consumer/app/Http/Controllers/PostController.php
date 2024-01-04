<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->where('status', true)->paginate();

        return response()->json($posts->getCollection()->transform(function ($post) {
            $post->image = "http://localhost:9090/storage/{$post->image}";

            return $post;
        }));
    }
}
