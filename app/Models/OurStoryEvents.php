<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurStoryEvents extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'description',
        'image',
    ];
}
