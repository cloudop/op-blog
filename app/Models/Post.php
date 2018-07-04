<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'author',
        'head',
        'subhead',
        'guide',
        'content',
        'content',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stat()
    {
        return $this->hasOne(Stat::class);
    }
}
