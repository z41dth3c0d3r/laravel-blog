<?php

namespace App\Actions\Post;

use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Collection;

class GetPostsByUserAction
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    function handle($userId): Collection
    {
        return $this->postRepository->getPostsByUserId($userId);
    }
}
