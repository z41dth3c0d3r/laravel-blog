<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => substr($this->content, 0, 25) . '...',
            'author' => $this->user->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
