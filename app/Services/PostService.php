<?php


namespace App\Services;


use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function createPost(Request $request): Post
    {
        $photoStoragePath = $request->file('photo')->storePublicly('user/photos', [ 'disk' => 'public' ]);
        $description = $request->input('description');

        $post = new Post;
        $photo = new Photo;

        $post->description = $description;
        $post->user()->associate(Auth::user());
        $post->save();

        // Storage is symlink on /public folder
        $photo->storage_path = '/storage/' . $photoStoragePath;
        $photo->post()->associate($post);
        $photo->save();

        return $post;
    }

    public function getPost(string $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'post' => Post::query()->with(['photo', 'user'])->find($id)
        ]);
    }
}
