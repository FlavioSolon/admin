<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeAndReturn extends Model
{
    protected  $table = 'exchange_and_returns';
    protected $fillable = ['title', 'content'];
}
