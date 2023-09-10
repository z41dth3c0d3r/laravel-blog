<?php

namespace App\Interfaces;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function getAllPosts(): Collection;
    public function getPostById($postId): Post;
    public function deletePost($postId): void;
    public function createPost(array $postDetails): Post;
    public function updatePost($postId, array $newDetails): void;
    public function getPostsByUserId($userId): Collection;
}
