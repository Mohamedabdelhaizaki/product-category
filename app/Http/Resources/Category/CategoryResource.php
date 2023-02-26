<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->is_active,
            'created_at' => $this->created_at,
            'show_route' => route('categories.show', $this->id),
            'edit_route' => route('categories.edit', $this->id),
        ];
    }
}
