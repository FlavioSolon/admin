<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ombudsman extends Model
{
    protected $fillable = [
        'name',
        'email',
        'channel',
        'message',
    ];
}
