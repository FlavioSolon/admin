<?php

namespace App\Http\Resources\FindUs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerRetailersResource extends JsonResource
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
            'logo' => $this->logo ? asset('storage/' . $this->logo) : null,
            'location' => $this->location,
            'link' => $this->link,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
