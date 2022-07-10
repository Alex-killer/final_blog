<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories_count = Category::all()->count();
        $posts_count = Post::all()->count();

        return view('blog.admin.index', compact('categories_count', 'posts_count'));
    }
}
