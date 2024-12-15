<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Award extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public function getImageUrlAttribute()
    {
        return Storage::url('awards/' . $this->image);
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $this->attributes['image'] = $this->storeImage($value, 'awards');
        }
    }

    private function storeImage($image, $folder)
    {
        return $image->store($folder, 'public');
    }
}
