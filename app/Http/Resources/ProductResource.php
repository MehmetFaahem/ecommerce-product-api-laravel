<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'sku' => $this->sku,
            'categories' => $this->categories,
            'images' => $this->images,
            'main_image' => $this->main_image,
            'reviews' => $this->reviews,
            'pricing' => $this->pricing,
            'sizes' => $this->sizes,
            'colors' => $this->colors,
            'stock' => $this->stock,
            'delivery' => $this->delivery,
            'outstanding_features' => $this->outstanding_features,
            'washing_instructions' => $this->washing_instructions,
            'specifications' => $this->specifications,
            'shipping' => $this->shipping,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
