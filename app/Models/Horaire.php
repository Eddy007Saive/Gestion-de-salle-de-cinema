<?php

namespace App\Models;

use App\Models\movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horaire extends Model
{
    use HasFactory;

    protected $fillable=["DateD","heureD","placeDispo","movie_id","salle_id"];
    /**
     * Get the user that owns the Horaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(movie::class);
    }

    /**
     * Get the user that owns the Horaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salle::class);
    }
}
