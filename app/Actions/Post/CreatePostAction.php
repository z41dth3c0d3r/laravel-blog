<?php

namespace App\Actions\Post;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class CreatePostAction
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    public function handle(array $postDetails): Post
    {
        $post = $this->postRepository->createPost($postDetails);

        return $post;
    }
}
