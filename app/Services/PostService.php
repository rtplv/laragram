<?php


namespace App\Services;


use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function createPost(Request $request): Post
    {
        $photoStoragePath = $request->file('photo')->storePublicly('user/photos');
        $description = $request->input('description');

        $post = new Post;
        $photo = new Photo;

        $post->description = $description;
        $post->user()->associate(Auth::user());
        $post->save();

        $photo->storage_path = $photoStoragePath;
        $photo->post()->associate($post);
        $photo->save();

        return $post;
    }
}
