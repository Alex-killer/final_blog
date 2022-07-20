<?php

namespace App\Http\Controllers\Blog\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikedController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $liked_posts = $user->likedPosts()->paginate(10);

        return view('blog.personal.liked.index', compact('liked_posts'));
    }
}
