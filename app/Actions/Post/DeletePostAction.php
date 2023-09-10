<?php

namespace App\Actions\Post;

use App\Interfaces\PostRepositoryInterface;

class DeletePostAction
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    function handle($postId): void
    {
        $this->postRepository->deletePost($postId);
    }
}
