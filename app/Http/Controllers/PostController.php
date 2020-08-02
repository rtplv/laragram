<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(string $id)
    {
        return view('post.index', [ 'id' => (int) $id ]);
    }
    public function create()
    {
        return view('post.create');
    }

    public function createPost(Request $request)
    {
        $post = (new PostService)->createPost($request);

        return response()->json([
            'success' => true,
            'post' => $post
        ]);
    }
}
