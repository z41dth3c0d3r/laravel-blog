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
        return $this->post::with('user')->all();
    }

    public function createPost(array $postDetails): Post
    {
        return $this->post->create($postDetails);
    }
}
