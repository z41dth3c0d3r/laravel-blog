<?php

namespace App\DTO\Post;

class UpdatePostDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $content,
        public int $user_id
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $this->user_id
        ];
    }
}
