<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Award extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

}
