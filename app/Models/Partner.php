<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'link'];

}
