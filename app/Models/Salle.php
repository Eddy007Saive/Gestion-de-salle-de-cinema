<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salle extends Model
{
    use HasFactory;
    protected $fillable=["nom",'nbr_place'];
    /**
     * Get all of the comments for the Salle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horaires(): HasMany
    {
        return $this->hasMany(Horaire::class);
    }
}
