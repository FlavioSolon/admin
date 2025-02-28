<?php

namespace App\Http\Resources\FindUs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAdResource extends JsonResource
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
            'image_url' => asset('storage/' . $this->image_path), // Criação da URL completa da imagem
            'marketplace_url' => $this->marketplace_url,
        ];
    }
}
