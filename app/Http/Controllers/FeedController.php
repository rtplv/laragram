<?php

namespace App\Http\Controllers;

class FeedController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('feed');
    }
}
