<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(9);

        return view('blog.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate(9);

        return view('blog.category.show', compact('category', 'posts'));
    }
}
