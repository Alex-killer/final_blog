<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
//        return $this->morphedByMany(Post::class, 'post_tag');
    }
}
