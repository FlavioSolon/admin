<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ombudsman extends Model
{
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'channel',
        'message',
        'is_viewed',
    ];
}
