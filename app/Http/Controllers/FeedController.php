<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index()
    {
        return view('feed');
    }

    public function me()
    {
        return view('me');
    }

    public function mePosts()
    {
        return (new PostService)->getPostsByUserId(Auth::id());
    }

    public function feedPosts()
    {
        // TODO: Add pagination
        return (new PostService)->getPostsForFeed(0, 20);
    }
}
