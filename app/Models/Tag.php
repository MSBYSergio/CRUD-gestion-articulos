<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    // En los modelos definimos los campos que se van a rellenar y las relaciones

    protected $fillable = ['name', 'description'];

    // Relación 1:N con la tabla articles 1:N (N), una etiqueta puede pertenecer a varios artículos
    
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
