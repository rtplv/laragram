<?php


namespace App\Services;


use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $photo->storage_path = Storage::url($photoStoragePath);
        $photo->post()->associate($post);
        $photo->save();

        return $post;
    }

    public function getPost(string $id): JsonResponse
    {
        // TODO: ResponseHelper с обработкой ошибок в Exception/Handler
        return response()->json([
            'success' => true,
            'post' => Post::query()->with(['photo', 'user'])->find($id)
        ]);
    }

    public function getPostsByUserId(int $userId): JsonResponse
    {
        return response()->json([
            'success' => true,
            'posts' => Post::query()
                ->with(['photo', 'user'])
                ->where('user_id', $userId)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function getPostsForFeed(int $offset = 0, int $limit = 20)
    {
        return response()->json([
            'success' => true,
            'posts' => Post::query()
                ->with(['photo', 'user'])
                ->limit($limit)
                ->offset($offset)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }
}
