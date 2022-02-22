<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function savePost(User $user, array $data)
    {
        return $user->posts()->create($data);
    }

    public function getUserPosts()
    {
        return $this->post->onlyOwnerPosts()->paginate(10);
    }

    public function updatePost(int $postId, array $data)
    {
        return $this->post->findOrFail($postId)->update($data);
    }

    public function deletePost(int $postId)
    {
        return $this->post->whereId($postId)->delete();
    }

    public function getPublicPosts()
    {
        return $this->post->publicPostOnly()->paginate(10);
    }

    public function getAllPosts()
    {
        return  $this->post->with('author')->paginate(10);
    }
}
