<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sac extends Model
{
    protected $table = "sacs";
    protected $fillable = [
        'name',
        'email',
        'reported_product',
        'reported_problem',
    ];
}
