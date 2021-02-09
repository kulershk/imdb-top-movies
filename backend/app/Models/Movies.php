<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movies extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'id_imdb', 'title', 'year', 'url_poster', 'rating', 'ranking'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'updated_at', 'created_at'
    ];

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_imdb', 'id_imdb');
    }
}
