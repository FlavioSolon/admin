<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = ['image_desktop', 'image_mobile', 'device'];

    // Accessors para gerar URLs
    public function getImageDesktopUrlAttribute()
    {
        return Storage::url('slides/' . $this->image_desktop);
    }

    public function getImageMobileUrlAttribute()
    {
        return Storage::url('slides/' . $this->image_mobile);
    }

    // Mutators para salvar as imagens na pasta correta
    public function setImageDesktopAttribute($value)
    {
        if ($value) {
            $this->attributes['image_desktop'] = $this->storeImage($value, 'slides');
        }
    }

    public function setImageMobileAttribute($value)
    {
        if ($value) {
            $this->attributes['image_mobile'] = $this->storeImage($value, 'slides');
        }
    }

    private function storeImage($image, $folder)
    {
        // Armazena a imagem na pasta apropriada
        return $image->store($folder, 'public');
    }
}
