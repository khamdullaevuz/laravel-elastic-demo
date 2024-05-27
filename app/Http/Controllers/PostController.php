<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->validate([
            'q' => 'string'
        ]);

        $search = Post::search($params['q'] ?? '')->get();

        $search = $search->map(fn($post) => new PostResource($post));

        return response()->json([
            'data' => $search
        ]);
    }
}
