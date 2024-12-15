<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurProducts extends Model
{

    protected $fillable = [
        'name',
        'description',
        'first_image',
        'second_image',
        'third_image',
        'nutritional_table'
    ];
}
