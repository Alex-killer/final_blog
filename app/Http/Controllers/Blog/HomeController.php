<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $randomArticles = Article::get()->random(3);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3);

        return view('blog.index', compact('likedPosts', 'randomPosts', 'randomArticles'));
    }

    public function about()
    {
        return view('blog.about');
    }

    public function contact()
    {
        return view('blog.contact');
    }
}
