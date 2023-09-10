<?php

namespace App\Actions\Post;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class GetPostAction
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    function handle($postId): Post
    {
        return $this->postRepository->getPostById($postId);
    }
}
