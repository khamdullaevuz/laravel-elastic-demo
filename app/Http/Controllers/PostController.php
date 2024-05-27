<?php

namespace App\Http\Controllers;

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

        return response()->json($search);
    }
}
