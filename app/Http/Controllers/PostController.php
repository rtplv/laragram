<?php

namespace App\Http\Controllers;

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
}
