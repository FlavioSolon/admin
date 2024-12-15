<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductFeature extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'cards'];

    protected $casts = [
        'cards' => 'array',
    ];

    /**
     * Mutator para salvar os ícones dos cards na pasta correta.
     */
    public function setCardsAttribute($value)
    {
        if (is_array($value)) {
            foreach ($value as &$card) {
                if (isset($card['icon']) && is_file($card['icon'])) {
                    $card['icon'] = $this->storeIcon($card['icon'], 'product_features');
                }
            }
            $this->attributes['cards'] = json_encode($value);
        }
    }

    /**
     * Accessor para retornar o caminho completo do ícone no campo `cards`.
     */
    public function getCardsAttribute($value)
    {
        $cards = json_decode($value, true);
        foreach ($cards as &$card) {
            if (isset($card['icon'])) {
                $card['icon_url'] = Storage::url('product_features/' . $card['icon']);
            }
        }
        return $cards;
    }

    /**
     * Função auxiliar para armazenar ícones na pasta do modelo.
     */
    private function storeIcon($icon, $folder)
    {
        return $icon->store($folder, 'public');
    }
}
