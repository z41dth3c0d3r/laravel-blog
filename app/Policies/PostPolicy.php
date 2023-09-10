<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }
    public function update(User $user, Post $post): bool
    {
        return $post->user()->is($user);
    }
    public function delete(User $user, Post $post): bool
    {
        return $this->update($user, $post);
    }
    public function edit(User $user, Post $post): bool
    {
        return $this->update($user, $post);
    }
}
