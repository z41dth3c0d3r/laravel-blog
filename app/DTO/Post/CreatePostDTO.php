<?php

namespace App\DTO\Post;

class CreatePostDTO
{
  public function __construct(
    public string $title,
    public string $content,
    public int $user_id
  ) {
  }

  public function toArray(): array
  {
    return [
      'title' => $this->title,
      'content' => $this->content,
      'user_id' => $this->user_id
    ];
  }
}
