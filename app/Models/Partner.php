<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Events\HomeUpdated;
class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'link'];

    protected static function booted()
    {
        static::saved(fn() => broadcast(new HomeUpdated));
        static::deleted(fn() => broadcast(new HomeUpdated));
    }

}
