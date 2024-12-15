<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OurProductsResource extends JsonResource
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
            'name' => $this->name,
            'first_image' => $this->first_image ? asset('storage/' . $this->first_image) : null,
            'second_image' => $this->second_image ? asset('storage/' . $this->second_image) : null,
            'third_image' => $this->third_image ? asset('storage/' . $this->third_image) : null,
            'nutritional_table' => $this->nutritional_table ? asset('storage/' . $this->nutritional_table) : null,
            'description' => $this->description,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
