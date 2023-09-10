<?php

namespace App\Actions\Post;

use App\Interfaces\PostRepositoryInterface;

class UpdatePostAction
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    public function handle($postId, array $postDetails): void
    {
        $this->postRepository->updatePost($postId, $postDetails);
    }
}
