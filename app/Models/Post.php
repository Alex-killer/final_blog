<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likedUsers(){
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }
}
