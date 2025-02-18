<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InitialImpact extends Model
{
    use HasFactory;

    protected $table = 'initial_impact';


    protected $fillable = [
        'title',
        'subtitle',
        'background_video',
        'background_image',
        'waste_reduction_kg',
        'waste_reduction_icon',
        'waste_reduction_description',
        'regenerative_food_kg',
        'regenerative_food_icon',
        'regenerative_food_description',
        'cacao_farmers',
        'cacao_farmers_icon',
        'cacao_farmers_description',
        'producer_income',
        'producer_income_icon',
        'producer_income_description',
    ];

    protected $casts = [
        'producer_income' => 'float',
        'waste_reduction_kg' => 'integer',
        'regenerative_food_kg' => 'integer',
        'cacao_farmers' => 'integer',
    ];
}
