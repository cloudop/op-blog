<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
