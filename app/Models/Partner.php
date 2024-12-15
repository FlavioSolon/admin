<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'link'];

    public function getLogoUrlAttribute()
    {
        return Storage::url('partners/' . $this->logo);
    }

    public function setLogoAttribute($value)
    {
        if ($value) {
            $this->attributes['logo'] = $this->storeImage($value, 'partners');
        }
    }

    private function storeImage($image, $folder)
    {
        return $image->store($folder, 'public');
    }
}
