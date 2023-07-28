<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product id' => $this->id,
            'product name' => $this->name,
            'product price' => "$" . $this->price,
            'discounted price' => "$" . ($this->price * 0.9),
            'discount' => "$" . ($this->price * 0.1),
            'product description' => $this->description,
        ];
    }
}
