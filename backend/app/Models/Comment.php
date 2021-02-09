<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'id_imdb', 'name', 'text', 'ip'
    ];

    /**
     * @var string[]      *
     */
    protected $hidden = [
        'id', 'ip', 'updated_at', 'id_imdb'
    ];
}
