<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InnovationResource extends JsonResource
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
            'subtitle' => $this->subtitle,
            'card_title1' => $this->card_title1,
            'card_description1' => $this->card_description1,
            'card_icon1' => $this->card_icon1 ? asset('storage/' . $this->card_icon1) : null,
            'card_title2' => $this->card_title2,
            'card_description2' => $this->card_description2,
            'card_icon2' => $this->card_icon2 ? asset('storage/' . $this->card_icon2) : null,
            'card_title3' => $this->card_title3,
            'card_description3' => $this->card_description3,
            'card_icon3' => $this->card_icon3 ? asset('storage/' . $this->card_icon3) : null,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];

    }
}
