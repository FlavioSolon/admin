<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    protected $fillable = [
        'name',
        'iframe'
    ];

    public function setIframeAttribute($value)
    {
        // Usa regex para capturar apenas o valor contido em src="" no iframe
        if (preg_match('/src="([^"]+)"/', $value, $matches)) {
            $this->attributes['iframe'] = $matches[1]; // Armazena somente a URL do src
        } else {
            $this->attributes['iframe'] = $value; // Caso não encontre src, armazena o valor original
        }
    }

}
