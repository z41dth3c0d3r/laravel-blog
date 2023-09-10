<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function __construct(
        private User $user,
        private Post $post
    ) {
    }
    public function getAllPosts(): Collection
    {
        return $this->post::with('user')->latest()->get();
    }

    public function createPost(array $postDetails): Post
    {
        return $this->post->create($postDetails);
    }

    function getPostById($postId): Post
    {
        return Post::with('user')->find($postId);
    }

    function getPostsByUserId($userId): Collection
    {
        return User::with(['posts' => function ($query) {
            return $query->latest();
        }])->find($userId)->posts;
    }

    function deletePost($postId): void
    {
        Post::destroy($postId);
    }

    function updatePost($postId, array $newDetails): void
    {
        Post::whereId($postId)->update($newDetails);
    }
}
