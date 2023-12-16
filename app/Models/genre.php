<?php

namespace App\Models;

use App\Models\movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class genre extends Model
{
    use HasFactory;

    protected $fillable=["genre"];
    /**
     * The roles that belong to the genre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies():BelongsToMany
    {
        return $this->belongsToMany(movie::class);
    }
}
