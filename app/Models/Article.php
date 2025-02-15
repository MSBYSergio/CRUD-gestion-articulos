<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    // En los modelos definimos los campos que se van a rellenar y las relaciones

    protected $fillable = ['user_id', 'tag_id', 'title', 'content'];

    // Relación 1:N (1) con la tabla users, un artículo pertenece a un solo usuario

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // Relación 1:N (1) con la tabla tag, un artículo pertenece a una única etiqueta
    
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
