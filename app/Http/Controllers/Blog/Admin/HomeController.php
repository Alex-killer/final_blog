<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories_count = Category::count();
        $posts_count = Post::count();
        $tags_count = Tag::count();
        $users_count = User::count();

        return view('blog.admin.index', compact('categories_count', 'posts_count', 'tags_count', 'users_count'));
    }
}
