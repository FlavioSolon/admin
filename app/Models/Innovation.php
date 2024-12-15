<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Innovation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle',
        'card_title1', 'card_description1', 'card_icon1',
        'card_title2', 'card_description2', 'card_icon2',
        'card_title3', 'card_description3', 'card_icon3'
    ];

    // Accessors para retornar as URLs completas dos ícones
    public function getCardIcon1UrlAttribute()
    {
        return $this->card_icon1 ? Storage::url($this->card_icon1) : null;
    }

    public function getCardIcon2UrlAttribute()
    {
        return $this->card_icon2 ? Storage::url($this->card_icon2) : null;
    }

    public function getCardIcon3UrlAttribute()
    {
        return $this->card_icon3 ? Storage::url($this->card_icon3) : null;
    }

    // Função auxiliar para armazenar ícones
    public function storeIcon($icon, $folder)
    {
        return $icon->store($folder, 'public');
    }
}
