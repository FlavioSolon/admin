<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sac extends Model
{
    use Notifiable;
    protected $table = "sacs";
    protected $fillable = [
        'name',
        'email',
        'reported_product',
        'reported_problem',
        'is_viewed',
    ];
}
