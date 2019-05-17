<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Author extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'name' => $this->name,
            'books' => new BookCollection($this->whenLoaded('books')),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
