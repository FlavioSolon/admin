<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'sector',
        'reason',
        'message',
        'is_viewed',
    ];
}
