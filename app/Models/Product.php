<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'link'];

    public function getImageUrlAttribute()
    {
        return Storage::url('products/' . $this->image);
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $this->attributes['image'] = $this->storeImage($value, 'products');
        }
    }

    private function storeImage($image, $folder)
    {
        return $image->store($folder, 'public');
    }
}
