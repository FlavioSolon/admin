<?php


namespace App\Http\Resources\FindUs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FindUsResource extends JsonResource
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
            'background_video' => $this->background_video ? asset('storage/' . $this->background_video) : null,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}

