<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'post_id',
        'view',
        'six',
        'nine'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
