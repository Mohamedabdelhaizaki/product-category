<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category->name,
            'status' => $this->is_active,
            'created_at' => $this->created_at,
            'show_route' => route('products.show', $this->id),
            'edit_route' => route('products.edit', $this->id),
        ];
    }
}
