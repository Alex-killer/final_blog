<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\LikedPost\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function update(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }
}
