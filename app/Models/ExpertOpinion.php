<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertOpinion extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'profession',
        'description'
    ];
}
