<?php

namespace App\Http\Controllers\Blog\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user_liked = auth()->user()->likedPosts->count();
        $comment_posts = auth()->user()->comments->count();

        return view('blog.personal.index', compact('user_liked', 'comment_posts'));
    }
}
