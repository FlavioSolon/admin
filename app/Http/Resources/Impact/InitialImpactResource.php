<?php

namespace App\Http\Resources\Impact;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InitialImpactResource extends JsonResource
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
            'waste_reduction_kg' => $this->waste_reduction_kg,
            'waste_reduction_description' => $this->waste_reduction_description,
            'waste_reduction_icon' => $this->waste_reduction_icon ? asset('storage/' . $this->waste_reduction_icon) : null,
            'regenerative_food_kg' => $this->regenerative_food_kg,
            'regenerative_food_description' => $this->regenerative_food_description,
            'regenerative_food_icon' => $this->regenerative_food_icon ? asset('storage/' . $this->regenerative_food_icon) : null,
            'cacao_farmers' => $this->cacao_farmers,
            'cacao_farmers_description' => $this->cacao_farmers_description,
            'cacao_farmers_icon' => $this->cacao_farmers_icon ? asset('storage/' . $this->cacao_farmers_icon) : null,
            'producer_income' => $this->producer_income,
            'producer_income_description' => $this->producer_income_description,
            'producer_income_icon' => $this->producer_income_icon ? asset('storage/' . $this->producer_income_icon) : null,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
