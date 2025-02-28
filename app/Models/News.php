<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Events\NewsUpdated;

/**
 * @method static where(string $string, string $slug)
 */
class News extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'authors',
        'badge',
        'is_featured',
        'content_markdown',
        'slug'
    ];

    protected $casts = [
        'date' => 'date',
        'authors' => 'array',
        'is_featured' => 'boolean',
    ];

    /**
     * Método para substituir a chave usada nas rotas.
     * Faz com que o Laravel use o slug ao invés do id por padrão.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Boot do modelo.
     * Configura a lógica para criar/atualizar o slug quando necessário.
     */
    public static function boot(): void
    {
        parent::boot();

        // Geração automática de slug ao criar uma notícia
        static::creating(static function ($news) {
            $news->slug = static::generateUniqueSlug($news->title);
        });

        // Atualização do slug ao modificar o título
        static::updating(static function ($news) {
            if ($news->isDirty('title')) {
                $news->slug = static::generateUniqueSlug($news->title, $news->id);
            }
        });
    }

    /**
     * Lógica para garantir que o slug gerado seja único.
     *
     * @param string $title Título da notícia.
     * @param int|null $ignoreId ID a ser ignorado para prevenir conflitos ao atualizar.
     * @return string Slug único.
     */
    public static function generateUniqueSlug(string $title, int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        // Verifica a existência do slug
        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }

    /**
     * Eventos Model Broadcast
     */
    protected static function booted(): void
    {
        static::saved(static fn() => broadcast(new NewsUpdated));
        static::deleted(static fn() => broadcast(new NewsUpdated));
    }
}
