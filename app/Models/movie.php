<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class movie extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'Auteur', 'DateS', 'descri', 'duree', 'image'];

    /**
     * The roles that belong to the movie
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(genre::class);
    }

    /**
     * Get all of the comments for the movie
     */
    public function horaires(): HasMany
    {
        return $this->hasMany(Horaire::class);
    }
}
