<?php

namespace App\Actions\Post;

use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Collection;

class GetAllPostsAction
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    function handle(): Collection
    {
        $posts = $this->postRepository->getAllPosts();

        return $posts;
    }
}
